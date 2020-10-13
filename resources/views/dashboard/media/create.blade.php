@extends('dashboard.index')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.'.$title)</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
        <li class="#"><a href="{{ route('dashboard.media.index') }}">@lang('site.media')</a></li>
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
              
                <form class="form-ajax" data-route="{{ route('dashboard.media.store') }}" method="post" data-token="{{ csrf_token() }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label>@lang('site.img')</label>
                            <span id="img_div_inside" class="inside-empty"></span>
                            <input id="img_input_inside" type="file" name="img" class="form-control image"  placeholder="@lang('site.img')">
                            <img src="" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.publish')</label>
                            <span id="status_div_inside" class="inside-empty"></span>
                            <select class="form-control" name="status">
                                <option value="1">@lang('site.yes')</option>
                                <option value="0">@lang('site.no')</option>
                            </select>
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
@endpush
