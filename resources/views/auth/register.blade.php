@extends('layouts.master')

@section('content')

 <div id="lp-register">
    <div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white">Make Cool Friends !!!</h1>
                    <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more.</p>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="reg-form-container">

                  <!--Registration Form Contents-->
                  <div class="tab-content">
                    <div class="tab-pane active" id="register">
                      <h3>Register Now !!!</h3>
                      <p>Be cool and join today. Meet millions</p>

                      <!--Register Form-->
                      <form name="registration_form" id='registration_form' class="form-inline" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="form-group col-xs-6">
                            <label for="firstname" class="sr-only">First Name *</label>
                            <input id="firstname" class="form-control input-group-lg" type="text" name="first_name" title="Enter first name" placeholder="First name" value="{{old('first_name')}}"/>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="lastname" class="sr-only">Last Name *</label>
                            <input id="lastname" class="form-control input-group-lg" type="text" name="last_name" title="Enter last name" placeholder="Last name" value="{{old('last_name')}}"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-xs-12">
                            <label for="email" class="sr-only">Email *</label>
                            <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-xs-12">
                            <label for="password" class="sr-only">Password *</label>
                            <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                          </div>
                        </div>
                        <div class="row">
                          <p class="birth"><strong>Date of Birth *</strong></p>
                          <div class="form-group col-sm-3 col-xs-6">
                            <label for="month" class="sr-only"></label>
                            <select class="form-control" id="day" name = "day">
                              <option value="Day" disabled selected>Day</option>
                              <?php
                                for($i = 1; $i <=31 ;$i++) {
                                    $html = '<option value="'.$i.'">';
                                    $html .= $i;
                                    $html .= '</option>';
                                    echo $html;
                                }
                               ?>
                            </select>
                          </div>
                          <div class="form-group col-sm-3 col-xs-6">
                            <label for="month" class="sr-only"></label>
                            <select class="form-control" id="month" name="month">
                              <option value="month" disabled selected>Month</option>
                              <option value="01">Jan</option>
                              <option value="02">Feb</option>
                              <option value="03">Mar</option>
                              <option value="04">Apr</option>
                              <option value="05">May</option>
                              <option value="06">Jun</option>
                              <option value="07">Jul</option>
                              <option value="08">Aug</option>
                              <option value="09">Sep</option>
                              <option value="10">Oct</option>
                              <option value="11">Nov</option>
                              <option value="12">Dec</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="year" class="sr-only"></label>
                            <input type="number" class="form-control" id="year" name="year" placeholder="Year">
                          </div>
                        </div>
                        <div class="form-group gender">
                          <label class="radio-inline">
                            <input type="radio" name="gender" checked value="male">Male
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="gender" value="female">Female
                          </label>
                        </div>
                        @if ( $errors->any() )
                            <ul class="help-block">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        @endif
                        <button class="btn-secondary col-md-offset-3" type="submit">Register Now</button>
                      </form><!--Register Now Form Ends-->
                      <p align="center"><a href="{{ route('login') }}" class="text-white">Already have an account?</a></p>
                        <div class="row">
                            <!--Social Icons-->
                            <ul class="list-inline social-icons">
                              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!--Registration Form Contents Ends-->
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>








{{--

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default register">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
