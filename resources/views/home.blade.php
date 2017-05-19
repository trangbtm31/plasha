@extends('layouts.master')

@section('title')
    Plasa news feed !!
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
              @foreach($recommend_friend as $new_friend)
              <div class="follow-user">
                <img src="images/users/{{ isset($new_friend['avatar'])? $new_friend['avatar'] : 'users_default.png' }}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">{{ $new_friend['first_name'] }} {{ $new_friend['last_name'] }}</a></h5>
                  <a href="#" tabindex="0" role="button" onclick="add_friend(this)" class="text-green button-add-friend" user_id="{{ $new_friend['id'] }}">Add friend</a>
                </div>
              </div>
              @endforeach
              <a href="/find-friend" class="text-green text-center col-xs-12">Find more friend</a>
            </div>
          </div>
    	    </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
