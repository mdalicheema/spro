<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        <form action="{{ url('/category/update/'.$category->id) }}" method="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                                <input type ="text" name="category_name" class="form-control" value="{{ $category->category_name }}" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    {{-- <input type ="text" name="name" class="form-control" value="{{ $category->user->name }}" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"> --}}

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>

                            <a href="{{ route('all.category') }}" class="btn btn-success">Home</a>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
