<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
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
    <!-- blog -->
    @include('home.blog')
    <!-- end blog -->
    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    {{-- < Js files  --}}
    @include('home.js')
    {{--  End Js files --}}
</body>

</html>
