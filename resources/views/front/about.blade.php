@extends('front.index')
@section('content')

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url({{ asset('front') }}/img/bg-img/breadcumb1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">@lang('site.about_us')</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Features Area Start ***** -->
    <div class="medilife-features-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="features-content">
                        <h2>@lang('site.we_always_put')</h2>
                        {!! $setting->about_us !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="features-thumbnail">
                        <img src="{{ asset('front') }}/img/bg-img/about1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Features Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <section class="medilife-cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                @foreach($facts as $fact)
                    <!-- Single Cool Fact-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-cool-fact-area text-center mb-100">
                        <div class="fact-icon">
                            <img src="{{ asset('uploads/'.$fact->img) }}" class="rounded-circle" alt="">
                        </div>
                            <h2><span class="counter">{{$fact->number}}</span></h2>
                            <h6>{{$fact->title}}</h6>
                            <p>{{$fact->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->


@endsection
