<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ $setting->sitename }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ $setting->sitename }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            @if($newMessages->count() > 0)
                                <span class="label label-success">
                                    {{$newMessages->count()}}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @lang('site.you_have') {{$newMessages->count()}} @lang('site.message')
                            </li>
                            @if($newMessages->count() > 0)
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">

                                    @foreach($newMessages as $message)
                                        <li><!-- start message -->
                                            <a href="{{ route('dashboard.contact.show',$message->id)}}">
                                                <div>
                                                    <i class="fa fa-envelope fa-lg" style="color: cornflowerblue!important; "></i>
                                                </div>
                                                <h4>
                                                    {{$message->name}}
                                                    <small>
                                                        <i class="fa fa-clock-o"></i> {{$message->created_at}}
                                                    </small>
                                                </h4>

                                                <p>{{$message->message}}</p>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            @else
                            <ul class="menu">
                                <p>
                                    @lang('site.you_not_have_messages')...
                                </p>
                            </ul>
                            @endif
                            <li class="footer">
                                <a href="{{ route('dashboard.contact.index')}}">@lang('site.see_all_messages')</a>
                            </li>
                        </ul>
                    </li>
          <!-- Notifications: style can be found in dropdown.less -->
           {{-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
           </li> --}}


          <!-- language -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">@lang('site.language')</li>
              <li>
                <!-- inner menu: contains the actual data -->
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="menu">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
              </li>

            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('dashboard') }}/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('dashboard') }}/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                    {{Auth()->user()->name}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('dashboard.admins.show',Auth()->user()->id)}}" class="btn btn-default btn-flat">@lang('site.profile')</a>
                </div>
                <div class="pull-right">
                    <form></form>
                  <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.sign_out')</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>






    </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dashboard') }}/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>@lang('site.online')</a>
        </div>
      </div>
      <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('dashboard.layouts.menu')
    </section>
    <!-- /.sidebar -->
</aside>
