@extends('dashboard.index')
@push('head')
    <!-- bootstrap tags input plugin -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/tagInput/src/bootstrap-tagsinput.css') }}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote.css') }}">

@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.'.$title)</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
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
                <form class="form-ajax" data-route="{{ route('dashboard.settings.update',$setting->id ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.sitename_ar')</label>
                            <span id="ar_sitename_div_inside" class="inside-empty"></span>
                            <input id="ar_sitename_input_inside" type="text" name="ar[sitename]" class="form-control"  placeholder="@lang('site.sitename_ar')" value="{{ $setting->translate('ar')->sitename??'' }}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.sitename_en')</label>
                            <span id="en_sitename_div_inside" class="inside-empty"></span>
                            <input id="en_sitename_input_inside" type="text" name="en[sitename]" class="form-control" placeholder="@lang('site.sitename_en')" value="{{ $setting->translate('en')->sitename??'' }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label for="exampleInputName">@lang('site.logo')</label>
                            <span id="logo_div_inside" class="inside-empty"></span>
                            <input id="logo_input_inside" type="file" name="logo" class="form-control logo" placeholder="@lang('site.logo')">
                            <img src="{{ $setting->logo_path }}" style="width: 100px" class="img-thumbnail logo-preview" alt="">

                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.icon')</label>
                            <span id="icon_div_inside" class="inside-empty"></span>
                            <input id="icon_input_inside" type="file" name="icon" class="form-control icon" placeholder="@lang('site.icon')">
                            <img src="{{ $setting->icon_path }}" style="width: 100px" class="img-thumbnail icon-preview" alt="">

                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label >@lang('site.email')</label>
                            <span id="email_div_inside" class="inside-empty"></span>
                            <input id="email_input_inside" type="email" name="email" class="form-control"  placeholder="@lang('site.email')" value="{{ $setting->email}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.phone_f')</label>
                            <span id="phone_f_div_inside" class="inside-empty"></span>
                            <input id="phone_f_input_inside" type="text" name="phone_f" class="form-control"  placeholder="@lang('site.phone_f')" value="{{ $setting->phone_f}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.phone_l')</label>
                            <span id="phone_l_div_inside" class="inside-empty"></span>
                            <input id="phone_l_input_inside" type="text" name="phone_l" class="form-control"  placeholder="@lang('site.phone_l')" value="{{ $setting->phone_l}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.facebook')</label>
                            <span id="facebook_div_inside" class="inside-empty"></span>
                            <input id="facebook_input_inside" type="text" name="facebook" class="form-control"  placeholder="@lang('site.facebook')" value="{{ $setting->facebook}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.youtube')</label>
                            <span id="youtube_div_inside" class="inside-empty"></span>
                            <input id="youtube_input_inside" type="text" name="youtube" class="form-control"  placeholder="@lang('site.youtube')" value="{{ $setting->youtube}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.twitter')</label>
                            <span id="twitter_div_inside" class="inside-empty"></span>
                            <input id="twitter_input_inside" type="text" name="twitter" class="form-control"  placeholder="@lang('site.twitter')" value="{{ $setting->twitter}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <label >@lang('site.google_plus')</label>
                            <span id="google_plus_div_inside" class="inside-empty"></span>
                            <input id="google_plus_input_inside" type="text" name="google_plus" class="form-control"  placeholder="@lang('site.google_plus')" value="{{ $setting->google_plus}}">
                        </div>

                        <div class="form-group col col-md-6">
                            <div class="form-group col col-md-6">
                                <label>@lang('site.status')</label>
                                <select name="status" class="form-control">
                                    <option value="open" {{ $setting->status == 'open'? 'selected':'' }}>@lang('site.open')</option>
                                    <option value="close" {{ $setting->status == 'close'? 'selected':'' }}>@lang('site.close')</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label>@lang('site.address_ar')</label>
                            <span id="ar_address_div_inside" class="inside-empty"></span>
                            <textarea name="ar[address]"  class="form-control">{{ $setting->translate('ar')->address??'' }}</textarea>
                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.address_en')</label>
                            <span id="en_address_div_inside" class="inside-empty"></span>
                            <textarea name="en[address]"  class="form-control">{{ $setting->translate('en')->address??'' }}</textarea>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.about_us_ar')</label>
                            <span id="ar_about_us_div_inside" class="inside-empty"></span>
                            <textarea name="ar[about_us]"  class="form-control summernote">{{ $setting->translate('ar')->about_us??'' }}</textarea>
                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.about_us_en')</label>
                            <span id="en_about_us_div_inside" class="inside-empty"></span>
                            <textarea name="en[about_us]"  class="form-control summernote">{{ $setting->translate('en')->about_us??'' }}</textarea>
                        </div>

                        <div class="form-group col col-md-6">
                            <label>@lang('site.keywords_ar')</label>
                            <span id="ar_keywords_div_inside" class="inside-empty"></span>
                            <input type="text" id="tags-input" name="ar[keywords]" class="form-control" data-role="tagsinput" value="{{ $setting->translate('ar')->keywords??'' }}" style="width: 100%;">
                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.keywords_en')</label>
                            <span id="en_keywords_div_inside" class="inside-empty"></span>
                            <input type="text" id="tags-input" name="en[keywords]" class="form-control" data-role="tagsinput" value="{{ $setting->translate('en')->keywords??'' }}" style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label>@lang('site.message_maintenace_ar')</label>
                            <span id="ar_message_maintenace_div_inside" class="inside-empty"></span>
                            <textarea name="ar[message_maintenace]" class="form-control">{{ $setting->translate('ar')->message_maintenace??'' }}</textarea>

                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.message_maintenace_en')</label>
                        	<span id="en_message_maintenace_div_inside" class="inside-empty"></span>
                            <textarea name="en[message_maintenace]" class="form-control">{{ $setting->translate('en')->message_maintenace??'' }}</textarea>

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
    <!-- bootstrap tags input plugin -->
    <script src="{{ asset('dashboard/plugins/tagInput/src/bootstrap-tagsinput.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('dashboard/plugins/summernote/summernote.js') }}"></script>

    <script>

        $(document).ready(function () {
            // preventDefault submit
            $('.bootstrap-tagsinput input').on('keypress', function(e){
                var key = e.which;
                if(key == 13)  // the enter key code
                {
                e.preventDefault();
                }
            });
            //Summernote
            $('.summernote').summernote({
                height: 200
            });

            // image preview
                $(".logo").change(function () {

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.logo-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }

                });

                $(".icon").change(function () {

                    if (this.files && this.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('.icon-preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(this.files[0]);
                    }

                    });

        });
    </script>
@endpush
