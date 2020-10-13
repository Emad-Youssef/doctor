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
        <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
        <li class="{{ route('dashboard.admins.index') }}">@lang('site.admins')</li>
        <li class="active">@lang('site.profile')</li>
      </ol>
    </section>

     <!-- Main content -->
     <section class="content">

      <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">@lang('site.timeline')</a></li>
              <li><a href="#settings" data-toggle="tab">@lang('site.settings')</a></li>
            </ul>
            <div class="tab-content">

              <!-- /.tab-pane -->
              <div class="tab-pane active" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          -----------------
                      </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>  -----------------</span>

                      <h3 class="timeline-header"><a href="#"> ----------------- </a>  -----------------</h3>

                      <div class="timeline-body">
                      -----------------

                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>  -----------------</span>

                      <h3 class="timeline-header no-border"><a href="#"> -----------------</a>  -----------------
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>  -----------------</span>

                      <h3 class="timeline-header"><a href="#"> -----------------</a>  -----------------</h3>

                      <div class="timeline-body">
                      -----------------

                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs"> -----------------</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                        -----------------
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>  -----------------</span>

                      <h3 class="timeline-header"><a href="#"> -----------------</a> -----------------</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-ajax" data-route="{{ route('dashboard.profile',$admin->id ) }}" method="post"">
                          @csrf
                          <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="exampleInputName">@lang('site.name')</label>
                                <span id="name_div_inside" class="inside-empty"></span>
                                <input id="name_input_inside" type="text" name="name" class="form-control" id="exampleInputName" value="{{ $admin->name }}">

                            </div>

                            <div class="form-group col col-md-6">
                                <label for="exampleInputEmail">@lang('site.email')</label>
                                <span id="email_div_inside" class="inside-empty"></span>
                                <input id="email_input_inside" type="email" name="email" class="form-control" id="exampleInputEmail" value="{{ $admin->email }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="exampleInputPassword">@lang('site.password')</label>
                                <span id="password_div_inside" class="inside-empty"></span>
                                <input id="password_input_inside" type="password" name="password" class="form-control" id="exampleInputPassword" autocomplete="no"  placeholder="@lang('site.password')">
                            </div>

                            <div class="form-group col col-md-6">
                                <label for="exampleInputPassword2">@lang('site.password_confirmed')</label>
                                <input type="password" name="password_confirmation" class="form-control" autocomplete="off"  id="exampleInputPassword2" placeholder="@lang('site.password_confirmed')">
                            </div>

                        </div>
                          <div class="form-group">
                              <button class="btn btn-primary submit-ajax"><i class="fa fa-edit"></i> <span>@lang('site.edit')</span></button>
                          </div>

                  </form>
                  <div class="alert alert-danger hasError hidden">

                  </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('dashboard')}}/dist/img/avatar5.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $admin->name }}</h3>

              <p class="text-muted text-center">@lang('site.admin')</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>@lang('site.email')</b> <a class="">{{ $admin->email }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  <!-- /.content -->


@endsection

@push('scripts')

@endpush
