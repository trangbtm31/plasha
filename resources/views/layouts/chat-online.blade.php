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
$limit = 4;

// Tìm start
$start = ($limit * $page) - $limit;
// Câu truy vấn
$list_friend = (new Friend)->getFriendOnl($start, $limit +1);
$total = count($list_friend);

if ($total <= $limit){
    echo '<script language="javascript">$("#more-fr-onl").remove()</script>';
}

// Xóa bớt data cuối cùng
if ($total > $limit){
    array_pop($list_friend);
}
?>
@foreach($list_friend as $friend)
<li>
    <a href="#" title="Linda Lohan">
        <img src="images/users/{{ $friend['avatar'] }}" alt="user" class="img-responsive profile-photo" />
        @if ( $friend['isOnline'] == true )
        <span class="online-dot"></span>
        @endif
    </a>
</li>
@endforeach