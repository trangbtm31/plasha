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

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
            <div class="col-md-3 static">
            <div class="profile-card">
            	<img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="user" class="profile-photo" />
            	<h5><a href="{{ route('time-line', ['id' => $current_user[0]->id] )}}" class="text-white">{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
            </ul><!--news-feed links ends-->
            <div id="chat-block">
              <div class="title">Chat online</div>
              <ul class="online-users list-inline">
                <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="images/users/user-2.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="images/users/user-3.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="John Doe"><img src="images/users/user-4.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="images/users/user-5.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="James Carter"><img src="images/users/user-6.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="images/users/user-7.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="images/users/user-8.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Anna Young"><img src="images/users/user-9.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="images/users/user-10.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div><!--chat block ends-->
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
