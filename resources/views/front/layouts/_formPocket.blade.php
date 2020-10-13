@push('head')
    <link rel="stylesheet" href="{{ asset('front/rtl') }}/css/flatpickr.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/plugins/toastr/toastr.css">
@endpush
    <!-- ***** Book An Appoinment Area Start ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="medilife-appointment-form">

                                    <form class="add-ajax" data-route="{{ route('pocket') }}" method="post" data-token="{{ csrf_token() }}">
                                    @csrf

                                        <div class="row align-items-end">
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <span id="f_name_div_inside" class="inside-empty"></span>
                                                    <input id="f_name_input_inside" type="text" name="f_name" class="form-control border-top-0 border-right-0 border-left-0"  placeholder="@lang('site.f_name')">

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <span id="l_name_div_inside" class="inside-empty"></span>
                                                    <input id="l_name_input_inside" type="text" name="l_name" class="form-control border-top-0 border-right-0 border-left-0"  placeholder="@lang('site.l_name')">

                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                     <span id="country_div_inside" class="inside-empty"></span>
                                                    <input id="country_input_inside" type="text" name="country" class="form-control border-top-0 border-right-0 border-left-0"  placeholder="@lang('site.country')">

                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <span id="city_div_inside" class="inside-empty"></span>
                                                    <input id="city_input_inside" type="text" name="city" class="form-control border-top-0 border-right-0 border-left-0"  placeholder="@lang('site.city')">

                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                     <span id="sex_div_inside" class="inside-empty"></span>
                                                    <select id="sex_input_inside" class="form-control" name="sex">
                                                        <option value="male">@lang('site.male')</option>
                                                        <option value="female">@lang('site.female')</option>
                                                    </select>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                     <span id="phone_div_inside"  class="inside-empty"></span>
                                                    <input id="phone_input_inside" type="text" class="form-control border-top-0 border-right-0 border-left-0" name="phone" id="number" placeholder="@lang('site.phone')">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                     <span id="age_div_inside" class="inside-empty"></span>
                                                    <input id="age_input_inside" type="text" class="form-control border-top-0 border-right-0 border-left-0" name="age"  placeholder="@lang('site.age')">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                     <span id="current_date_div_inside" class="inside-empty"></span>
                                                <input type="text" name="current_date" class="form-control pull-right" id="myID">
                                                </div>
                                                <div class="date-pockets">

                                                </div>
                                            </div>

                                            <div class="col-12 col-md-5 mb-0">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn medilife-btn submit-ajax">@lang('site.add')<span>+</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="medilife-contact-info">
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="{{ asset('front/rtl') }}/img/icons/alarm-clock.png" alt="">
                                        <p>@lang('site.note'):<br>
                                            @lang('site.we_will_contact_you')
                                        </p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="{{ asset('front/rtl') }}/img/icons/envelope.png" alt="">
                                        <p>@lang('site.for_queries'):<br>
                                            {{ $setting->phone_f }} <br>
                                            {{ $setting->phone_l }}
                                        </p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info">
                                        <img src="{{ asset('front/rtl') }}/img/icons/map-pin.png" alt="">
                                        <p>{{ $setting->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Book An Appoinment Area End ***** -->
