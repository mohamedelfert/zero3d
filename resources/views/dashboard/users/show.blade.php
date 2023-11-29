@extends('dashboard.layouts.app')
@section('title')
    {{$title}}
@stop
@push('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <style>
        .gradient-custom {
            background: #f6d365;
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }
    </style>
@endpush
@section('content')

    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ $title }}</h2>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="default-color">@lang('main.dashboard')</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-lg-6 mb-4 mb-lg-0">
                                <div class="card mb-3" style="border-radius: .5rem;">
                                    <div class="row g-0">
                                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                            <img src="{{ $user->image_path }}"
                                                alt="..." class="img-fluid my-5 brround" style="width: 80px;"
                                            />
                                            <h5>
                                                @if ($user->role_name == 'super_admin')
                                                    @lang('main.super_admin')
                                                @elseif($user->role_name == 'admin')
                                                    @lang('main.admin')
                                                @elseif($user->role_name == 'user')
                                                    @lang('main.user')
                                                @endif
                                            </h5>
                                            <i class="far fa-user fa-2x mb-5"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <h6>@lang('main.user_details')</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>@lang('main.username')</h6>
                                                        <p class="label text-primary d-flex">{{ $user->first_name . ' ' . $user->last_name }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>@lang('main.email')</h6>
                                                        <p class="label text-warning d-flexd">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>@lang('main.status')</h6>
                                                        <p class="text-muted">
                                                            @if ($user->status == 'active')
                                                                <span class="label text-success d-flex">{{ $user->status }}</span>
                                                            @else
                                                                <span class="label text-danger d-flex">{{ $user->status }}</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>@lang('main.created_at')</h6>
                                                        <p class="text-muted">
                                                            <span class="label text-info d-flex">{{ $user->created_at }}</span>
                                                        </p>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        @if($user->id === auth()->user()->id)
                                                            <a href="{{ route('dashboard.users.showProfile', $user->id) }}"
                                                               class="btn btn-primary btn-block" title="@lang('main.edit')">
                                                                <i class="fa fa-edit"> @lang('main.edit') </i></a>
                                                        @else
                                                            <a class="btn btn-primary btn-block disabled"
                                                               title="@lang('main.edit')"><i class="fa fa-edit"> @lang('main.edit') </i></a>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('dashboard/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('dashboard/js/modal.js') }}"></script>
@endpush
