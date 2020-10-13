@extends('dashboard.index')
@push('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/select2/dist/css/select2.min.css">
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
        <li class="#"><a href="{{ route('dashboard.employee.index') }}">@lang('site.employees')</a></li>
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
                
                    <form class="form-ajax" data-route="{{ route('dashboard.employee.update',$employee->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.f_name')</label>
                            <span id="f_name_div_inside" class="inside-empty"></span>
                            <input id="f_name_input_inside" type="text" name="f_name" class="form-control" value="{{ $employee->f_name}}"  placeholder="@lang('site.f_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.l_name')</label>
                            <span id="l_name_div_inside" class="inside-empty"></span>
                            <input id="l_name_input_inside" type="text" name="l_name" class="form-control" value="{{ $employee->l_name }}"  placeholder="@lang('site.l_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.ssn')</label>
                            <span id="ssn_div_inside" class="inside-empty"></span>
                            <input id="ssn_input_inside" type="text" name="ssn" class="form-control" value="{{ $employee->ssn }}"  placeholder="@lang('site.ssn')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.phone')</label>
                            <span id="phone_div_inside" class="inside-empty"></span>
                            <input id="phone_input_inside" type="text" name="phone" class="form-control" value="{{ $employee->phone }}"  placeholder="@lang('site.phone')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.work_type')</label>
                            <span id="level_div_inside" class="inside-empty"></span>
                            <select class="form-control select2" name="level">
                                <option>@lang('site.choose')</option>
                                <option value="doctor" {{ $employee->level== 'doctor'?'selected':'' }} >@lang('site.doctor')</option>
                                <option value="recepion" {{ $employee->level== 'recepion'?'selected':'' }} >@lang('site.recepion')</option>
                                <option value="nursing" {{ $employee->level== 'nursing'?'selected':'' }} >@lang('site.nursing')</option>
                                <option value="cleanliness" {{ $employee->level== 'cleanliness'?'selected':'' }} >@lang('site.cleanliness')</option>
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.salary')</label>
                            <span id="salary_div_inside" class="inside-empty"></span>
                            <input id="salary_input_inside" type="text" name="salary" class="form-control" value="{{ $employee->salary()->first()->salary}}"  placeholder="@lang('site.salary')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.work_days')</label>
                            <span id="work_id_div_inside" class="inside-empty"></span>
                            <select class="form-control select2" multiple name="work_id[]">
                                    @foreach($works as $work)
                                        <option value="{{$work->id}}" >{{$work->day}}</option>
                                    @endforeach

                            </select>

                            <ul class="btn btn-info">
                                @foreach($workArray as $woa)
                                <li>{{$woa->day}} {{$woa->pivot->from}} : {{$woa->pivot->to}}</li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.from')</label>
                            <span id="from_div_inside" class="inside-empty"></span>
                            <input id="from_input_inside" type="time" name="from" class="form-control"  placeholder="@lang('site.from')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.to')</label>
                            <span id="to_div_inside" class="inside-empty"></span>
                            <input id="to_input_inside" type="time" name="to" class="form-control"  placeholder="@lang('site.to')">
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
<script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      });



</script>
@endpush
