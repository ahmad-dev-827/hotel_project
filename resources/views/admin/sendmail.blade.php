<!DOCTYPE html>
<html>


<head>
    {{-- head tag start here --}}
    <base href="/public">
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
            margin-left: 8%;
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
                            <h3 class="heading">Send Mail To {{ $data->name }}</h3>
                        </div>
                        <hr>
                        <form action="{{ url('mail' , $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div-design">
                                <label>Greetings</label>
                                <input type="text" name="greeting">
                            </div>
                            <div class="div-design">
                                <label>Mail Body</label>
                                <input class="desc" name="body"></input>
                            </div>
                            <div class="div-design">
                                <label>Action Text</label>
                                <input type="text" name="action_text">
                            </div>
                            <div class="div-design">
                                <label>Action Url</label>
                                <input type="text" name="action_url">
                            </div>
                            <div class="div-design">
                                <label>End Line</label>
                                <input type="text" name="endline">
                            </div>

                            <div class="div-design btn">
                                <button style="margin-bottom: 30px" class="btn btn-outline-primary" type="submit">Send Mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
