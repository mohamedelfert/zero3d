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
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                               class="default-color">@lang('main.dashboard')</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>@lang('main.error')</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')"
                               href="{{ route('dashboard.categories.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    {!! Form::open(array('route' => 'dashboard.categories.store','method'=>'POST','files'=>'true')) !!}
                    <div class="card-body">
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <p> {{ trans('main.category') }} </p>
                                {!! Form::text('name', old('name'), array('class' => 'form-control','required'=> 'required')) !!}
                            </div>
                            <div class="col-lg-6">
                                <p> {{ trans('main.category_parent') }} </p>
                                {!! Form::select('parent_id',App\Models\Category::pluck('name','id'),request()->parent_id ?? null,['class'=>'form-control col',
                                    'placeholder'=>__("main.category_parent")]) !!}
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
{{--                            <div class="col-lg-6">--}}
{{--                                <p> {{ trans('main.status') }} </p>--}}
{{--                                {!! Form::select('status',['active'=>__('active'),'archived'=>__('archived')] ,null,['class'=>'form-control mb-2','id'=>'status']) !!}--}}
{{--                            </div>--}}
                            <div class="col-lg-6">
                                <p> {{ trans('main.status') }} </p>
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="status" id="active" value="active" checked @checked(old('status') == 'active')>--}}
{{--                                    <label class="form-check-label" for="active">--}}
{{--                                        {{ trans('main.active') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="status" id="archived" value="archived" @checked(old('status') == 'archived')>--}}
{{--                                    <label class="form-check-label" for="archived">--}}
{{--                                        {{ trans('main.archived') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                                <x-form.radio name="status" :checked="$category->status" :options="['active'=>'Active','archived'=>'Archived']"/>
                            </div>
                            <div class="col-lg-6">
                                <p> {{ trans('main.image') }} </p>
                                {!! Form::file('image',['class'=>'form-control col','placeholder'=>__("main.image"),'onchange'=>"loadImage(event)"]) !!}
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-12">
                                <p> {{ trans('main.description') }} </p>
                                {!! Form::textarea('description',null,['class'=>'form-control col','rows'=>'3','placeholder'=>__("Description"),
                                    isset($readOnly)?$readOnly:null]) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                    class="btn btn-main-primary btn-block">{{trans('main.confirm')}}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
