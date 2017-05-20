@extends('layouts.master')

@section('title')
Plasa news feed !!
@endsection

@section('content')
@include("layouts.app")
<div class="news-feed" >
    <div id="page-contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 static">
                    @include('...layouts.left-sidebar', $current_user)
                </div>
                <div class="col-md-9">
                    <h1 class="friend-request-title">Friend Request</h1>
                    <div class="friend-request-wrapper flex-reverse-wrapper">
                        <button id="load-more-friend-request" class="button btn-primary center-block" onclick="LoadMoreRequestFriend(this)" page="1" is_busy="false">Load More Request</button>
                        <div class="friend-request-list friend-list row">
                            @include('friend.friend-request-ajax')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection