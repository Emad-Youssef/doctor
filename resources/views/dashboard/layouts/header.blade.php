<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @if(!empty($title))
        @lang('site.'.$title)
    @else
        @lang('site.controlPanel')
    @endif
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- toastr -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/plugins/toastr/toastr.css">

  @stack('head')

  @if(app()->getLocale() == 'ar')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/rtl/dist/css/AdminLTE-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/rtl/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/rtl/dist/css/rtl.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
        .sidebar-menu li>a>.pull-right-container {
            position: absolute;
            left: 10px;
            top: 50%;
            margin-top: 7px !important;
        }
    </style>

  @else
     <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/dist/css/AdminLTE.min.css">
  @endif
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
       .has-val{
        color: red;
       }
       .has-error{
        border: 1px solid red;
       }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
