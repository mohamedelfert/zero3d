@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

                <div class="card-header pb-0">
                    <div class="box-header with-border">
                        <span style="display: block;margin-bottom:10px">@lang('main.products') : <small>( {{ $products->total() }} )</small></span>
{{--                        <form action="{{ route('dashboard.products.index') }}" method="get">--}}
                        <form action="{{ URL::current() }}" method="get">
                            <div class="row">
                                <div class="col-md-4">
{{--                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"--}}
{{--                                           placeholder="@lang('main.search')">--}}
                                    <x-form.input name="search" :value="request()->search" placeholder="search"/>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-sm" title="@lang('main.search')">
                                        <i class="fa fa-search"></i></button>
                                    <a class="btn btn-danger btn-sm" href="{{ route('dashboard.products.index') }}"
                                       title="@lang('main.clear')">
                                        <i class="fa fa-eraser"></i></a>
                                    @if(auth()->user()->hasPermissionTo('product-create'))
                                        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.products.create') }}"
                                           title="@lang('main.create')"><i class="fa fa-plus"></i></a>
                                    @else
                                        <a class="btn btn-primary btn-sm disabled" title="@lang('main.create')"><i class="fa fa-plus"></i></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <hr style="margin:10px 30px">

                <div class="card-body">
                    <div class="table-responsive">
                        @if($products->count() > 0)
                            <table class="table mg-b-0 text-md-nowrap table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> {{ trans('main.product') }} </th>
                                        <th> {{ trans('main.category') }} </th>
                                        <th> {{ trans('main.store') }} </th>
                                        <th> {{ trans('main.slug') }} </th>
                                        <th> {{ trans('main.status') }} </th>
                                        <th> {{ trans('main.created_at') }} </th>
                                        <th> {{ trans('main.control') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ optional($product->category)->name ?? '-' }}</td>
                                        <td>{{ optional($product->store)->name ?? '-' }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            @if(auth()->user()->hasPermissionTo('product-edit'))
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ route('dashboard.products.edit', $product->id) }}" title="@lang('main.edit')"><i
                                                        class="fa fa-edit"></i></a>
                                            @else
                                                <a href="#" class="btn btn-primary btn-sm disabled" title="@lang('main.edit')">
                                                    <i class="fa fa-edit"></i></a>
                                            @endif

                                                <a class="btn btn-secondary btn-sm"
                                                   href="{{ route('dashboard.products.show', $product->id) }}" title="@lang('main.show')"><i
                                                        class="fa fa-eye"></i></a>

                                            @if(auth()->user()->hasPermissionTo('product-delete'))
                                                @if ($product->name !== 'super_admin')
                                                    @can('product-delete')
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                           data-toggle="modal" href="#delete{{ $product->id }}" title="@lang('main.delete')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endcan
                                                @endif
                                            @else
                                                @if ($product->name !== 'super_admin')
                                                    <a href="#" class="btn btn-primary btn-sm disabled" data-effect="effect-scale"
                                                     title="@lang('main.delete')"><i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Delete -->
                                    <div class="modal fade" id="delete{{ $product->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{trans('main.delete')}}</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('dashboard.products.destroy',$product->id) }}" method="post">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <p>{{trans('main.delete_msg')}}</p><br>
                                                        <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                                        <input class="form-control" name="name" id="name" type="text"
                                                               value="{{ $product->name }}" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('main.close')}}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('main.confirm')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete -->

                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table mg-b-0 text-md-nowrap table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> {{ trans('main.name') }} </th>
                                        <th> {{ trans('main.category') }} </th>
                                        <th> {{ trans('main.store') }} </th>
                                        <th> {{ trans('main.slug') }} </th>
                                        <th> {{ trans('main.status') }} </th>
                                        <th> {{ trans('main.created_at') }} </th>
                                        <th> {{ trans('main.control') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center text-danger">@lang('main.no_data_found')</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $products->withQueryString()->links() }}

@endsection
