@extends('layouts.app')

@section('content')
    <section class="register-section pt-100 pb-100 loaded">
        <div class="container">
            <div class="register-box">

                <div class="sec-title text-center mb-30">
                    <h2 class="title mb-10">Create New Account</h2>
                </div>

                <!-- Login Form -->
                <div class="styled-form">
                    <div id="form-messages"></div>
                    <form id="contact-form" method="post" action="{{ route('register') }}">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="row clearfix">
                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="name" name="name" value="" placeholder="Name" required="" autofocus>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="email" id="email" name="email" value="" placeholder="Email address " required="">
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="number" id="phone" name="phone" value="" placeholder="Phone Number" required="">
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="address" name="address" value="" placeholder="Address" required="">
                            </div>
                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="password" name="password" value="" placeholder="Password" required="">
                            </div>
                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="password-confirmation" name="password_confirmation" value="" placeholder="Confirm Password" required="">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="row clearfix">
                                    <!-- Column -->
                                    <div class="column col-lg-3 col-md-4 col-sm-12">
                                        <div class="radio-box">
                                            <input type="radio" name="remember-password" id="type-1">
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="column col-lg-3 col-md-4 col-sm-12">
                                        <div class="radio-box">
                                            <input type="radio" name="remember-password" id="type-2">
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="column col-lg-3 col-md-4 col-sm-12">
                                        <div class="radio-box">
                                            <input type="radio" name="remember-password" id="type-3">
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="column col-lg-12 col-md-12 col-sm-12">
                                        <div class="check-box">
                                            <input type="checkbox" name="remember-password" id="type-4">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                <button type="submit" class="readon register-btn"><span class="txt">Sign Up</span></button>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="users">Already have an account? <a href="{{ route('login') }}">Sign In</a></div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
