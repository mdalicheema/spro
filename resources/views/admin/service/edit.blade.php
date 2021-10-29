@extends('admin.admin_master')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Add Service</div>
                    <div class="card-body">
                        <form action="{{ url('/service/update/'.$service->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">short_info</label>
                                    <textarea rows="5" type="text" name="short_info" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">{{ $service->short_info }}</textarea>

                                    @error('short_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">dribbble</label>
                                    <input type="text" name="dribbble" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->dribbble }}">

                                    @error('dribbble')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">dribbble_des</label>
                                    <textarea rows="5" type="text" name="dribbble_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">{{ $service->dribbble_des }}</textarea>

                                    @error('dribbble_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">file</label>
                                    <input type="text" name="file" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->file }}">

                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">file_des</label>
                                    <input type="text" name="file_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->file_des }}">

                                    @error('file_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">tachometer</label>
                                    <input type="text" name="tachometer" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->tachometer }}">

                                    @error('tachometer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">tachometer_des</label>
                                    <input type="text" name="tachometer_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->tachometer_des }}">

                                    @error('tachometer_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">layer</label>
                                    <input type="text" name="layer" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->layer }}">

                                    @error('layer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">layer_des</label>
                                    <input type="text" name="layer_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->layer_des }}">

                                    @error('layer_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">slideshow</label>
                                    <input type="text" name="slideshow" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->slideshow }}">

                                    @error('slideshow')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">slideshow_des</label>
                                    <input type="text" name="slideshow_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->slideshow_des }}">

                                    @error('slideshow_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">arch</label>
                                    <input type="text" name="arch" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->arch }}">

                                    @error('arch')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">arch_des</label>
                                    <input type="text" name="arch_des" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $service->arch_des }}">

                                    @error('arch_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="md-3 col-1">
                                    <label for="exampleInputEmail1" class="form-label" style="color: white">|</label>
                                    <button type="submit" class="btn btn-primary">Add About</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
