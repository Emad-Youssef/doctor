<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{ $setting->sitename }}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('uploads').'/'.$setting->icon }}">

    @if(app()->getLocale() == 'ar')
        <!-- Style rtl CSS -->
        <link rel="stylesheet" href="{{ asset('front/rtl') }}/style.css">
        <link rel="stylesheet" href="{{ asset('front/rtl') }}/styleRTL.css">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
        </style>
    @else
        <!-- Style ltr CSS -->
        <link rel="stylesheet" href="{{ asset('front/ltr') }}/style.css">
    @endif

    @stack('head')

    <style>
        .has-error{
            border: 1px solid red;

        }
        .has-val{
            color : #fff;
            padding: 5px
        }
    </style>


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
            <div class="medilife-load"></div>
    </div>
