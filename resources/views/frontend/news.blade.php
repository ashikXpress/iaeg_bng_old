@extends('layouts.frontend')

@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$news_name->name}}</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">{{$news_name->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->


    <!-- Courses -->
    <section class="courses archives section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Your <span>Latest</span> News</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $item)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Course -->
                    <div class="single-course">
                        @if($item->category_id==1)
                        <div class="course-head overlay">
                            <img src="{{asset($item->image_or_file)}}" alt="#">
                            <a href="{{route('news.details',$item->id)}}" class="btn"><i class="fa fa-link"></i></a>
                        </div>
                        @endif
                        <div class="single-content">
                            <h4><a href="{{route('news.details',$item->id)}}">{{$item->title}} <span><i class="fa fa-user"></i> Post by: {{$item->userName->name}}</span></a></h4>

                            <p>{{ \Illuminate\Support\Str::limit($item->description, 100, $end='...') }} <a
                                    href="{{route('news.details',$item->id)}}" class="alert-link"> read more</a></p>
                        </div>
                        <div class="course-meta">
                            <div class="meta-left">
                                <span><i class="fa fa-clock-o"></i>{{date('d M Y',strtotime($item->upload_date))}}</span>
                            </div>
                            @if($item->category_id===2)
                            <span class="price"><a href="{{$item->image_or_file}}" target="_blank" style="color: #fff">File download <i class="fa fa-cloud-download"></i></a>
                        </span>
                            @endif

                        </div>
                    </div>
                    <!--/ End Single Course -->
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <!-- Start Pagination -->
                    <div class="pagination-main">
                        {{$news->links()}}
                    </div>
                    <!--/ End Pagination -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Courses -->

@endsection
