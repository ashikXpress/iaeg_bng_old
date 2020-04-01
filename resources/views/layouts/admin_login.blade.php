<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} @yield('title')</title>
    @include('layouts.assets.__style')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>

<section class="sign-in-page">
    <div class="container sign-in-page-bg p-0">
        <div class="row no-gutters">
            <div class="col-md-6 text-center">
                <div class="sign-in-detail text-white">
                    <a class="sign-in-logo mb-5" href="#"><span style="color: #fff;font-size: 30px">{{config('app.name')}}</span></a>
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src="{{asset('assets/admin/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/admin/images/login/2.png')}}" class="img-fluid mb-4" alt="logo">
                        </div>
                        <div class="item">
                            <img src="{{asset('assets/admin/images/login/3.png')}}" class="img-fluid mb-4" alt="logo">

                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
</section>
<!-- Sign in END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('layouts.assets.__script')
</body>

</html>
