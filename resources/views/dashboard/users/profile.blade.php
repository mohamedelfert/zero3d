@extends('dashboard.layouts.app')
@section('title')
    {{$title}}
@stop
@push('css')
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                                       class="default-color">@lang('main.dashboard')</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')"
                               href="{{ route('dashboard.users.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <hr style="margin:30px 30px">

                    {!! Form::model($user,['route' => ['dashboard.editProfileData'],'method' => 'patch','files'=>true,'class'=>'form-horizontal']) !!}

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.input label="birthday" type="date" name="birthday" :value="$user->profile->birthday" placeholder="birthday" required/>
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.radio label="gender" name="gender" :checked="$user->profile->gender" :options="['male'=>'Male','female'=>'Female']"/>
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0 mb-3" id="lnWrapper">
                            <x-form.input label="street_address" name="street_address" :value="$user->profile->street_address" placeholder="street_address" required/>
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.input label="city" name="city" :value="$user->profile->city" placeholder="city" required/>
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.input label="state" name="state" :value="$user->profile->state" placeholder="state" required/>
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.input label="postal_code" name="postal_code" :value="$user->profile->postal_code" placeholder="postal_code" required/>
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.select label="country" name="country" :selected="$user->profile->country" :options="$countries"/>
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <x-form.select label="language" name="language" :selected="$user->profile->language" :options="$languages"/>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        @if(auth()->user()->id)
                            <button class="btn btn-main-primary btn-block pd-x-20"
                                    type="submit">@lang('main.update')</button>
                        @else
                            <a class="btn btn-main-primary btn-block pd-x-20 disabled">@lang('main.update')</a>
                        @endif
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@endsection
@push('js')
@endpush
