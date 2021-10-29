@extends('admin.admin_master')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">

                    <div>
                        <h4>Home About</h4>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('service.add') }}">Add Service</a>
                    </div>
                </div>
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-header">All Services</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">SL No#</th>
                                <th width="10%">Short Summary</th>
                                <th width="10%">Dribbble</th>
                                <th width="10%">Dribbble Des.</th>
                                <th width="10%">File</th>
                                <th width="10%">File Des.</th>
                                <th width="10%">Tachometer</th>
                                <th width="10%">Tachometer Des.</th>
                                <th width="10%">Layer</th>
                                <th width="10%">Layer Des.</th>
                                <th width="10%">Slideshow</th>
                                <th width="10%">Slideshow Des.</th>
                                <th width="10%">Arch</th>
                                <th width="10%">Arch Des.</th>
                                <th width="10%">Created-At</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($services as $service)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $service->short_info }}</td>
                                    <td>{{ $service->dribbble }}</td>
                                    <td>{{ $service->dribbble_des }}</td>
                                    <td>{{ $service->file }}</td>
                                    <td>{{ $service->file_des }}</td>
                                    <td>{{ $service->tachometer }}</td>
                                    <td>{{ $service->tachometer_des }}</td>
                                    <td>{{ $service->layer }}</td>
                                    <td>{{ $service->layer_des }}</td>
                                    <td>{{ $service->slideshow }}</td>
                                    <td>{{ $service->slideshow_des }}</td>
                                    <td>{{ $service->arch }}</td>
                                    <td>{{ $service->arch_des }}</td>
                                    <td>
                                        @if ($service->created_at == null)
                                            <span class="text-danger">No Data Set</span>
                                        @else
                                            {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <a href="{{ url('service/edit/' . $service->id) }}"
                                            class="btn btn-small btn-primary">Edit</a>
                                        <a href="{{ url('service/delete/' . $service->id) }}"
                                            class="btn btn-small btn-danger"
                                            onclick="return confirm('Are you sure you want delete!')">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
