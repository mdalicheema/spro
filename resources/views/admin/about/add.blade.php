@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Add About</div>
                    <div class="card-body">
                        <form action="{{ route('about.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                                <input type="text" name="short_info" class="form-control" id="exampleInputEmail1">

                                @error('short_info')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Detailed Description</label>
                                <textarea rows="7" cols="50" name="long_info" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter details..."></textarea>
                                @error('long_info')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add About</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
