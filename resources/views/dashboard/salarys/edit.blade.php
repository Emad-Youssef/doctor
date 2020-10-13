@extends('dashboard.index')
@push('head')

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
        <li class="#"><a href="{{ route('dashboard.salary.index') }}">@lang('site.salarys')</a></li>
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
               
                <form class="form-ajax" data-route="{{ route('dashboard.salary.update',$salary->id ) }}" method="post"">
                    @csrf
                    <div class="row">

                        <div class="form-group col col-md-6">
                            <label >@lang('site.employee')</label>
                            <input type="text" value="{{$salary->employee->level}}" disabled  class="form-control"  placeholder="@lang('site.salary')">
                        </div>
                        <div class="form-group col col-md-6">
                            <label >@lang('site.doctor')</label>
                            <input type="text" disabled value="{{$salary->employee->f_name}} {{$salary->employee->l_name}}"  class="form-control"  placeholder="@lang('site.salary')">
                        </div>
                        <div class="form-group col col-md-6">
                            <label >@lang('site.salary')</label>
                            <span id="salary_div_inside" class="inside-empty"></span>
                            <input id="salary_input_inside" type="text" name="salary" value="{{$salary->salary}}" class="form-control"  placeholder="@lang('site.salary')">
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
    <!-- image-preview -->
    <script src="{{ asset('dashboard/plugins/image_preview/image_preview.js') }}"></script>
@endpush

