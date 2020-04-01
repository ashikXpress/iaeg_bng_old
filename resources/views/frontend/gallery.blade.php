@extends('layouts.frontend')

@section('additionalCSS')
    <link rel="stylesheet" href="{{asset('assets/frontend/lightbox2/css/lightbox.min.css')}}">

@stop

@section('content')

    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$gallery_category->name}} </h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">{{$gallery_category->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->

    <!-- Events -->
    <section class="events archives section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Yor Photo <span>Gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($galleries as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Event -->
                        <div class="single-event">
                            <div class="head overlay">
                                <img src="{{asset($item->image)}}" alt="#">
                                <a data-lightbox="album" data-title="{{$item->title}}" href="{{asset($item->image)}}" class="btn"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <!--/ End Single Event -->
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Start Pagination -->
                    <div class="pagination-main">
                        {{$galleries->links()}}
                    </div>
                    <!--/ End Pagination -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Events -->

@endsection

@section('additionalJS')
    <script src="{{asset('assets/frontend/lightbox2/js/lightbox.min.js')}}"></script>
@endsection
