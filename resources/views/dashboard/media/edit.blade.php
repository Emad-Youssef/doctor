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
                    
                    <form class="form-ajax" data-route="{{ route('dashboard.media.update',$media->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label>@lang('site.img')</label>
                                <span id="img_div_inside" class="inside-empty"></span>
                                <input id="img_input_inside" type="file" name="img" class="form-control image"  placeholder="@lang('site.img')">
                                <img src="{{ asset('uploads/'.$media->img) }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                            </div>

                            <div class="form-group col col-md-6">
                                <label>@lang('site.publish')</label>
                                <span id="status_div_inside" class="inside-empty"></span>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $media->status == 1 ?'selected':'' }}>@lang('site.yes')</option>
                                    <option value="0" {{ $media->status == 0 ?'selected':'' }}>@lang('site.no')</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <input type="hidden" name="_method" value="put">
                            <button class="btn btn-primary submit-ajax"><i class="fa fa-edit"></i> <span>@lang('site.edit')</span></button>
                        </div>

                    </form>
                </div>
        </div>
    </section>


@endsection

@push('scripts')
    <!-- image-preview -->
    <script src="{{ asset('dashboard/plugins/image_preview/image_preview.js') }}"></script>
@endpush

