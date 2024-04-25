<!DOCTYPE html>
<html>

<head>
    {{-- head tag start here --}}
    @include('admin.css')
    {{-- head tag start end-here --}}
    <style>
        .heading {
            color: #e95f71;
            font-size: 35px;
            text-align: center;
            font-weight: bold;
        }

        .img {
            margin-top: 40px;
            text-align: center
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
                            <h2 class="heading">View Messages</h2>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ Str::limit($item->message, 50) }}</td>
                                            <td>
                                                <a href="{{ url('send-mail/' . $item->id) }}"
                                                    class=" btn btn-outline-success">Send Mail</a>
                                                <a style="margin-left: 30px" onclick="return confirm ('Are You Sure Want to delete')" href="{{ url('delete-message' , $item->id) }}"
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
