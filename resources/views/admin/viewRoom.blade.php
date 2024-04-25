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
                            <h3 class="heading">View Rooms</h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Room Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Wifi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->room_title }}</td>
                                            <td>{{ Str::limit($item->description, 50) }}</td>
                                            <td><img src="roomImg/{{ $item->image }}" alt="Image" width="100">
                                            </td>
                                            <td>{{ $item->price }}$</td>
                                            <td>{{ $item->wifi }}</td>
                                            <td>
                                                <a style="width: 65px" href="{{ url('edit-room/' . $item->id) }}"
                                                    class=" btn btn-outline-warning">Edit</a>
                                                <a style="margin-left: 30px" onclick="return confirm ('Are You Sure Want to delete')" href="{{ url('delete-room/' . $item->id) }}"
                                                    class="btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
