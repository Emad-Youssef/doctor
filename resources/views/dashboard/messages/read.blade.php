@extends('dashboard.index')
@push('head')

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
        <li class="#"><a href="{{ route('dashboard.contact.index') }}">@lang('site.mailbox')</a></li>
        <li class="active">@lang('site.'.$title)</li>
      </ol>
    </section>
   <section class="content">
        <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('site.mainList')</h3>
                <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ route('dashboard.contact.index') }}"><i class="fa fa-inbox"></i>@lang('site.newMail') <span class="label label-primary pull-right">{{$newMessages->count()}}</span></a></li>
                </ul>
            </div><!-- /.box-body -->
            </div><!-- /. box -->

        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('site.mailbox')</h3>

                </div><!-- /.box-header -->

                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3>{{$message->subject}}</h3>
                    <h5>@lang('site.from') : {{$message->email}} <span class="mailbox-read-time"> {{$message->created_at}}</span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    {{$message->message}}
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->




              </div>
              <!-- /.box-body -->
                <!-- /.box-body -->
        </div>

    </section>


@endsection

@push('scripts')
    <!-- image-preview -->
    <script src="{{ asset('dashboard/plugins/image_preview/image_preview.js') }}"></script>
    <script src=".{{asset('dashboard')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
@endpush
