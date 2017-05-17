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

// Hiển thị dữ liệu

// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check còn dữ liệu hay không
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row
if ($total > $limit){
    array_pop($data);
}

// Lấy category
$category = Category::getAllCategory();

foreach($data as $plan)
{
    ?>
    <div id="plan-{{ $plan['id'] }}" class="post-content">
        @foreach($plan["list_thumbnail"] as $thumbnail)
            <img src="images/plan-thumbnail/{{ $thumbnail["thumbnail"] }}" alt="post-image" class="img-responsive post-image" />
        @endforeach
        <div class="post-container">
            <img src="images/users/{{ !empty($plan["avatar"]) ? $plan["avatar"] : 'users_default.png' }}" alt="user" class="profile-photo-md pull-left" />
            <div class="post-detail">
                <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{ $plan["first_name"] }} {{ $plan["last_name"] }}</a> <span class="following">following</span></h5>
                    <span class="text-muted">{{ $category[$plan["category"]] }}</span>
                    <span role="presentation" aria-hidden="true"> · </span>
                    <span class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($plan["created_at"]))->diffForHumans()?></span>
                </div>
                <div class="reaction">
                    <a class="button-like {{ $plan['like_status'] }}" onclick="likePlan(this)" plan_id="{{ $plan['id'] }}">
                        <i class="icon ion-thumbsup"></i><span class="total-like">{{ $plan['total_like'] }}</span>
                    </a>
                    <a class="btn text-blue">
                        <i class="icon ion-chatbox-working"></i><span class="total-like">{{ $plan['total_comment'] }}</span>
                    </a>
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
                    <button onclick="LoadMoreComment(this)" class="button button-load-more btn-primary center-block" plan_id="{{ $plan['id'] }}" is_busy="false" page="1" stopped="false">LOAD MORE</button>
                    <div class="comment-content">
                        @include('plan.comment-ajax', ['plan_id' => $plan['id']])
                    </div>
                </div>
                <div class="post-comment">
                    <img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="" class="profile-photo-sm" />
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