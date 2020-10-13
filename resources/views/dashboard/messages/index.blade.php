@extends('dashboard.index')
@push('head')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/plugins/iCheck/all.css">
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
        <li class="active">@lang('site.mailbox')</li>
      </ol>
    </section>

   <!-- Main content -->
   <section class="content">
        <div class="row">
        <div class="col-md-3">
            <a href="{{ route('dashboard.contact.create') }}" class="btn btn-primary btn-block margin-bottom">@lang('site.send')</a>
            <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('site.mainList')</h3>
                <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i>@lang('site.newMail') <span class="label label-success pull-right">{{$newMessages->count()}}</span></a></li>
                </ul>
            </div><!-- /.box-body -->
            </div><!-- /. box -->

        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('site.mailbox')</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive mailbox-messages">
                <form data-route="{{route('dashboard.destroyContact')}}" method="post" id="formDeleteAll">

                    @csrf
                    {!! $dataTable->table([
                        'class' => 'table table-bordered table-hover',
                    ], true) !!}
            </form
                </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

<!-- Modal isChecked-->
<div class="modal fade" id="isChecked" tabindex="-1" role="dialog" aria-labelledby="isCheckedLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content alert alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="isCheckedLabel">@lang('site.deleteALL')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        @lang('site.delete_all')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
        <button type="button" class="btn btn-primary submitFormDelete">@lang('site.deleteALL')</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal notChecked-->
<div class="modal fade" id="notChecked" tabindex="-1" role="dialog" aria-labelledby="notCheckedLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content alert alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="notCheckedLabel">@lang('site.deleteALL')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        @lang('site.checkbox_is_null')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script> -->
<!-- DataTables -->
<script src="{{ asset('dashboard') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('dashboard') }}/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('dashboard') }}/plugins/iCheck/icheck.min.js"></script>

    {!! $dataTable->scripts() !!}

@endpush
