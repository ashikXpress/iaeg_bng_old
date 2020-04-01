<div class="iq-top-navbar header-top-sticky">
    <div class="iq-navbar-custom">
        <div class="iq-sidebar-logo">
            <div class="top-logo">
                <a href="index.html" class="logo">
                    <img src="{{asset('assets/admin/images/logo.png')}}" class="img-fluid" alt="">
                    <span>IAEG</span>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <h3 class="ml-5">IAEG_BNG BANGLADESH NATIONAL GROUP</h3>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item iq-full-screen">
                        <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                    </li>
                    <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                            <img src="{{asset('assets/admin/images/user/08.jpg')}}" class="img-fluid rounded mr-3" alt="user">

                            <div class="caption">
                                <h6 class="mb-0 line-height">{{ Auth::user()->name }}</h6>
                                <span class="font-size-12">

                            </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>
