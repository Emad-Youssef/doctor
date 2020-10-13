@extends('front.index')
@section('content')

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url({{ asset('front') }}/img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">@lang('site.news')</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- ***** Blog Area Start ***** -->
     <section class="medilife-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        @foreach($news as $new)
                            <!-- Single Blog Area -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-area bg-gray mb-50">
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
                                        <div class="post-author">
                                            <a href="#"><img src="img/blog-img/p1.jpg" alt=""></a>
                                        </div>
                                        <a href="{{ route('showNews',$new->id) }}" class="headline">{{ $new->title }}</a>
                                        <p>{{ $new->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="medilife-blog-sidebar-area">

                        <!-- Search Widget -->
                        {{-- <div class="search-widget-area mb-50">
                            <form action="#" method="get">
                                <input type="search" placeholder="@lang(;)">
                                <input type="submit" value="Search">
                            </form>
                        </div> --}}
                        <!-- Latest News -->
                        <div class="latest-news-widget-area mb-50">
                            <h5>@lang('site.latest_news')</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                @foreach($last_news as $new)
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="{{ asset('uploads/'.$new->img) }}" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">{{  $new->title }}</a>
                                        <p>{{  \Carbon\Carbon::parse($new->creted_at)->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- medilife Emergency Card -->
                        <div class="medilife-emergency-card bg-img bg-overlay" style="background-image: url(img/bg-img/about1.jpg);">
                            <i class="icon-smartphone"></i>
                            <h2>@lang('site.for_queries')</h2>
                            <h3>{{ $setting->phone_f }} {{ $setting->phone_l }}</h3>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Pagination Area -->
                    <div class="pagination-area mt-50">
                        <nav aria-label="Page navigation">
                            {{ $news->render() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->


@endsection
