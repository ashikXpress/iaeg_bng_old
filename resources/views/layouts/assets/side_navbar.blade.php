<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{route('dashboard')}}">
{{--            <img src="{{asset('assets/admin/images/logo.png')}}" class="img-fluid" alt="">--}}
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

                <li class="{{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Dashboard</span></a>
                </li>


                @php
                    $subMenu = ['users.index','users.create','users.edit','roles.index','roles.create','roles.edit'];
                @endphp

                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Administrator</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <li><a href="{{route('users.index')}}" class="{{ Route::currentRouteName() === 'users.index' ? 'active' : '' }}"><i class="fa fa-user"></i>Manage Admin</a></li>
                       <li><a href="{{route('roles.index')}}" class="{{ Route::currentRouteName() === 'roles.index' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Manage Role & Permission</a></li>
                    </ul>
                </li>

                @can('about')
                <li class="{{ Route::currentRouteName() === 'about.update' ? 'active' : '' }}">
                    <a href="{{route('about.update')}}" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>About Us</span></a>
                </li>
                @endcan


                @php
                    $subMenu = ['all.slider','slider.form','slider.edit'];
                @endphp
                @can('slider-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Slider</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">


                        <li><a href="{{route('all.slider')}}" class="{{ Route::currentRouteName() === 'all.slider' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Manage Slider</a></li>
                    </ul>
                </li>
                @endcan

                @php
                    $subMenu = ['all.gallery','gallery.form','gallery.edit','gallery.category.form'];
                @endphp
                @can('gallery-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Gallery</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <li><a href="{{route('gallery.category.form')}}" class="{{ Route::currentRouteName() === 'gallery.category.form' ? 'active' : '' }}"><i class="fa fa-user"></i>Add Category</a></li>
                        <li><a href="{{route('all.gallery')}}" class="{{ Route::currentRouteName() === 'all.gallery' ? 'active' : '' }}"><i class="fa fa-user"></i>Manage Gallery</a></li>
                    </ul>
                </li>
                @endcan

                @php
                    $subMenu = ['all.basic.news','basic.news.form','basic.news.edit','all.news.letter','news.letter.form','news.letter.edit'];
                @endphp
                @can('news-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>News</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <li><a href="{{route('all.basic.news')}}" class="{{ Route::currentRouteName() === 'all.basic.news' ? 'active' : '' }}"><i class="fa fa-user"></i>Manage Basic News </a></li>
                        <li><a href="{{route('all.news.letter')}}" class="{{ Route::currentRouteName() === 'all.news.letter' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Manage News Letter</a></li>
                    </ul>
                </li>
                @endcan



                @php
                    $subMenu = ['all.event','event.form','event.edit'];
                @endphp
                @can('event-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Event</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <li><a href="{{route('all.event')}}" class="{{ Route::currentRouteName() === 'all.event' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Manage Event</a></li>
                    </ul>
                </li>
                @endcan
                @php
                    $subMenu = ['event.join.unapproved.list','approved.event.participate.list'];
                @endphp

            @canany('event-approved-list','event-unapproved-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Event Join Manage</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        @can('event-approved-list')
                        <li><a href="{{route('approved.event.participate.list')}}" class="{{ Route::currentRouteName() === 'approved.event.participate.list' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Approved List </a></li>
                        @endcan
                        @can('event-unapproved-list')
                        <li><a href="{{route('event.join.unapproved.list')}}" class="{{ Route::currentRouteName() === 'event.join.unapproved.list' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Unapproved List <h4 class="ml-5 badge badge-danger">New  {{($unapproved_event_count)?$unapproved_event_count: '0'}}</h4></a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany



                @php
                    $subMenu = ['add.member.form','unapproved.member.list','approved.member.list'];
                @endphp

 @canany('member-approved-list','member-unapproved-list')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Member Manage</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                          <!--   <li><a href="{{route('add.member.form')}}" class="{{ Route::currentRouteName() === 'add.member.form' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Add new member</a></li> -->

                        @can('member-approved-list')
                        <li><a href="{{route('approved.member.list')}}" class="{{ Route::currentRouteName() === 'approved.member.list' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Approved</a></li>
                       @endcan
                        @can('member-unapproved-list')
                        <li><a href="{{route('unapproved.member.list')}}" class="{{ Route::currentRouteName() === 'unapproved.member.list' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Unapproved <h4 class="ml-5 badge badge-danger"> New  {{($unapproved_count)?$unapproved_count: '0'}}</h4></a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany



                @php
                    $subMenu = ['all.contact.mail','contact.mail.view','contact.mail.reply'];
                @endphp

                @can('contact-mail-manage')
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                    <a href="javascript:void(0);" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Contact Mail</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">

                        <li><a href="{{route('all.contact.mail')}}" class="{{ Route::currentRouteName() === 'all.contact.mail' ? 'active' : '' }}"><i class="fa fa-universal-access"></i>Mail Manage</a></li>
                    </ul>
                </li>
                @endcan
                @can('social-links')
                <li class="{{ Route::currentRouteName() === 'social.links' ? 'active' : '' }}">
                    <a href="{{route('social.links')}}" class="iq-waves-effect"><i class="fa fa-user-plus"></i><span>Social Links</span></a>
                </li>
                @endcan

            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
