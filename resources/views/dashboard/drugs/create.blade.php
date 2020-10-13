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
        <li class="#"><a href="{{ route('dashboard.drug.index') }}">@lang('site.drugs')</a></li>
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
               
                <form class="form-ajax" data-route="{{ route('dashboard.drug.store') }}" method="post" data-token="{{ csrf_token() }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.drug_name')</label>
                            <span id="drug_name_div_inside" class="inside-empty"></span>
                            <input id="drug_name_input_inside" type="text" name="drug_name" class="form-control"  placeholder="@lang('site.drug_name')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.drug_use')</label>
                            <span id="drug_use_div_inside" class="inside-empty"></span>
                            <input id="drug_use_input_inside" type="text" name="drug_use" class="form-control"  placeholder="@lang('site.drug_use')">
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
