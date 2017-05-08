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
                      <p class="text-muted">Be cool and join today. Meet millions</p>

                      <!--Register Form-->
                      <form name="registration_form" id='registration_form' class="form-inline" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="form-group col-xs-6">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name"/>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-xs-12">
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-xs-12">
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                          </div>
                        </div>
                        <div class="row">
                          <p class="birth"><strong>Date of Birth</strong></p>
                          <div class="form-group col-sm-3 col-xs-6">
                            <label for="month" class="sr-only"></label>
                            <select class="form-control" id="day">
                              <option value="Day" disabled selected>Day</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                              <option>13</option>
                              <option>14</option>
                              <option>15</option>
                              <option>16</option>
                              <option>17</option>
                              <option>18</option>
                              <option>19</option>
                              <option>20</option>
                              <option>21</option>
                              <option>22</option>
                              <option>23</option>
                              <option>24</option>
                              <option>25</option>
                              <option>26</option>
                              <option>27</option>
                              <option>28</option>
                              <option>29</option>
                              <option>30</option>
                              <option>31</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-3 col-xs-6">
                            <label for="month" class="sr-only"></label>
                            <select class="form-control" id="month">
                              <option value="month" disabled selected>Month</option>
                              <option>Jan</option>
                              <option>Feb</option>
                              <option>Mar</option>
                              <option>Apr</option>
                              <option>May</option>
                              <option>Jun</option>
                              <option>Jul</option>
                              <option>Aug</option>
                              <option>Sep</option>
                              <option>Oct</option>
                              <option>Nov</option>
                              <option>Dec</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="year" class="sr-only"></label>
                            <select class="form-control" id="year">
                              <option value="year" disabled selected>Year</option>
                              <option>2000</option>
                              <option>2001</option>
                              <option>2002</option>
                              <option>2004</option>
                              <option>2005</option>
                              <option>2006</option>
                              <option>2007</option>
                              <option>2008</option>
                              <option>2009</option>
                              <option>2010</option>
                              <option>2011</option>
                              <option>2012</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group gender">
                          <label class="radio-inline">
                            <input type="radio" name="optradio" checked>Male
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="optradio">Female
                          </label>
                        </div>
                      </form><!--Register Now Form Ends-->
                      <p><a href="{{ route('login') }}">Already have an account?</a></p>
                      <button class="btn btn-primary" type="submit">Register Now</button>
                    </div><!--Registration Form Contents Ends-->
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">

            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
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
