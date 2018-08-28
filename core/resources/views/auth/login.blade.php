@extends('layouts.mottojob_front')

@section('content')
<!--Login Form Section Start-->
    <section class="login-form bg-gray section-padding">
        <div class="container">
            <div class="login-section bg-white">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <div class="panel-heading">
                                <h2 class="login-title">Log In</h2>
                            </div>
                            <div class="panel-body">
                                <p class="login-msg">Log in to Motto Job</p>
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <fieldset>
                                        @if ($errors->has('email'))
                                            <div class="form-group">
                                                <span class="invalid-feedback login-error" role="alert">
                                                    <strong>Oops! That email/password combination is not valid.</strong>
                                                </span>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" name="email" type="email" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" type="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="f-password">
                                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                        </div>

                                        </div>
                                        <input class="btn btn-lg btn-primary" type="submit" value="{{ __('Login') }}">
                                    </fieldset>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 text-center">
                <div class="account-msg">Don’t have an account?  <a href="{{ route('register') }}">Sign Up!</a> </div>
            </div>
        </div>
    </section>
    <!--Login Form Section Over-->
@endsection
