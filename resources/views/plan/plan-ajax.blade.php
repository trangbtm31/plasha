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
$plan = new Plan();
$data = $plan->getPlanLimit($start, $limit + 1);
$data = json_decode($data, true);

$total = count($data);

for ($i = 0; $i < $total - 1; $i++)
{
    //Get all thumbnail of plan
    $thumbnail = new PlanThumbnail($plan['id']);
    $plan['total_thumbnail']= $thumbnail->count();
    $plan['list_thumbnail'] = $thumbnail->getThumbnail();

    //Get all comment of plan
    $comment = new Comment($plan['id']);
    $plan['total_comment']= $comment->count();
    $plan['list_comment'] = $comment->getComment();
};


// Hiển thị dữ liệu

// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check phân trang thôi
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row
if ($total > $limit){
    array_pop($data);
}
foreach($data as $plan)
{
    ?>
    <div class="post-content">
        @foreach($plan["list_thumbnail"] as $thumbnail)
            <img src="images/plan-thumbnail/{{ $thumbnail["thumbnail"] }}" alt="post-image" class="img-responsive post-image" />
        @endforeach
        <div class="post-container">
            <img src="images/users/{{ $plan["avatar"] }}" alt="user" class="profile-photo-md pull-left" />
            <div class="post-detail">
                <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{ $plan["first_name"] }} {{ $plan["last_name"] }}</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($plan["created_at"]))->diffForHumans()?></p>
                </div>
                <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    <a class="btn text-blue"><i class="icon ion-chatbox-working"></i> {{ $plan['total_comment'] }}</a>
                </div>
                <div class="line-divider"></div>
                <div class="post-title">
                    <p>{{ $plan["name"] }}</p>
                </div>
                <div class="line-divider"></div>
                <div class="post-text">
                    <p>{{ $plan["description"] }}</p>
                </div>
                <div class="line-divider"></div>
                <div id="comment-plan-{{ $plan["id"] }}" class="comment-wrapper">
                    <button style="float:right" onclick="LoadMoreComment(this)" class="button button-load-more btn-primary center-block" plan_id="{{ $plan['id'] }}" is_busy="false" page="1" stopped="false">LOAD MORE</button>
                    <div class="comment-content">
                        @include('plan.comment-ajax', ['plan_id' => $plan['id']])
                    </div>
                </div>
                <div class="post-comment">
                    <img src="images/users/{{ $current_user[0]->avatar }}" alt="" class="profile-photo-sm" />
                    <form method="POST" action="{{ route('post-comment', ['plan_id' => $plan['id']]) }}">
                        {{ csrf_field() }}
                        <textarea name="comment" class="form-control" placeholder="Write a comment..." rows="4" cols="50"></textarea>
                        <input type="submit" class="btn btn-primary pull-right" value="Comment">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Nếu hết dữ liệu thì stop không phân trang nữa
if ($total <= $limit){
    echo '<script language="javascript">stopped = true; </script>';
}