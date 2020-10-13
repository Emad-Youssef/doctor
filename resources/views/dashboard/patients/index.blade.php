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
        <li class="active">@lang('site.patients')</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
                <div class="box-header">
                <h3 class="box-title">@lang('site.'.$title)</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table table-responsive">
                        @csrf
                        {!! $dataTable->table([
                            'class' => 'table table-bordered table-hover',
                        ], true) !!}
                    </div>
                </div>
                <!-- /.box-body -->
        </div>

    </section>


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
<script>
     $(function () {

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

     })
</script>
{!! $dataTable->scripts() !!}
@endpush
