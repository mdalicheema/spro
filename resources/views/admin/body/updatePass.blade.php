@extends('admin.admin_master')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="exampleInputEmail1" class="form-label">Current Password</label>
                                    <input type="password" name="oldPassword" class="form-control" id="current_password"
                                        aria-describedby="emailHelp" placeholder="Current Password">

                                    @error('oldPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-12">
                                    <label for="exampleInputEmail1" class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        aria-describedby="emailHelp" placeholder="New Password">

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-12">
                                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                        aria-describedby="emailHelp" placeholder="Confirm Password">

                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="md-3 col-1">
                                    <button type="submit" class="btn btn-primary">Save New</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
