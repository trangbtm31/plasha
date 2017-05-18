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
                    <h1 class="recommend-friend-title">Recommend Friend</h1>
                    <div id="list-friend-recommend">
                        @include('friend.reload-recommend-friend')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection