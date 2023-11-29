<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Title -->
        <title> {{ setting()->site_name_en }} </title>
        <!-- Favicon -->
        <link rel="icon" href="{{ setting()->icon_path }}" type="image/x-icon"/>
        <!-- Icons css -->
        <link href="{{URL::asset('dashboard/css/icons.css')}}" rel="stylesheet">
        <!--  Custom Scroll bar-->
        <link href="{{URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
        <!--  Sidebar css -->
        <link href="{{URL::asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

        @if (app()->getLocale() == 'ar')
            <!-- Sidemenu css -->
            <link rel="stylesheet" href="{{URL::asset('dashboard/css-rtl/sidemenu.css')}}">
            <!--- Style css -->
            <link href="{{URL::asset('dashboard/css-rtl/style.css')}}" rel="stylesheet">
            <!--- Dark-mode css -->
            <link href="{{URL::asset('dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
            <!---Skinmodes css-->
            <link href="{{URL::asset('dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
            <style>
                body, h1, h2, h3, h4, h5, h6 {
                    font-family: 'Cairo', sans-serif !important;
                }
            </style>
        @else
        <!-- Sidemenu css -->
            <link rel="stylesheet" href="{{URL::asset('dashboard/css/sidemenu.css')}}">
            <!--- Style css -->
            <link href="{{URL::asset('dashboard/css/style.css')}}" rel="stylesheet">
            <!--- Dark-mode css -->
            <link href="{{URL::asset('dashboard/css/style-dark.css')}}" rel="stylesheet">
            <!---Skinmodes css-->
            <link href="{{URL::asset('dashboard/css/skin-modes.css')}}" rel="stylesheet">
        @endif

        @toastr_css
        @stack('css')

    </head>

    <body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{URL::asset('dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
