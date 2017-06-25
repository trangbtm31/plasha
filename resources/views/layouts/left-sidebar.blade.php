<?php
use App\User;
use App\Friend;
$fr_req = (new Friend)->getFriendRequest(null,null);
$current_user = User::getCurrentUserInfo();
?>
<!-- Newsfeed Common Side Bar Left
          ================================================= -->
<div class="left-sidebar">
    <div class="profile-card" style="background: linear-gradient(to bottom, rgba(39,170,225,.8), rgba(28,117,188,.8)), url(/images/covers/{{ $current_user[0]->cover_photo }}) no-repeat; background-size:cover">
        <img src="images/users/{{$current_user[0]->avatar}}" alt="user" class="profile-photo"/>
        <h5><a href="{{ route('time-line', ['id' => $current_user[0]->id] )}}" class="text-white">{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</a></h5>
        <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
        <li><i class="icon ion-ios-paper"></i><div><a href="{{ route('home')}}">My Newsfeed</a></div></li>
        <li><i class="icon ion-ios-people"></i><div><a href="{{route('friend-request')}}">Friends Request <span class="fr-req" style="">{{$fr_req? count($fr_req) : ''}}</span></a></div></li>
        <li><i class="icon ion-ios-people-outline"></i><div><a href="{{ route('friend-list')}}">Friends List</a></div></li>
        <li><i class="icon ion-chatboxes"></i><div><a href="chat">Messages</a></div></li>
        <li><i class="icon ion-location"></i><div><a href="newsfeed-images.html">Place Collection</a></div></li>
        {{--<li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>--}}
    </ul><!--news-feed links ends-->
    <div id="chat-block">
        <div class="title">Chat online</div>
        <div class="flex-reverse-wrapper">
            <a href="javascript:;" id="more-fr-onl" onclick="more_fr_onl(this)" class="text-green button-add-friend" is_busy="false" page="1">Load more friend</a>
            <ul id="friend-chat-online" class="online-users list-inline">
                @include('layouts.chat-online')
            </ul>
        </div>
    </div><!--chat block ends-->
</div>