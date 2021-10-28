@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">

                    <div>
                        <h4>Home Slider</h4>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('slider.add') }}">Add Slider</a>
                    </div>
                </div>
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-header">All Sliders</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL No#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description </th>
                                <th scope="col">Image </th>
                                <th scope="col">Created-At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <th width="5%">{{ ++$i }}</th>
                                    <td width="15%">{{ $slider->title }}</td>
                                    <td width="25%">
                                        <p class="d-none">{{ $slider->description }}<a class="text-primary"
                                                onclick="readMore(this)">Read less</a></p>
                                        <p class="">{{ Str::limit($slider->description, 80, '...') }} <a
                                                class="text-primary" onclick="readMore(this)">Read more</a></p>
                                    </td>
                                    <td width="15%"> <img src="{{ asset($slider->image) }}" alt="not found"
                                            style="width: 70px;height: 50px"> </td>
                                    {{-- <td> <img src="/image/slider/{{ $slider->image }}" alt="not found" style="width: 70px;height: 50px"> </td> --}}
                                    <td width="10%">
                                        @if ($slider->created_at == null)
                                            <span class="text-danger">No Data Set</span>
                                        @else
                                            {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                                        @endif
                                    </td>

                                    <td width="15%">
                                        <a href="{{ url('slider/edit/' . $slider->id) }}"
                                            class="btn btn-small btn-primary">Edit</a>
                                        <a href="{{ url('slider/delete/' . $slider->id) }}"
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
    <script>
        function readMore(e) {
            if (!$(e).parent().hasClass('d-none')) {
                $(e).parent().addClass('d-none')
                $(e).parent().siblings('p').removeClass('d-none')
            }
        }
    </script>
@endsection
