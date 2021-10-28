@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Add Slider</div>
                    <div class="card-body">
                        <form action="{{ route('slider.store') }}" method="POST" id="usrform"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Slider</button>
                        </form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea rows="4" cols="50" name="description" form="usrform" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">Enter text here...</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
