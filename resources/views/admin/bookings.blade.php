<!DOCTYPE html>
<html>

<head>
    {{-- head tag start here --}}
    @include('admin.css')
    {{-- head tag start end-here --}}
    <style>
        .heading {
            color: #e95f71;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        tr {
            text-align: center;

        }

        .tr1 {
            color: #e95f71;
            font-size: 17px;
        }

        .tr2 {
            color: aliceblue;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header class="header">
        @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    {{-- Sections Start --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="heading">View Bookings</h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="tr1">
                                        <th>Room Id</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Arrival Date</th>
                                        <th>Leaving Date</th>
                                        {{-- <th>Room Title</th>
                                        <th>Price</th>
                                        <th>Image</th> --}}
                                        <th>Action</th>
                                        <th>Status Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr class="tr2">
                                            <td>{{ $data->room_id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>
                                                @if ($data->status == 'waiting')
                                                    <span style="color: rgb(133, 182, 225)">Waiting</span>
                                                @endif
                                                @if ($data->status == 'Approved')
                                                    <span style="color: green">Approved</span>
                                                @endif
                                                @if ($data->status == 'Rejected')
                                                    <span style="color: rgb(227, 184, 40)">Rejected</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->start_date }}</td>
                                            <td>{{ $data->end_date }}</td>
                                            {{-- <td>{{ $data->room->room_title}}</td> --}}
                                            {{-- <td>{{ $data->room->price }}$</td> --}}
                                            {{-- <td>
                                                <img src="/roomImg/{{ $data->room->image }}" height="130px"
                                                    width="px" alt="Img">
                                            </td> --}}
                                            <td>
                                                <a onclick="return confirm ('Are You Sure Want to delete')"
                                                    href="{{ url('delete-booking/' . $data->id) }}"
                                                    class="btn btn-outline-danger">Delete</a>
                                            </td>
                                            <td>
                                                <span style="padding-bottom: 10px">
                                                    <a href="{{ url('approve-booking', $data->id) }}"
                                                        class=" btn btn-sm btn-outline-success">Approved</a>
                                                </span>
                                                <span>
                                                    <a href="{{ url('reject-booking', $data->id) }}"
                                                        class=" btn btn-sm btn-outline-warning">Rejected</a>
                                                </span>
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
        {{-- Sections End --}}

        {{-- Footer Start --}}
        @include('admin.footer')
        {{-- Footer End --}}
    </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
    <!-- JavaScript files End here-->
</body>

</html>
