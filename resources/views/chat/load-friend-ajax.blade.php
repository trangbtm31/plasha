<?php
namespace App;
?>
<?php
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
$list_friend = (new Friend)->getFriendOnl($start, $limit +1);
$total = count($list_friend);

if ($total <= $limit){
    echo '<script language="javascript">$("#more-fr-chat").remove()</script>';
}

// Xóa bớt data cuối cùng
if ($total > $limit){
    array_pop($list_friend);
}
?>
@foreach($list_friend as $friend)
<li class="active">
    <a href="#contact-1" data-toggle="tab">
        <div class="contact">
            <img src="images/users/{{ $friend['avatar'] }}" alt="" class="profile-photo-sm pull-left">
            <div class="msg-preview">
                <h6>{{ $friend['first_name'] }} {{ $friend['last_name'] }}</h6>
                <p class="text-muted">Hi there, how are you</p>
                <small class="text-muted">a min ago</small>
                <div class="chat-alert">1</div>
            </div>
        </div>
    </a>
</li>
@endforeach