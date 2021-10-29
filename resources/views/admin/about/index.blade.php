@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">

                    <div>
                        <h4>Home About</h4>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('about.add') }}">Add Slider</a>
                    </div>
                </div>
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-header">All Brand</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">SL No#</th>
                                <th width="15%">Title</th>
                                <th width="35%">Short Description</th>
                                <th width="35%">Long Description</th>
                                <th width="10%">Updated-At</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($abouts as $about)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <td>{{ $about->name }}</td>
                                    <td>{{ $about->short_info }}</td>
                                    <td>{{ $about->long_info }}</td>
                                    <td>
                                        @if ($about->created_at == null)
                                            <span class="text-danger">No Data Set</span>
                                        @else
                                            {{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <a href="{{ url('about/edit/' . $about->id) }}"
                                            class="btn btn-small btn-primary">Edit</a>
                                        <a href="{{ url('about/delete/' . $about->id) }}" class="btn btn-small btn-danger"
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
