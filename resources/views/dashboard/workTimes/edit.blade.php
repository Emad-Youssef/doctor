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
        <li class="#"><a href="{{ route('dashboard.workTime.index') }}">@lang('site.workTimes')</a></li>
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
                <form class="work-ajax" data-route="{{ route('dashboard.workTime.update',$workTime->id) }}" method="post"">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.ar_day')</label>
                            <span id="ar_day_div_inside" class="inside-empty"></span>
                            <input id="ar_day_input_inside" type="text" name="ar[day]" value="{{ $workTime->translate('ar')->day }}" class="form-control"  placeholder="@lang('site.ar_day')">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.en_day')</label>
                            <span id="en_day_div_inside" class="inside-empty"></span>
                            <input id="en_day_input_inside" type="text" name="en[day]" value="{{ $workTime->translate('en')->day }}" class="form-control"  placeholder="@lang('site.en_day')">
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
<script>
        //ajax add edit
      $('.work-ajax').on('submit',function (event) {
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
                        if(key == 'ar.day'){
                            $('#ar_day_div_inside').empty()
                            $('#ar_day_input_inside').addClass('has-error')
                            $('#ar_day_div_inside').append('<small class="has-val">'+value+'</small>');
                        }

                        if(key == 'en.day'){
                            $('#en_day_div_inside').empty()
                            $('#en_day_input_inside').addClass('has-error')
                            $('#en_day_div_inside').append('<small class="has-val">'+value+'</small>');
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

