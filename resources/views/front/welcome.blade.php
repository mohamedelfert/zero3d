@extends('front.layouts.app')

@section('title')
    Title Here
@endsection
@push('css')
@endpush

@section('content')

    <div class="content-wrapper">

        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">@lang('main.welcome')</h2>
                </div>
            </div>
            <div class="main-dashboard-header-right">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="#" class="default-color">@lang('main.dashboard')</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics ht-500">
                    <div class="box-header with-border pt-3 pl-3 pr-3">
                        <h1>Page Title goes here</h1>
                    </div>

                    <div class="card-body">
                        <p>Page content goes
                            here<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('js')
@endpush
