@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('head')

@endsection

@section('content')
    @include("layouts.app")
    <h1 class="recommend-friend-title">Recommend Friend</h1>
    <div id="list-friend-recommend">
        @include('friend.reload-recommend-friend')
    </div>
@endsection