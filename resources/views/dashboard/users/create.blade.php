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
        <li class="#"><a href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
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
                <form class="form-ajax" data-route="{{ route('dashboard.users.store') }}" method="post" data-token="{{ csrf_token() }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label>@lang('site.user')</label>
                            <select class="form-control select2" name="employee_id">
                                <option>@lang('site.choose')</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->f_name}} {{$doctor->l_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.img')</label>
                            <input type="file" name="img" class="form-control image"  placeholder="@lang('site.img')">
                            <img src="" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control"  placeholder="@lang('site.email')">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.password')</label>
                            <input type="password" name="password" class="form-control" id="" autocomplete="no"  placeholder="@lang('site.password')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.password_confirmed')</label>
                            <input type="password" name="password_confirmation" class="form-control" autocomplete="off"   placeholder="@lang('site.password_confirmed')">
                        </div>
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
<!-- image-preview -->
<script src="{{ asset('dashboard/plugins/image_preview/image_preview.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      });



</script>
@endpush
