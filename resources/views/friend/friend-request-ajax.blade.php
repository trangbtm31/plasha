<?php
namespace App;
//// Lấy trang hiện tại
//$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
//
//// Kiểm tra trang hiện tại có bé hơn 1 hay không
//if ($page < 1) {
//    $page = 1;
//}
//
//// Số record trên một trang
//$limit = 2;
//
//// Tìm start
//$start = ($limit * $page) - $limit;
//// Câu truy vấn
$data = (new Friend)->getFriendRequest();
//$total = count($data);
//
//if ($total <= $limit){
//    echo '<script language="javascript">$("#load-more-friend-request").remove()</script>';
//}
//
//// Xóa bớt data cuối cùng
//if ($total > $limit){
//    array_pop($data);
//}
?>
@foreach($data as $friend)
    <div id="user-request-{{ $friend['id'] }}" class = "friend-request-item col-sm-6 col-md-6 col-lg-6">
        <div class="friend-card">
            <img src="images/covers/{{ $friend['cover_photo'] }}" alt="profile-cover" class="img-responsive cover">
            <div class="card-info">
                <img src="images/users/{{ isset($friend['avatar'])? $friend['avatar'] : 'users_default.png' }}" alt="user" class="profile-photo-lg" />
            <div class="friend-info">
                <button onclick="deny_friend(this)" class="button button-delete-friend pull-right" user_id="{{ $friend['id'] }}" >Delete Request</button>
                <button onclick="accept_friend(this)" class="button button-accept-friend pull-right" user_id="{{ $friend['id'] }}" >Accept</button>
                <h5><a href="timeline.html" class="profile-link">{{ $friend['first_name'] }} {{ $friend['last_name'] }}</a></h5>
                @if( $friend['address'] )
                    <p class = "address">Live in {{ $friend['address'] }}</p>
                @endif
                <p class = "job">
                    {{ $friend['job'] }}
                    @if( !empty($friend['job']) && !empty($friend['company']) )
                        at
                    @endif
                    {{ $friend['company'] }}
                </p>
            </div>
            </div>
        </div>
    </div>
@endforeach
