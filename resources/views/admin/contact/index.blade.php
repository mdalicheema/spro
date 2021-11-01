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
                        <a class="btn btn-primary" href="{{ route('contact.add') }}">Add Contact</a>
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
                                    <th >Created-At</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <td  style="max-width: 200px">{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            @if ($contact->created_at == null)
                                                <span class="text-danger">No Data Set</span>
                                            @else
                                                {{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td colspan="2">
                                            <a href="{{ url('contact/edit/' . $contact->id) }}"
                                                class="btn btn-small btn-primary">Edit</a>
                                            <a href="{{ url('contact/delete/' . $contact->id) }}"
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
