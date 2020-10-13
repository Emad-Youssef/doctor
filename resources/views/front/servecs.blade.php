@extends('front.index')
@section('content')

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url({{ asset('front') }}/img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">@lang('site.services')</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <section class="medilife-benefits-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>@lang('site.we_always_put')</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    @foreach($services_r as $service)
                        <div class="single-benefits-area mb-50 text-right">
                            <div class="single-benefits-title d-flex align-items-end row-reverse">
                            <div class="service-icon">
                                <img src="{{ asset('uploads/'.$service->img) }}" style="width: 60px;" class="rounded-circle" alt="">
                            </div>
                                <h5>{{ $service->title }}</h5>
                            </div>
                            <p>{{ $service->description }}</p>
                        </div>

                    @endforeach
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-benefits-thumb">
                        <img src="{{ asset('front') }}/img/bg-img/benefits.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                @foreach($services_l as $service)
                    <div class="single-benefits-area mb-50">

                        <div class="single-benefits-title d-flex align-items-end">
                        <div class="service-icon">
                            <img src="{{ asset('uploads/'.$service->img) }}" style="width: 60px;" class="rounded-circle" alt="">
                        </div>
                            <h5>{{ $service->title }}</h5>
                        </div>
                        <p>{{ $service->description }}</p>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ***** CTA Area Start ***** -->
    <div class="medilife-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content">
                        <i class="icon-smartphone"></i>
                        <h2>@lang('site.for_queries')</h2>
                        <h3>{{ $setting->phone_f }} / {{ $setting->phone_l }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** CTA Area End ***** -->



@endsection
