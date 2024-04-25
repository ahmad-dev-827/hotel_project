<!DOCTYPE html>
<html>


<head>
    {{-- head tag start here --}}
    @include('admin.css')
    {{-- head tag start end-here --}}
    <style>
        label {
            display: inline-block;
            width: 200px;
        }

        .div-design {
            padding-top: 30px;
        }

        .desc {
            width: 20%;
            height: 60px;
        }

        .div-center {
            text-align: center;
            padding-top: 30px;
        }
        .img{
            margin-left: 20%;
        }
        .btn{
            margin-left: 10%;
        }
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
                    <div class="card div-center ">
                        <div class="card-header">
                            <h3 class="heading">Add Rooms</h3>
                        </div>
                        <hr>
                        <form action="{{ url('add-room') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div-design">
                                <label>Room Title</label>
                                <input type="text" name="title">
                            </div>
                            <div class="div-design">
                                <label>Description</label>
                                <input class="desc" name="description"></input>
                            </div>
                            <div class="div-design">
                                <label>Price</label>
                                <input type="number" name="price">
                            </div>
                            <div class="div-design">
                                <label>Room Type</label>
                                <select name="type">
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="div-design">
                                <label>Free Wifi</label>
                                <select name="wifi">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="div-design img">
                                <label>Upload Image</label>
                                <input type="file" name="img">
                            </div>
                            <div class="div-design btn">
                                <button style="margin-bottom: 30px" class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Sections Start --}}
        {{-- @include('admin.section') --}}
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
