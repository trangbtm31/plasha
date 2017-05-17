<?php
/**
 * Created by PhpStorm.
 * User: Cuong
 * Date: 17/05/2017
 * Time: 12:21 CH
 */
?>
@foreach($data as $user)
    <div class = "user-recommend user-recommend-{{ $user['id'] }} col-sm-6 col-md-6 col-lg-4">
        <div class="content">
            <div class="avatar-wrapper col-xs-4 col-sm-3 col-md-3 col-sm-4">
                <img src="images/users/{{ isset($user['avatar'])? $user['avatar'] : 'users_default.png' }}" alt="user" class="avatar-photo" />
                <button onclick="add_friend(this)" class="button button-add-friend center-block col-xs-12 col-sm-12 col-md-12 col-lg-12" user_id="{{ $user['id'] }}">Add Friend</button>
            </div>
            <div class="info-wrapper col-md-9 col-sm-8">
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

        </div>
    </div>
@endforeach
<div class="clearfix"></div>
<button onclick="refresh_recommend_friend()" class="button button-refresh btn-primary left center-block">Refresh</button>