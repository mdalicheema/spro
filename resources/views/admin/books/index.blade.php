@extends('admin.admin_master')

@section('admin')


    <div class="container">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Sr. No#</td>
                        <td>Name</td>
                        <td>Auther</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach (@books as book)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->auther }}</td>
                            <td>
                                <a href="{{ url('/book/edit/{id}', $book->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('/book/delete/{id}', $book->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script>
        
    </script>
@endsection
