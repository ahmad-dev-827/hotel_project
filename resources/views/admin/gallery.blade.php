<!DOCTYPE html>
<html>

<head>
    {{-- head tag start here --}}
    @include('admin.css')
    {{-- head tag start end-here --}}
    <style>
        .heading {
            color: #e95f71;
            font-size: 40px;
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
                            <h2 class="heading">Gallery</h2>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($gallery as $gallery)
                                <div class="col-md-4">
                                    <img style="height: 230px;" class="mt-4" src="galleryImg/{{ $gallery->image }}"
                                        alt="Image" height="" width="400px">
                                    <a style="margin-top: 10px"
                                        onclick="return confirm ('Are You Sure Want to delete')"
                                        href="{{ url('/delete-img' , $gallery->id) }}"
                                        class="btn btn-outline-danger w-100">Delete</a>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ url('upload-img') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div-design mb-5 img">
                                <label>Upload Image</label>
                                <input type="file" name="img" required>
                                <input class="btn btn-outline-primary" type="submit" value="Submit">
                            </div>
                        </form>
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
