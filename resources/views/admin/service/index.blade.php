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
                    <div class="table-responsive d-block">
                        <table  class="table ">
                            <thead>
                                <tr>
                                    <th >SL No#</th>
                                    <th>Short Summary</th>
                                    <th >Dribbble</th>
                                    <th >Dribbble Des.</th>
                                    <th >File</th>
                                    <th >File Des.</th>
                                    <th >Tachometer</th>
                                    <th >Tachometer Des.</th>
                                    <th >Layer</th>
                                    <th >Layer Des.</th>
                                    <th >Slideshow</th>
                                    <th >Slideshow Des.</th>
                                    <th >Arch</th>
                                    <th >Arch Des.</th>
                                    <th >Created-At</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($services as $service)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <td  style="max-width: 200px">{{ $service->short_info }}</td>
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

    </div>
@endsection
