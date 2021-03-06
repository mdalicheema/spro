@extends('admin.admin_master')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Add Service</div>
                    <div class="card-body">
                        <form action="{{ url('/contact/update/'.$contact->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contact->address }}">

                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contact->email }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input rows="5" type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contact->phone }}">

                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="md-3 col-1">
                                    <label for="exampleInputEmail1" class="form-label" style="color: white">|</label>
                                    <button type="submit" class="btn btn-primary">Add Contact</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
