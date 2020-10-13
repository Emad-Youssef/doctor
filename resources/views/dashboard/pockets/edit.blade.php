@extends('dashboard.index')
@push('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/select2/dist/css/select2.min.css">
<!-- flatpickr-->
<link rel="stylesheet" href="{{ asset('front/rtl') }}/css/flatpickr.min.css">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.'.$title)</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
        <li class="#"><a href="{{ route('dashboard.pockets.index') }}">@lang('site.pockets')</a></li>
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
               
                <form id="pockets-ajax" data-route="{{ route('dashboard.pockets.update',$pocket->id ) }}" method="post"  data-token="{{ csrf_token() }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.f_name')</label>
                            <span id="f_name_div_inside" class="inside-empty"></span>
                            <input id="f_name_input_inside" type="text" name="f_name" value="{{ $pocket->f_name }}" class="form-control"  placeholder="@lang('site.f_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.l_name')</label>
                            <span id="l_name_div_inside" class="inside-empty"></span>
                            <input id="l_name_input_inside" type="text" name="l_name" value="{{ $pocket->l_name }}" class="form-control"  placeholder="@lang('site.l_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.country')</label>
                            <span id="country_div_inside" class="inside-empty"></span>
                            <input id="country_input_inside" type="text" name="country" class="form-control" value="{{ $pocket->country }}"  placeholder="@lang('site.country')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.city')</label>
                            <span id="city_div_inside" class="inside-empty"></span>
                            <input id="city_input_inside" type="text" name="city" class="form-control" value="{{ $pocket->city }}"  placeholder="@lang('site.city')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.sex')</label>
                            <span id="sex_div_inside" class="inside-empty"></span>
                            <select name="sex"  class="form-control">
                                <option value="male" {{ $pocket->sex=='male'?'selected':'' }}>@lang('site.male')</option>
                                <option value="female" {{ $pocket->sex=='female'?'selected':'' }}>@lang('site.female')</option>
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.phone')</label>
                            <span id="phone_div_inside" class="inside-empty"></span>
                            <input id="phone_input_inside" type="text" name="phone" class="form-control" value="{{ $pocket->phone }}"  placeholder="@lang('site.phone')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.age')</label>
                            <span id="age_div_inside" class="inside-empty"></span>
                            <input id="age_input_inside" type="text" name="age" class="form-control" value="{{ $pocket->age }}"  placeholder="@lang('site.age')">
                        </div>

                         <div class="form-group col col-md-6">
                            <label>@lang('site.approveClient')</label>
                            <span id="patient_div_inside" class="inside-empty"></span>
                            <select class="form-control" name="patient">
                                <option>@lang('site.choose')</option>
                                <option value="no" {{ $pocket->patient=='no'?'selected':'' }}>@lang('site.no')</option>
                                <option value="yes" {{ $pocket->patient=='yes'?'selected':'' }}>@lang('site.yes')</option>
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.confirm')</label>
                            <span id="confirm_div_inside" class="inside-empty"></span>
                            <select class="form-control" name="confirm">
                                <option>@lang('site.choose')</option>
                                <option value="no" {{ $pocket->confirm=='no'?'selected':'' }}>@lang('site.no')</option>
                                <option value="yes" {{ $pocket->confirm=='yes'?'selected':'' }}>@lang('site.yes')</option>
                            </select>
                        </div>


                        <div class="form-group col col-md-6 ">
                                <label >@lang('site.date')</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <span id="current_date_div_inside" class="inside-empty"></span>
                                <input type="text" name="current_date" value="{{ $pocket->y }}-{{ $pocket->m }}-{{ $pocket->d }}" class="form-control pull-right" id="myID">
                                </div>
                                <!-- /.input group -->

                                <div class="date-pockets">

                                </div>
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
@push('scripts')
<!-- Select2 -->
<script src="{{ asset('dashboard') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- flatpickr -->
<script src="{{ asset('front/rtl') }}/js/flatpickr.js"></script>

<script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        // flatpickr
        flatpickr("#myID", {});
         
       
      });
</script>
@endpush
