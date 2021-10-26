<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Edit Brand</div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                        <form action="{{ url('/brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
                                <input type ="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    {{-- <input type ="text" name="name" class="form-control" value="{{ $brand->user->name }}" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"> --}}

                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
                                <input type ="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                   
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <img src="{{ asset($brand->brand_image) }}" alt="no received" style="width: 200px;height: 150px">
                            </div>


                            <a href="{{ route('all.brand') }}" class="btn btn-success">Home</a>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
