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
                            <div class="panel-heading">
                                <h2 class="login-title">{{ __('Reset Password') }}</h2>
                            </div>
                            <div class="panel-body">
                                
                                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" name="email" type="email" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <input class="btn btn-lg btn-primary" type="submit" value="{{ __('Send Password Reset Link') }}">
                                    </fieldset>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Login Form Section Over-->
@endsection
