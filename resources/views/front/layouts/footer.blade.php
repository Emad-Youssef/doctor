<!-- ***** Footer Area Start ***** -->
<footer class="footer-area section-padding-100">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="footer-widget-area">
                            <div class="footer-logo">
                                <img src="{{ asset('uploads').'/'.$setting->logo }}" alt="">
                            </div>
                            <img src="{{ asset('front/rtl') }}/img/icons/map-pin.png" alt="">
                            <p>{{ $setting->address }}</p>
                            <div class="footer-social-info">
                                <a href="{{ $setting->google_plus }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                <a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>@lang('site.latest_news')</h6>
                            </div>
                            <div class="widget-blog-post">

                                @foreach($last_news as $news)
                                    <!-- Single Blog Post -->
                                    <div class="widget-single-blog-post d-flex">
                                        <div class="widget-post-thumbnail">
                                            <img src="{{ asset('uploads/'.$news->img) }}" alt="">
                                        </div>
                                        <div class="widget-post-content">
                                            <a href="#">{{ $news->title }}</a>
                                            <p>{{  \Carbon\Carbon::parse($news->creted_at)->format('Y-m-d') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>@lang('site.contact')</h6>
                            </div>
                            <div class="footer-contact-form">
                                <form class="add-ajax" data-route="{{ route('dashboard.contact.store') }}" method="post" data-token="{{ csrf_token() }}">
                                    @csrf
                                    <span id="name_div_inside" class="inside-empty"></span>
                                    <input type="text" id="name_input_inside" class="form-control border-top-0 border-right-0 border-left-0" name="name"  placeholder="@lang('site.name')">
                                    <span id="email_div_inside" class="inside-empty"></span>
                                    <input type="email" id="email_input_inside" class="form-control border-top-0 border-right-0 border-left-0" name="email" placeholder="@lang('site.email')">
                                    <span id="subject_div_inside" class="inside-empty"></span>
                                    <input type="text" id="subject_input_inside" class="form-control border-top-0 border-right-0 border-left-0" name="subject" placeholder="@lang('site.subject')">
                                    <span id="message_div_inside" class="inside-empty"></span>
                                    <textarea id="message_input_inside" name="message" class="form-control border-top-0 border-right-0 border-left-0" placeholder="@lang('site.message')"></textarea>
                                    <button type="submit" class="btn medilife-btn">@lang('site.send')<span>+</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                @lang('site.copyright') <script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i>  @lang('site.by')  <a href="#" target="_blank"> @lang('site.elm8flgeen')</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    @if(app()->getLocale() == 'ar')
       <!-- jQuery (Necessary for All JavaScript Plugins) -->
        <script src="{{ asset('front/rtl') }}/js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="{{ asset('front/rtl') }}/js/popper.min.js"></script>
        <script src="{{ asset('front/rtl') }}/js/bootstrap.min.js"></script>
        <!-- Bootstrap js -->

    @else
        <!-- jQuery (Necessary for All JavaScript Plugins) -->
        <script src="{{ asset('front/ltr') }}/js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="{{ asset('front/ltr') }}/js/popper.min.js"></script>
        <script src="{{ asset('front/ltr') }}/js/bootstrap.min.js"></script>
        <!-- Bootstrap js -->
    @endif
    <!-- Plugins js -->
    <script src="{{ asset('front/rtl') }}/js/plugins.js"></script>
        <!-- Active js -->
    <script src="{{ asset('front/rtl') }}/js/active.js"></script>

    <script src="{{ asset('front/rtl') }}/js/flatpickr.js"></script>
    <!-- toastr -->
    <script src="{{ asset('dashboard') }}/plugins/toastr/toastr.js"></script>
    <script>
        $(function () {
            //Date picker

            flatpickr("#myID", {});

            //ajax pockets
            $('.add-ajax').on('submit',function (event) {
                event.preventDefault();
                var route   = $(this).data('route');
                var dataSend   = new FormData(this);

                // var btn_text = $('.add-ajax span').html();
                // $('.add-ajax span').attr('disabled', 'disabled');
                // $('.add-ajax span').text('loading...');
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
                            $('.date-pockets').empty()
                            $('.inside-empty').empty()
                            $.each( data.message, function( key, value ) {

                                $('#'+key+'_div_inside').empty()
                                $('#'+key+'_input_inside').addClass('has-error')
                                $('#'+key+'_div_inside').append('<small class="has-val">'+value+'</small>');

                            });
                        }else if(data.status === 1){
                            toastr.success(data.message);
                            window.location.reload()
                        }else{

                            $('.date-pockets').empty()
                            $('.date-pockets').append('<p class="alert alert-danger">'+data.message+'</p>');
                        }
                    }
                });

            });

        });



    </script>


    @stack('scripts')

</body>

</html>
