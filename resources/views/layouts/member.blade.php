<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} @yield('title')</title>
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
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="{{route('member.dashboard')}}">
                <span>IAEG_BNG</span>
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-more-fill"></i></div>
                        <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">
                    <li class="{{ Route::currentRouteName() === 'member.dashboard' ? 'active' : '' }}">
                        <a href="{{route('member.dashboard')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Dashboard</span></a>
                    </li>
                    @php
                        $subMenu = ['member.technical.event','member.exhibition.event','member.field.event','member.event.technical.join','member.event.exhibition.join','member.event.field.join','member.event.details'];
                    @endphp

                    <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Upcoming Event</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                            <li><a href="{{route('member.technical.event')}}" class="{{ Route::currentRouteName() === 'member.technical.event' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Technical events</a></li>
                            <li><a href="{{route('member.exhibition.event')}}" class="{{ Route::currentRouteName() === 'member.exhibition.event' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Exhibition events</a></li>
                            <li><a href="{{route('member.field.event')}}" class="{{ Route::currentRouteName() === 'member.field.event' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Field events</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>
<!-- Page Content  -->
    <div id="content-page" class="content-page">
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar header-top-sticky">
            <div class="iq-navbar-custom">
                <div class="iq-sidebar-logo">
                    <div class="top-logo">
                        <a href="index.html" class="logo">
                            <img src="{{asset('assets/admin/images/logo.png')}}" class="img-fluid" alt="">
                            <span>Member</span>
                        </a>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <h3 class="ml-5">IAEG_BNG

                          @if(Auth::guard('member')->user()->is_member==0)
                            <span class="alert alert-info" style="font-size:14px;display: inline-block"><a style="color:#089cac" href="{{route('member.join')}}">Apply for membership & get discount for Event joining <i class="fa fa-arrow-right"></i></a></span>

                            @elseif(Auth::guard('member')->user()->is_member==2)
                                <span class="alert alert-danger" style="font-size:14px;display: inline-block">Your membership payment approval is pending !! </span>
                            @endif

                        </h3>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li>
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="{{asset(Auth::guard('member')->user()->profile_image)}}" class="img-fluid rounded mr-3" alt="user">

                                    <div class="caption">
                                        <h6 class="mb-0 line-height">{{ Auth::guard('member')->user()->first_name }}</h6>
                                        <span class="font-size-12">

                            </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('member.logout')}}" >Log Out</a>

                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

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
