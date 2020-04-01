<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}  @yield('title')</title>
    @include('layouts.assets.__style')
    @yield('additionalCSS')

</head>
<body>
{{--sidebar-main-menu--}}
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">

    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.assets.side_navbar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <!-- TOP Nav Bar -->
    @include('layouts.assets.top_navbar')
        <!-- TOP Nav Bar END -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- Footer -->
            @include('layouts.assets.footer')
        <!-- Footer END -->
    </div>
</div>
<!-- Wrapper END -->
@include('layouts.assets.__script')
@yield('additionalJS')
</body>
</html>
