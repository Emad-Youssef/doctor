@extends('dashboard.index')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        @lang('site.dashboard')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>@lang('site.dashboard') </a></li>
        <li class="active">@lang('site.home')</li>
      </ol>
</section>

<section class="content">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">@lang('site.admins')</span>
                <span class="info-box-number">{{ $admins }}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">@lang('site.messages')</span>
                <span class="info-box-number">{{ $messages }}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">@lang('site.pockets')</span>
                <span class="info-box-number">{{$pockets}}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">@lang('site.news')</span>
                <span class="info-box-number">{{$news}}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
        <div class="inner">
            <h3>{{$drugs}}</h3>

            <p>@lang('site.drugs')</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3>{{$employees}}</h3>

            <p>@lang('site.employees')</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{$patients}}</h3>

            <p>@lang('site.patients')</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3>{{ $roshetas }}</h3>

            <p>@lang('site.rosheta')</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        </div>
    </div>
    <!-- ./col -->
    </div>
    <!-- /.row -->


    </section>

@endsection
