<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-header">All Brand</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL No#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image </th>
                                <th scope="col">Created-At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($brands as $brand)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td> <img src="{{ asset($brand->brand_image) }}" alt="no found" style="width: 70px;height: 50px"> </td>
                                    <td>
                                        @if ($brand->created_at == null)
                                            <span class="text-danger">No Data Set</span>
                                        @else
                                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <a href="{{ url('brand/edit/' . $brand->id) }}"
                                            class="btn btn-small btn-primary">Edit</a>
                                        <a href="{{ url('brand/delete/' . $brand->id) }}"
                                            class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want delete!')">Delete</a>
                                        {{-- <form action="{{ url('brand/delete/'.$brand->id) }}" method="post">
                                            <button type="submit" class="btn-sm btn-danger">Delete</a>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container pb-3">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Add Brand</div>
                    <div class="card-body">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
