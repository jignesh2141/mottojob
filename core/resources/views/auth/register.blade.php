@extends('layouts.mottojob_front')

@section('content')
    <!--Login Form Section Start-->
    <section class="login-form bg-gray section-padding">
        <div class="container">
            <div class="login-section bg-white">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        
                            <div class="panel-heading">
                                <h2 class="login-title">Sign Up</h2>
                            </div>
                            <div class="panel-body">
                                <p class="login-msg">Sign Up to Motto Job</p>
                                
                                <form method="POST" id="registerForm" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" type="text" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" name="email" type="email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" type="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Verify Password" type="password" name="password_confirmation" required>
                                        </div>
                                        <input class="btn btn-lg btn-primary" type="submit" value="Sign Up">
                                    </fieldset>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 text-center">
                <div class="account-msg">Already have an account?  <a href="{{ route('login') }}">Login here!</a> </div>
            </div>
        </div>
    </section>
    <!--Login Form Section Over-->
    <script>
    $().ready(function() {
        // validate the comment form when it is submitted
        $("#registerForm").validate();
    });
    </script>
                
@endsection
