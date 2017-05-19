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
            <div class="col-md-9">
                <h1 class="friend-request-title">Friend Request</h1>
                <div class="friend-request-wrapper">
                    <div class="friend-request-list">
                        @include('friend.friend-request-ajax')
                    </div>
                    <button id="load-more-friend-request" onclick="LoadMoreRequestFriend(this)" page="1" is_busy="false">Load More Request</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection