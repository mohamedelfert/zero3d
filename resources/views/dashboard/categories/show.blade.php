@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@stop
@push('css')
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
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')" href="{{ route('dashboard.categories.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-4">
                                <p class="text-muted">
                                    <img class="img-fluid" src="{{ $category->image_path }}" alt="@lang('main.category')" style="width: 210px;height: 140px;">
                                </p>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="media-list pb-0">
                                    <div class="media">
                                        <div class="media-body">
                                            <div>
                                                <label>@lang('main.name')</label> : <span class="tx-medium text-primary">{{ $category->name }}</span>
                                            </div>
                                            <div>
                                                <label>@lang('main.category_parent')</label> : <span class="tx-medium text-primary">{{ $category->parent_id ?? 'No Parent' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-body">
                                            <div>
                                                <label>@lang('main.slug')</label> : <span class="tx-medium text-danger">{{ $category->slug }}</span>
                                            </div>
                                            <div>
                                                <label>@lang('main.created_at')</label> : <span class="tx-medium text-info">{{ $category->created_at }}</span>
                                            </div>
                                            <div>
                                                <label>@lang('main.updated_at')</label> : <span class="tx-medium text-info">{{ $category->updated_at }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-body">
                                            <div>
                                                <label>@lang('main.description')</label> : <span class="tx-medium text-primary">{{ $category->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> {{ trans('main.product') }} </th>
                                                <th> {{ trans('main.store') }} </th>
                                                <th> {{ trans('main.status') }} </th>
                                                <th> {{ trans('main.created_at') }} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $products = $category->products()->with('store')->latest()->paginate(5);
                                        @endphp
                                        @forelse($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ optional($product->store)->name }}</td>
                                                <td>{{ $product->status }}</td>
                                                <td>{{ $product->created_at }}</td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="text-center text-danger">@lang('main.no_data_found')</td>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
