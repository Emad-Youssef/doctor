@extends('dashboard.index')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.'.$title)</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
        <li class="active">@lang('site.'.$title)</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
                <div class="box-header">
                <h3 class="box-title">@lang('site.'.$title)</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="alert alert-danger hasError hidden">

                </div>
                <form class="form-ajax" data-route="{{ route('dashboard.pocketlimit.update',$pocketlimit->id ) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.count')</label>
                            <input type="text" name="limit" value="{{$pocketlimit->limit}}" class="form-control"  placeholder="@lang('site.count')" value="{{ $setting->translate('ar')->sitename??'' }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="_method" value="put">
                        <button class="btn btn-primary submit-ajax"><i class="fa fa-edit"></i> <span>@lang('site.edit')</span></button>
                    </div>

                </form>


              </div>
              <!-- /.box-body -->
                <!-- /.box-body -->
        </div>

    </section>


@endsection
