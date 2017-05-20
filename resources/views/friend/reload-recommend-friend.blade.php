<?php
/**
 * Created by PhpStorm.
 * User: Cuong
 * Date: 17/05/2017
 * Time: 12:21 CH
 */
?>
@foreach($data as $user)
    <div class = "user-recommend user-recommend-{{ $user['id'] }} col-sm-6 col-md-6 col-lg-6">
        <div class="friend-card">
            <img src="images/covers/{{ $user['cover_photo'] }}" alt="profile-cover" class="img-responsive cover">
            <div class="card-info">
                <img src="images/users/{{ isset($user['avatar'])? $user['avatar'] : 'users_default.png' }}" alt="user" class="profile-photo-lg" />
                <div class="friend-info">
                    <button onclick="add_friend(this)" class="button button-add-friend pull-right" user_id="{{ $user['id'] }}">Add Friend</button>
                    <h5><a href="timeline.html" class="profile-link">{{ $user['first_name'] }} {{ $user['last_name'] }}</a></h5>
                    @if( $user['address'] )
                    <p class = "address">Live in {{ $user['address'] }}</p>
                    @endif
                    <p class = "job">
                        {{ $user['job'] }}
                        @if( !empty($user['job']) && !empty($user['company']) )
                        at
                        @endif
                        {{ $user['company'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="clearfix"></div>
<button onclick="refresh_recommend_friend()" class="button button-refresh btn-primary left center-block">Refresh</button>