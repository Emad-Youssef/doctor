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

                    <div class="single-blog-area">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/4.jpg" alt="">
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">Jan 23, 2018</a>
                            </div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <div class="post-author">
                                <a href="#"><img src="img/blog-img/p1.jpg" alt=""></a>
                            </div>
                            <a href="#" class="headline mb-0">Free dental care for our clients </a>
                            <div class="post-meta">
                                <a href="#" class="post-author-name">by Dr. Cristinne Smith</a> | <a href="#" class="post-catagory">Dental</a>
                            </div>
                            <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec gravida tortor, non vehicula mauris. Cras aliquam lobortis nulla vel fermentum. Phasellus iaculis id nunc at egestas. Etiam nec venenatis tortor, quis fermentum diam. Pellentesque gravida ante nisi, vel posuere leo suscipit et. Proin tortor magna, pharetra vel faucibus in, interdum vitae est. Vivamus aliquet dapibus lacus, ut viverra diam dapibus vel. Ut vehicula rhoncus dolor, nec malesuada ligula condimentum eu. Proin id placerat lorem. Maecenas varius felis id dui aliquet, at iaculis mauris molestie. Proin mattis dolor ut lacus rutrum posuere. Ut ullamcorper ipsum iaculis risus mollis, in volutpat turpis efficitur. Nullam dignissim imperdiet augue a convallis.</p>
                        </div>
                        <img src="img/blog-img/5.jpg" alt="">
                        <!-- Post Content -->
                        <div class="post-content">
                            <p>Phasellus iaculis id nunc at egestas. Etiam nec venenatis tortor, quis fermentum diam. Pellentesque gravida ante nisi, vel posuere leo suscipit et. Proin tortor magna, pharetra vel faucibus in, interdum vitae est. Vivamus aliquet dapibus lacus, ut viverra diam dapibus vel. Ut vehicula rhoncus dolor, nec malesuada ligula condimentum eu. Proin id placerat lorem. Maecenas varius felis id dui aliquet, at iaculis mauris molestie. Proin mattis dolor ut lacus rutrum posuere. Ut ullamcorper ipsum iaculis risus mollis, in volutpat turpis efficitur. Nullam dignissim imperdiet augue a convallis.</p>
                        </div>
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
