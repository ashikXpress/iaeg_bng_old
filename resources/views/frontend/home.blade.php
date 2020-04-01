@extends('layouts.frontend')
@section('additionalCSS')
    <link rel="stylesheet" href="{{asset('assets/frontend/lightbox2/css/lightbox.min.css')}}">

    <style>
        .home-slider .single-slider:before {
            opacity: 0.3;
        }

        .blog.blog-content.btn {
    color: #fff;
    margin-top: 20px;
    padding: 12px 30px;
    background: #00B16A;
    border: 1px solid #00B16A;
}
    a.blog.blog-content.btn:hover{
        background-color: #000000;
        color: #000;
        border: 1px solid #00B16A;
    }

        .home-slider .single-slider h1 {
            font-size: 40px;
            line-height: 40px;
            text-shadow: 0 0 4px #000;
        }

        .section-title ul {
            background: #ffffff7d;
            padding: 10px 10px;
            border: 4px solid #00b16a;
            color: #fff;
        }
        .section-title ul li a{
            color:#fff;
        }
    </style>
@endsection

@section('content')

    <!-- Slider Area -->
    <section class="home-slider">
        <div class="slider-active">

            <!-- Single Slider -->
            @foreach ($sliders->chunk(3) as $chunk)
            @foreach($chunk as $slider)
            <div class="single-slider overlay" style="background-image:url('{{asset($slider->image)}}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8
                         @if ($loop->iteration == 1)
                            col-md-8 col-12
                            @elseif ($loop->iteration == 2)
                            offset-lg-2 col-md-8 offset-md-2 col-12
                            @else
                            offset-lg-4 col-md-8 offset-md-4 col-12
                            @endif

                            ">
                            <div class="slider-text
                                @if ($loop->iteration == 1)

                                @elseif ($loop->iteration == 2)
                                    text-center
                                @else
                                    text-right
                                @endif
                                ">
                                <h1 style="color: #800000;font-family: 'Arial Black'">{{$slider->title}}</h1>
                                <h1 style="color: #800000;font-weight: bold;font-family: 'Arial Black'">{{$slider->sub_title}}</h1>
                                <div class="button">
                                    <a href="{{route('about')}}" class="btn primary">About Us</a>
                                    <a href="{{route('contact')}}" class="btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            <!--/ End Single Slider -->

        </div>
    </section>
    <!--/ End Slider Area -->

    <!-- Features -->
    <section class="our-features section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>About<span> IAEG_BNG</span></h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <div class="feature-head">
                            <img src="{{asset($about->images[0]->image)}}" alt="#">
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <h2>{{$about->title}}</h2>
                        <p class="text-justify">{{ \Illuminate\Support\Str::limit($about->description, 800, $end='.') }}</p>

                        <div class="button">
                                    <a href="{{route('about')}}" class="blog blog-content btn">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Features -->

    <!-- Enroll -->
    <section class="enroll overlay section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Single Enroll -->
                            <div class="enroll-form">
                                <div class="form-title">
                                    <h2>REGISTER NOW</h2>
{{--                                    <p>And get discount for events joining !!</p>--}}
                                </div>
                                <!-- Form -->
                                <form class="form" action="#">
                                    <div class="form-group button">



                                        <a href="{{route('member.join')}}" type="submit" class="btn">Register</a>
                                    </div>
                                </form>
                                <!--/ End Form -->
                            </div>
                            <!-- Single Enroll -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="enroll-right">
                                <div class="section-title">
                                    <h2 style="text-transform: capitalize"> Registration for other Events </h2>
                                    <ul>
                                        <li><a href="{{route('member.register.form')}}">1. Registration for Conference</a></li>
                                        <li><a href="{{route('member.register.form')}}">2. Registration for Exhibition</a></li>
                                        <li><a href="{{route('member.register.form')}}">3. Registration for Field Visit</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Main -->
                            <div class="skill-main">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="0.8s">
                                        <!-- Single Skill -->
                                        <div class="single-skill">
                                            <div class="circle" data-value="1" data-size="130">
                                                <strong>{{$technical_event_count}} +</strong>
                                            </div>
                                            <h4>Technical Event</h4>
                                        </div>
                                        <!--/ End Single Skill -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="1s">
                                        <!-- Single Skill -->
                                        <div class="single-skill">
                                            <div class="circle" data-value="1" data-size="130">
                                                <strong>{{$exhibition_event_count}} +</strong>
                                            </div>
                                            <h4>Exhibition Events</h4>
                                        </div>
                                        <!--/ End Single Skill -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="1.2s">
                                        <!-- Single Skill -->
                                        <div class="single-skill">
                                            <div class="circle" data-value="1" data-size="130">
                                                <strong>{{$field_event_count}}+</strong>
                                            </div>
                                            <h4>Field Events</h4>
                                        </div>
                                        <!--/ End Single Skill -->
                                    </div>
                                </div>
                            </div>
                            <!--/ End Skill Main -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Enroll -->

    <!-- Courses -->
    <section class="courses section-bg section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Your <span>Photo</span> Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="course-slider">
                        @foreach($galleries as $item)


                            <a class="single-course" href="{{asset($item->image)}}" data-lightbox="album" data-title="{{$item->title}}" data-alt="not">
                                <div class="course-head overlay">
                                    <img src="{{asset($item->image)}}" alt="#">

                                </div>

                            </a>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Courses -->

    <!-- Call To Action -->
    <section class="cta" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-6 col-12">
                    <div class="cta-inner overlay">
                        <div class="text-content">
                            <h2>We Focus On Your Events</h2>
                            <p>If you want to participate your event or get membership then, simply register and access your area.</p>

                            <div class="button">
                                <a class="btn primary" href="{{route('member.register.form')}}" >Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Call To Action -->

    <!-- Team -->
    <section class="team section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>BNG <span> Members </span> corner</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($members as $member)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team">
                        <img src="{{asset($member->profile_image)}}" alt="#">
                        <div class="team-hover">
                            <h4>{{$member->first_name.' '.$member->middle_name.' '.$member->last_name}}<span>{{$member->designation}}</span></h4>
                            <p>{{$member->memberType->name}}</p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--/ End Team -->

    <!-- Testimonials -->
    <section class="testimonials overlay section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="{{asset('assets/frontend/images/testimonial1.jpg')}}" alt="#">
                            <div class="main-content">
                                <h4 class="name">Sanavce Faglane</h4>
                                <p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="{{asset('assets/frontend/images/testimonial2.jpg')}}" alt="#">
                            <div class="main-content">
                                <h4 class="name">Jansan Kate</h4>
                                <p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="{{asset('assets/frontend/images/testimonial3.jpg')}}" alt="#">
                            <div class="main-content">
                                <h4 class="name">Sanavce Faglane</h4>
                                <p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="{{asset('assets/frontend/images/testimonial4.jpg')}}" alt="#">
                            <div class="main-content">
                                <h4 class="name">Jansan Kate</h4>
                                <p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Testimonials -->

    <!-- Events -->
    <section class="events section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Upcoming <span>Events</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="event-slider">
                       @foreach($events as $event)
                        <div class="single-event">
                            <div class="head overlay">
                                <img src="{{asset($event->images[0]->image)}}" alt="#">
                                <a href="{{asset($event->images[0]->image)}}" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="event-content">
                                <div class="meta">
                                    Start Date
                                    <span><i class="fa fa-calendar"></i>{{date('d M Y',strtotime($event->start_date))}}</span>
                                    <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->start_date))}}</span><br>
                                    End Date
                                    <span><i class="fa fa-calendar"></i>{{date('d M Y',strtotime($event->end_date))}}</span>
                                    <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->end_date))}}</span>
                                </div>
                                <h4><a href="{{route('event.details',$event->id)}}">{{$event->name}}</a></h4>
                                <p>{{ \Illuminate\Support\Str::limit($event->description, 100, $end='...') }}</p>
                                <div class="button">
                                    <a href="{{route('event.details',$event->id)}}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Events -->

    <!-- Fun Facts -->
    <div class="fun-facts overlay" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Single Fact -->
                    <div class="single-fact">
                        <i class="fa fa-user-o"></i>
                        <div class="number"><span class="counter">{{$foundry_member_count}}</span></div>
                        <p>Foundry Members</p>
                    </div>
                    <!--/ End Single Fact -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Single Fact -->
                    <div class="single-fact">
                        <i class="fa fa-user-o"></i>
                        <div class="number"><span class="counter">{{$current_member_count}}</span></div>
                        <p>Current Members</p>
                    </div>
                    <!--/ End Single Fact -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Single Fact -->
                    <div class="single-fact">
                        <i class="fa fa-user-o"></i>
                        <div class="number"><span class="counter">{{$student_member_count}}</span></div>
                        <p>Student Members</p>
                    </div>
                    <!--/ End Single Fact -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Single Fact -->
                    <div class="single-fact">
                        <i class="fa fa-user-o"></i>
                        <div class="number"><span class="counter">{{$new_member_count}}</span></div>
                        <p>New Members</p>
                    </div>
                    <!--/ End Single Fact -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Fun Facts -->

    <!-- News -->
    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest <span>News</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-slider">
                        <!-- Single Blog -->
                        @foreach($news as $item)
                        <div class="single-blog">
                            <div class="blog-head overlay">
                                <div class="date">
                                    <h4>{{date('d',strtotime($item->upload_date))}}<span>{{date('M',strtotime($item->upload_date))}}</span></h4>
                                </div>
                                <img src="{{asset($item->image_or_file)}}" alt="#">
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title"><a href="{{route('news.details',$item->id)}}">{{$item->title}}</a></h4>
                                <div class="blog-info">
                                    <a href="#"><i class="fa fa-user"></i>By: {{$item->userName->name}}</a>
                                </div>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 100, $end='...') }}</p>
                                <div class="button">
                                    <a href="{{route('news.details',$item->id)}}" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- End Single Blog -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End News -->

@endsection
@section('additionalJS')
    <script src="{{asset('assets/frontend/lightbox2/js/lightbox.min.js')}}"></script>
@endsection
