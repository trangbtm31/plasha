<?php
namespace App;
// Lấy trang hiện tại
$page = isset($_GET['comment_page']) ? (int)$_GET['comment_page'] : 1;
$plan_id = isset($_GET['plan_id']) ? (int)$_GET['plan_id'] : $plan_id;

// Kiểm tra trang hiện tại có bé hơn 1 hay không
if ($page < 1) {
    $page = 1;
}

// Số record trên một trang
$limit = 3;

// Tìm start
$start = ($limit * $page) - $limit;
// Câu truy vấn
$comment = new Comment($plan_id);
$data = $comment->getCommentLimit($start, $limit +1);
$data = json_decode($data, true);
$total = count($data);

if ($total <= $limit){
    echo '<script language="javascript">$("#comment-plan-' . $plan_id . ' button").remove()</script>';
}

// Xóa bớt data cuối cùng
if ($total > $limit){
    array_pop($data);
}
?>
@foreach($data as $comment)
    <div class="post-comment">
        <img src="images/users/{{ !empty($comment['avatar']) ? $comment['avatar'] : 'users_default.png' }}" alt="" class="profile-photo-sm" />
        <p>
            <a href="timeline.html" class="profile-link">{{ $comment['first_name'] }} {{ $comment['last_name'] }}</a> {{ $comment['comment'] }}
            <br/>
            <span class="text-muted" style="display: inline-block"><?php echo \Carbon\Carbon::createFromTimestamp(strtotime($comment["created_at"]))->diffForHumans()?></span>
        </p>
    </div>
@endforeach