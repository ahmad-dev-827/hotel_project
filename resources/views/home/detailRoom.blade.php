<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')

    <style>
        label {
            display: inline-block;
            width: 200px;
        }

        .bg {
            background: rgb(34, 35, 35)
        }

        .rom {
            font-size: 30px !important;
            margin-top: 20px;
            font-weight: bold;
        }

        input {
            width: 100%;
        }
    </style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    @include('home.loader')
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header -->

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img style="height: 300px; width: 800px" src="roomImg/{{ $room->image }}"
                                    alt="Img" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{ $room->room_title }}</h3>
                            <p style="padding: 10px">{{ $room->description }}</p>
                            <h4 style="padding: 10px">Free Wifi : {{ $room->wifi }}</h4>
                            <h4 style="padding: 10px">Room Type : {{ $room->room_type }}</h4>
                            <h4 style="padding: 10px">Price : {{ $room->price }}$</h4>

                        </div>
                    </div>
                </div>
                <div class=" bg col-md-4 ml-5">
                    <h1 class=" rom text-center text-danger">Book Room</h1>
                    @if ($errors)
                        @foreach ($errors->all() as $errors)
                            <div class="alert alert-danger">
                                {{ $errors }}
                            </div>
                        @endforeach
                    @endif
                    <form action="{{ url('add-booking', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                @if (Auth::id()) value="{{ Auth::user()->name }}" @endif>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control"
                                @if (Auth::id()) value="{{ Auth::user()->email }}" @endif>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                @if (Auth::id()) value="{{ Auth::user()->phone }}" @endif>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="startDate" class="form-control" id="startDate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" name="endDate" class="form-control" id="endDate">
                        </div>
                        <div class="mb-4 form-check">

                        </div>
                        <button type="submit" class="btn  w-100 btn-outline-danger">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    {{-- < Js files  --}}
    @include('home.js')
    {{--  End Js files --}}

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
        <script>
            swal("{{ session('status') }}!", "", "success");
            // swal(" Room Booked Succesfully !");
        </script>
    @endif
</body>

</html>
