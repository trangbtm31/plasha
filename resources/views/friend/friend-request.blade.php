@extends('layouts.master')

@section('title')
Plasa news feed !!
@endsection

@section('head')

@endsection

@section('content')
@include("layouts.app")
<h1 class="friend-request-title">Friend Request</h1>
<div class="friend-request-list">
    @foreach($data as $user)
        <div class = "friend-request-item user-request-{{ $user['id'] }}">
            <div class="avatar-wrapper ">
                <img src="images/users/{{ isset($user['avatar'])? $user['avatar'] : 'users_default.png' }}" alt="user" class="" />
            </div>
            <div class="info-wrapper ">
                <div class = "name">
                    <a href="#" class="profile-link">{{ $user['first_name'] }} {{ $user['last_name'] }}</a>
                </div>
                @if( $user['address'] )
                    <div class = "address">Live in {{ $user['address'] }}</div>
                @endif
                <div class = "job">
                    {{ $user['job'] }}
                    @if( !empty($user['job']) && !empty($user['company']) )
                        at
                    @endif
                    {{ $user['company'] }}
                </div>
            </div>
            <button onclick="accept_friend(this)" user_id="{{ $user['id'] }}" >Accept</button>
            <button onclick="deny_friend(this)" user_id="{{ $user['id'] }}" >Delete Request</button>
        </div>
    @endforeach
</div>
@endsection