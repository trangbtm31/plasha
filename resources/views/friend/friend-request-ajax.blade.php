<?php
namespace App;
// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Kiểm tra trang hiện tại có bé hơn 1 hay không
if ($page < 1) {
    $page = 1;
}

// Số record trên một trang
$limit = 3;

// Tìm start
$start = ($limit * $page) - $limit;
// Câu truy vấn
$data = (new Friend)->getFriendRequest($start, $limit +1);
$total = count($data);

if ($total <= $limit){
    echo '<script language="javascript">$("#load-more-friend-request").remove()</script>';
}

// Xóa bớt data cuối cùng
if ($total > $limit){
    array_pop($data);
}
?>
@foreach($data as $friend)
    <div id="user-request-{{ $friend['id'] }}" class = "friend-request-item">
        <div class="avatar-wrapper ">
            <img src="images/users/{{ isset($friend['avatar'])? $friend['avatar'] : 'users_default.png' }}" alt="user" class="" />
        </div>
        <div class="info-wrapper ">
            <div class = "name">
                <a href="#" class="profile-link">{{ $friend['first_name'] }} {{ $friend['last_name'] }}</a>
            </div>
            @if( $friend['address'] )
                <div class = "address">Live in {{ $friend['address'] }}</div>
            @endif
            <div class = "job">
                {{ $friend['job'] }}
                @if( !empty($friend['job']) && !empty($friend['company']) )
                    at
                @endif
                {{ $friend['company'] }}
            </div>
        </div>
        <button onclick="accept_friend(this)" user_id="{{ $friend['id'] }}" >Accept</button>
        <button onclick="deny_friend(this)" user_id="{{ $friend['id'] }}" >Delete Request</button>
    </div>
@endforeach
