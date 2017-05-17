<?php
/**
 * Created by PhpStorm.
 * User: Cuong
 * Date: 17/05/2017
 * Time: 12:21 CH
 */
?>
@foreach($data as $user)
    <div class = "user-recommend user-recommend-{{ $user['id'] }} col-md-6">
        <div class="content">
            <div class="avatar-wrapper col-md-2">
                <img src="images/users/{{ isset($user['avatar'])? $user['avatar'] : 'users_default.png' }}" alt="user" class="avatar-photo" />
            </div>
            <div class="info-wrapper col-md-10">
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
            <button onclick="add_friend()" class="button button-add-friend btn-primary left" user_id="{{ $user['id'] }}">Add Friend</button>
        </div>
    </div>
@endforeach
<button onclick="refresh_recommend_friend()" class="button button-refresh btn-primary left center-block">Refresh</button>