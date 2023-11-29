@extends('dashboard.layouts.master')

@push('css')
    <link href="{{URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
          rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ setting()->logo_path }}"
                             class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href="#"><img
                                                src="{{ setting()->icon_path }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">My<span>Dash</span>board</h1></div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Get Started</h2>
                                        <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="first_name">{{ __('First Name') }}</label>
                                                <input id="first_name" type="text" name="first_name"
                                                       class="form-control @error('first_name') is-invalid @enderror"
                                                       value="{{ old('first_name') }}" required autocomplete="first_name"
                                                       autofocus placeholder="Enter your First Name">
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="last_name">{{ __('Last Name') }}</label>
                                                <input id="last_name" type="text" name="last_name"
                                                       class="form-control @error('last_name') is-invalid @enderror"
                                                       value="{{ old('last_name') }}" required autocomplete="last_name"
                                                       autofocus placeholder="Enter your Last Name">
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" name="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       value="{{ old('email') }}" required autocomplete="email"
                                                       autofocus placeholder="Enter your E-mail Address">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="new-password"
                                                       autofocus placeholder="Enter your Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required autocomplete="new-password"
                                                       autofocus placeholder="Confirm your Password">
                                            </div>

                                            <button type="submit" class="btn btn-main-primary btn-block">
                                                {{ __('Register') }}
                                            </button>

                                        </form>
                                        <div class="row row-xs">
                                            <div class="col-sm-6">
                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                            </div>
                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                <button class="btn btn-danger btn-block"><i class="fab fa-google"></i> Signup with Google</button>
                                            </div>
                                        </div>

                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a
                                                    href="{{ route('login') }}">{{ __('Login') }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
