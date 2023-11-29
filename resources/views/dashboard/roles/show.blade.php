@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@stop
@push('css')
    <!--Internal  treeview -->
    <link href="{{ URL::asset('dashboard/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css"/>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')" href="{{ route('dashboard.roles.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a class="text-primary"> {{ ucfirst($role->name) }} - {{ ucfirst($role->display_name) }}</a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $permission)
                                            <li>{{ $permission->name }} - {{ $permission->display_name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{ URL::asset('dashboard/plugins/treeview/treeview.js') }}"></script>
@endpush
