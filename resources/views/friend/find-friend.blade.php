@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('head')
    <script language="javascript" src="dist/js/friend/find-friend.js"></script>
@endsection

@section('content')
    @include("layouts.app")
    <?php
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
    ?>
    <h1 class="recommend-friend-title">Recommend Friend</h1>
    <div id="list-friend-recommend">
        @include('friend.reload-recommend-friend')
    </div>
@endsection