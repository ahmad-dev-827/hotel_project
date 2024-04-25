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
    <!-- banner -->
    @include('home.banner')
    <!-- end banner -->
    <!-- about -->
    @include('home.about')
    <!-- end about -->
    <!-- our_room -->
    @include('home.room')
    <!-- end our_room -->
    <!-- gallery -->
    @include('home.gallery')
    <!-- end gallery -->
    <!-- blog -->
    @include('home.blog')
    <!-- end blog -->
    <!--  contact -->
    @include('home.contact')
    <!-- end contact -->
    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    {{-- < Js files  --}}
    @include('home.js')
    {{--  End Js files --}}
</body>

</html>
