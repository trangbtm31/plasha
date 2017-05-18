@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('head')

@endsection

@section('content')
    @include("layouts.app")
    <div id="page-contents">
    	<div class="container">
    		<div class="row">
                <div class="col-md-3 static">
                    @include('left-sidebar', $current_user)
                </div>
    			<div class="col-md-7">
                  @include('plan.create-plan')
            <!-- Post Content
            ================================================= -->
                  <div id="content">
                      @include('plan.plan-ajax')
                  </div>
                  <div id="loadding" class="hidden" style="color:#337ab7; font-size: 20px; font-weight: bold; text-align: center">
                    LOADDING ...
                  </div>
    	        </div>
          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
          <div class="col-md-2 static">
              <h4 class="grey"><a href="/friend-request" class="text-green text-center col-xs-12">Friend Requests</a></h4>
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              @foreach($recommend_friend as $user)
              <div class="follow-user">
                <img src="images/users/{{ isset($user['avatar'])? $user['avatar'] : 'users_default.png' }}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">{{ $user['first_name'] }} {{ $user['last_name'] }}</a></h5>
                  <a href="#" tabindex="0" role="button" onclick="add_friend(this)" class="text-green button-add-friend" user_id="{{ $user['id'] }}">Add friend</a>
                </div>
              </div>
              @endforeach
              <a href="/find-friend" class="text-green text-center col-xs-12">Find more friend</a>
            </div>
          </div>
    	    </div>
        </div>
    </div>

{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News Feed</div>

                <div class="panel-body">
                    Hi {{ Auth::user()->name }}! <br>
                    You are logged in!<br>
                    Welcome to News Feed !
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
