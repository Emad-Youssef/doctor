@extends('front.index')
@section('content')
    <!-- ***** Hero Area Start ***** -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
        @foreach($slider as $slide)
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url({{ asset('uploads/'.$slide->img)}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">{{ $slide->title}}</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">{{ $slide->description}}</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">@lang('site.read_more')<span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <span id="prev" style="display:none !important">@lang('site.prev')</span>
        <span id="next" style="display:none !important">@lang('site.next')</span>
    </section>

    <!-- ***** Hero Area End ***** -->

    @include('front.layouts._formPocket')

     <!-- ***** About Us Area Start ***** -->
     <section class="medica-about-us-area section-padding-100-20">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12 col-lg-4">
                    <div class="medica-about-content">
                        <h2>We always put our pacients first</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                        <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>
                    </div>
                </div> -->
                <div class="col col-sm-12">
                    <div class="row">
                        <!-- Single Service Area -->
                        @foreach($services as $service)
                            <div class="col-12 col-lg-4 col-sm-6">
                                <div class="single-service-area d-flex">
                                    <div class="service-icon">
                                        <img src="{{ asset('uploads/'.$service->img) }}" class="rounded-circle" alt="">
                                    </div>
                                    <div class="service-content">
                                        <h5>{{$service->title}}</h5>
                                        <p>{{$service->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

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

    <!-- ***** Gallery Area Start ***** -->
    <div class="medilife-gallery-area owl-carousel">
        @foreach($media as $med)
            <!-- Single Gallery Item -->
            <div class="single-gallery-item">
                <img src="{{ asset('uploads/'.$med->img) }}" alt="">
                <div class="view-more-btn">
                    <a href="{{ asset('uploads/'.$med->img) }}" class="btn gallery-img">@lang('site.see_more') +</a>
                </div>
            </div>

        @endforeach
    </div>
    <!-- ***** Gallery Area End ***** -->


     <!-- ***** Blog Area Start ***** -->
     <div class="medilife-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">

                @foreach($news as $new)
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area mb-100">
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail">
                                <img src="{{ asset('uploads/'.$new->img) }}" alt="">
                                <!-- Post Date -->
                                <div class="post-date">


                                    <a href="#">{{  \Carbon\Carbon::parse($new->creted_at)->format('Y-m-d') }}</a>
                                </div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="headline">{{ $new->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Emergency Area Start ***** -->
    <div class="medilife-emergency-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="emergency-content">
                        <i class="icon-smartphone"></i>
                        <h2>@lang('site.for_queries')</h2>
                        <h3>{{ $setting->phone_f }}</h3>
                        <h3>{{ $setting->phone_l }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Emergency Area End ***** -->


@endsection
