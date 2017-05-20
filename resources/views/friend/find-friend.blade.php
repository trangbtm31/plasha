@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('head')

@endsection

@section('content')
    @include("layouts.app")
    <div class="news-feed" >
        <div id="page-contents">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 static">
                        @include('layouts.left-sidebar')
                    </div>
                    <div class="friend-list col-md-9">
                        <h1 class="recommend-friend-title">Recommend Friend</h1>
                        <div id="list-friend-recommend" class="row">
                            @include('friend.reload-recommend-friend')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection