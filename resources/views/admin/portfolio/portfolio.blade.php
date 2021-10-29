@extends('admin.admin_master')

@section('admin')
@php
    $images = DB::table('multipics')->get();
@endphp
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card-group">
                    @foreach ($images as $multi)
                        <div class="col-md-4 mt-5 me-5">
                            <div class="card">
                                <img src="{{ asset($multi->image) }}" alt="not found img">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add MultiPics</div>
                    <div class="card-body">
                        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Multi Pics</label>
                                <input type="file" name="image[]" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" multiple="">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Multipics</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

