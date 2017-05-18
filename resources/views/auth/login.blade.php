@extends('layouts.master')

@section('title')
    Have fun with PlaSha !!
@endsection

@section('content')

<section id="banner">
    <div class="container">
        <!-- Log in Form
        ================================================= -->
        <div class="log-in-form">
            <a href="#" class="logo">Pla Sha</a>
            <h2 class="text-white">Pla Sha</h2>
            <div class="line-divider"></div>
            <div class="form-wrapper">
                <p class="login-text">Log in and enjoy the plan</p>
                <form role="form"  method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <fieldset class="form-group">
                        <input type="email" class="form-control" id="example-email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus>
                    </fieldset>
                    <fieldset class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" >
                        <input type="password" class="form-control" id="example-password" placeholder="Enter a password" name="password" required >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </fieldset>
                    <fieldset class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                    </fieldset>
                    <a class="btn btn-link" href="{{ route('password.reset') }}">
                        Forgot Your Password?
                    </a>
                    <button type="submit" class="btn-secondary">Log In</button>
                </form>
            </div>
            <small>Not Registered?
                <a class="btn btn-link" href="{{ route('register') }}">
                    Create an account
                </a>
            </small>
            <img class="form-shadow" src="images/bottom-shadow.png" alt="" />
        </div><!-- Log in Form End -->

        {{--<svg class="arrows hidden-xs hidden-sm">
          <path class="a1" d="M0 0 L30 32 L60 0"></path>
          <path class="a2" d="M0 20 L30 52 L60 20"></path>
          <path class="a3" d="M0 40 L30 72 L60 40"></path>
        </svg>--}}
    </div>
</section>
@endsection
