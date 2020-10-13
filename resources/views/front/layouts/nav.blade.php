<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <p>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">@lang('site.login')</a>
                                @endauth
                            @endif
                        </p>
                        <p>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                /<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('uploads').'/'.$setting->logo }}" alt="Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse" id="medilifeMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">@lang('site.home') <span class="sr-only">(current)</span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('about') }}">@lang('site.about_us')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('servecs') }}">@lang('site.services')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('news') }}">@lang('site.news')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">@lang('site.contact')</a>
                                    </li>
                                </ul>
                                <!-- Appointment Button -->
                                <a href="#" class="btn medilife-appoint-btn ml-30">For <span>emergencies</span> Click here</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
