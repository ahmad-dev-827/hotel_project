<!DOCTYPE html>
<html>

{{-- head tag start here --}}
@include('admin.css')
{{-- head tag start end-here --}}

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
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            {{-- Sections Start --}}
            @include('admin.section')
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
