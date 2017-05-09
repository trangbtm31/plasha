@extends('layouts.master')

@section('title')
    Have fun with PlaSha !!
@endsection

@section('content')

@if(!Auth::check())
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
@else
<?php redirect()->route('home'); ?>
@endif
{{--<div class="container" >
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default login" >
                <div class="panel-heading text-center">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <small>Not Registered?
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        Create an account
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4 sociality">
                                <a href="#">
                                    <img class="img-circle" src="{{ URL::to('/') }}/images/facebook.png" >
                                </a>
                                <a href="#">
                                    <img class="img-circle" src="{{ URL::to('/') }}/images/google-plus.png" style="width:75px;">
                                </a>
                                <a href="#">
                                    <img class="img-circle" src="{{ URL::to('/') }}/images/twitter.png" >
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}

    {{--<div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <h3>Log in</h3>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">User name</label>
                        <input id="email" type="email" class="form-control col-md-8" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group row  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4">Password</label>
                        <input id="password" type="password" class="col-md-8 form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>


                <h3>Sign up</h3>
                <form method="post" action="">
                    <div class="form-group row">
                        <label for="username" class="col-md-4">User name</label>
                        <input class="col-md-8 form-control" type="text" name="username">
                    </div>
                    <div class="form-group row">
                            <label for="username" class="col-md-4">First name</label>
                            <input class="col-md-8 form-control" type="text" name="username">
                    </div>
                    <div class="form-group row">
                            <label for="username" class="col-md-4">Last name</label>
                            <input class="col-md-8 form-control" type="text" name="username">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4">Email</label>
                        <input id="email" type="email" class="form-control col-md-8" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4">Password</label>
                        <input class="col-md-8 form-control" type="password" name="password">
                    </div>
                    <div class="form-group row">
                        <label for="validate" class="col-md-4">Validate Password</label>
                        <input class="col-md-8 form-control" type="password" name="validate">
                    </div>
                    <div class="form-group row">
                        <input class="col-md-3 offset-md-9 btn btn-default" type="submit" name="signup">
                    </div>
                </form>
            </div>
        </div>
    </div>--}}
@endsection
