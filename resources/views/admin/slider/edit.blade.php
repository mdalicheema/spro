@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Edit Slider</div>
                    <div class="card-body">
                        <form action="{{ url('/slider/update/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $slider->image }}">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $slider->title }}">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                    <textarea  rows="4" cols="50"  name="description" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">{{ $slider->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <img src="{{ asset($slider->image) }}" alt="not received" style="width: 200px;height: 150px">
                            </div>

                            <a href="{{ route('home.slider') }}" class="btn btn-success">Home</a>
                            <button type="submit" class="btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
