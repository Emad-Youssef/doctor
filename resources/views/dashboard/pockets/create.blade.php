@extends('dashboard.index')
@push('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/select2/dist/css/select2.min.css">
<!-- flatpickr-->
<link rel="stylesheet" href="{{ asset('front/rtl') }}/css/flatpickr.min.css">
@endpush
@section('content')\
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
                
                <form id="pockets-ajax" data-route="{{ route('dashboard.pockets.store') }}" method="post" data-token="{{ csrf_token() }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.f_name')</label>
                            <span id="f_name_div_inside" class="inside-empty"></span>
                            <input id="f_name_input_inside" type="text" name="f_name" class="form-control"  placeholder="@lang('site.f_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.l_name')</label>
                           <span id="l_name_div_inside" class="inside-empty"></span>
                            <input id="l_name_input_inside" type="text" name="l_name" class="form-control"  placeholder="@lang('site.l_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.country')</label>
                           <span id="country_div_inside" class="inside-empty"></span>
                            <input id="country_input_inside" type="text" name="country" class="form-control"  placeholder="@lang('site.country')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.city')</label>
                           <span id="city_div_inside" class="inside-empty"></span>
                            <input id="city_input_inside" type="text" name="city" class="form-control"  placeholder="@lang('site.city')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.sex')</label>
                            <select name="sex"  class="form-control">
                                <option value="male">@lang('site.male')</option>
                                <option value="female">@lang('site.female')</option>
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.phone')</label>
                           <span id="phone_div_inside" class="inside-empty"></span>
                            <input id="phone_input_inside" type="text" name="phone" class="form-control"  placeholder="@lang('site.phone')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.age')</label>
                           <span id="age_div_inside" class="inside-empty"></span>
                            <input id="age_input_inside" type="text" name="age" class="form-control"  placeholder="@lang('site.age')">
                        </div>



                        <div class="form-group col col-md-6 ">
                            <label >@lang('site.date')</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                           <span id="current_date_div_inside" class="inside-empty"></span>
                            <input type="text" name="current_date" class="form-control pull-right" id="myID">
                            </div>
                            <!-- /.input group -->

                            <div class="date-pockets">

                            </div>
                        </div>
                        <!-- value="$db->year-$db->month-$db->day" -->
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary submit-ajax"><i class="fa fa-plus"></i> <span>@lang('site.add')</span></button>
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
