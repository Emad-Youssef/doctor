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
        <li class="#"><a href="{{ route('dashboard.news.index') }}">@lang('site.news')</a></li>
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
                <form class="news-ajax" data-route="{{ route('dashboard.news.update',$new->id ) }}" method="post"">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.ar_title')</label>
                            <span id="ar_title_div_inside" class="inside-empty"></span>
                            <input id="ar_title_input_inside" type="text" name="ar[title]" value="{{ $new->translate('ar')->title }}" class="form-control"  placeholder="@lang('site.ar_title')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.en_title')</label>
                            <span id="en_title_div_inside" class="inside-empty"></span>
                            <input id="en_title_input_inside" type="text" name="en[title]" value="{{ $new->translate('en')->title }}" class="form-control"  placeholder="@lang('site.en_title')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.ar_description')</label>
                            <span id="en_description_div_inside" class="inside-empty"></span>
                            <textarea class="form-control" name="ar[description]">{{ $new->translate('ar')->description }}</textarea>
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.en_description')</label>
                            <span id="en_description_div_inside" class="inside-empty"></span>
                            <textarea class="form-control" name="en[description]">{{ $new->translate('en')->description }}</textarea>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.img')</label>
                            <span id="image_div_inside" class="inside-empty"></span>
                            <input type="file" name="img" class="form-control image"  placeholder="@lang('site.img')">
                            <img src="{{ asset('uploads/'.$new->img)}}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.publish')</label>
                            <span id="status_div_inside" class="inside-empty"></span>
                            <select class="form-control" name="status">
                                <option value="1" {{ $new->status == 1 ?'selected':'' }}>@lang('site.yes')</option>
                                <option value="0" {{ $new->status == 0 ?'selected':'' }}>@lang('site.no')</option>
                            </select>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.on_slider')</label>
                            <span id="on_slider_div_inside" class="inside-empty"></span>
                            <select class="form-control" name="on_slider">
                                <option value="1" {{ $new->on_slider == 1 ?'selected':'' }}>@lang('site.yes')</option>
                                <option value="0" {{ $new->on_slider == 0 ?'selected':'' }}>@lang('site.no')</option>
                            </select>
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
    <script>
        //ajax add edit
      $('.news-ajax').on('submit',function (event) {
        event.preventDefault();
        var route   = $(this).data('route');
        var dataSend   = new FormData(this);

        var btn_text = $('.submit-ajax span').html();
        $('.submit-ajax').attr('disabled', 'disabled');
        $('.submit-ajax span').text('loading...');
        $.ajax({
            url     : route,
            type    : 'post',
            data    : dataSend,
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success : function(data){
                if(data.status === 0)
                {
            
                    $('.inside-empty').empty()
                    $('.has-error').removeClass('has-error')
                    $.each( data.message, function( key, value ) {
                        if(key == 'ar.title'){
                            $('#ar_title_div_inside').empty()
                            $('#ar_title_input_inside').addClass('has-error')
                            $('#ar_title_div_inside').append('<small class="has-val">'+value+'</small>');
                        }

                        if(key == 'en.title'){
                            $('#en_title_div_inside').empty()
                            $('#en_title_input_inside').addClass('has-error')
                            $('#en_title_div_inside').append('<small class="has-val">'+value+'</small>');
                        }

                        if(key == 'ar.description'){
                            $('#ar_description_div_inside').empty()
                            $('#ar_description_div_inside').append('<small class="has-val">'+value+'</small>');
                        }

                        if(key == 'en.description'){
                            $('#en_description_div_inside').empty()
                            $('#en_description_div_inside').append('<small class="has-val">'+value+'</small>');
                        }

                    });
                    $('.submit-ajax').removeAttr('disabled');
                    $('.submit-ajax span').text(btn_text);
                }else{
                    toastr.success(data.message);
                    $('.submit-ajax').removeAttr('disabled');
                    $('.submit-ajax span').text(btn_text);
                    window.location.reload()
                    // $('.form-ajax').location.reload();
                }
            }
        });

    });
    
    </script>
@endpush


