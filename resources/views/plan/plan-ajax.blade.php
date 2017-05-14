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
    $thumbnail = new PlanThumbnail($data[$i]['id']);
    $data[$i]['total_thumbnail']= $thumbnail->count();
    $data[$i]['list_thumbnail'] = $thumbnail->getThumbnail();

    //Get all comment of plan
    $comment = new Comment($data[$i]['id']);
    $data[$i]['total_comment']= $comment->count();
    $data[$i]['list_comment'] = $comment->getComment();
};


// Hiển thị dữ liệu

// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check phân trang thôi
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row
if ($total > $limit){
    for ($i = 0; $i < $total - 1; $i++)
    {
    ?>
        <div class="post-content post-id-{{ $data[$i]['id'] }}">
        @foreach($data[$i]["list_thumbnail"] as $thumbnail)
            <img src="images/plan-thumbnail/{{ $thumbnail["thumbnail"] }}" alt="post-image" class="img-responsive post-image" />
        @endforeach
        <div class="post-container">
            <img src="images/users/{{ $data[$i]["avatar"] }}" alt="user" class="profile-photo-md pull-left" />
            <div class="post-detail">
                <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{ $data[$i]["first_name"] }} {{ $data[$i]["last_name"] }}</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($data[$i]["created_at"]))->diffForHumans()?></p>
                </div>
                <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    <a class="btn text-blue"><i class="icon ion-chatbox-working"></i> {{ $data[$i]['total_comment'] }}</a>
                </div>
                <div class="line-divider"></div>
                <div class="post-title">
                    <p>{{ $data[$i]["name"] }}</p>
                </div>
                <div class="line-divider"></div>
                <div class="post-text">
                    <p>{{ $data[$i]["description"] }}</p>
                </div>
                <div class="line-divider"></div>
                @foreach($data[$i]['list_comment'] as $comment)
                    <div class="post-comment">
                        <img src="images/users/{{ $comment['avatar'] }}" alt="" class="profile-photo-sm" />
                        <p>
                            <a href="timeline.html" class="profile-link">{{ $comment['first_name'] }} {{ $comment['last_name'] }}</a> {{ $comment['comment'] }}
                            <br/>
                            <span class="text-muted" style="display: inline-block"><?php echo \Carbon\Carbon::createFromTimestamp(strtotime($comment["created_at"]))->diffForHumans()?></span>
                        </p>
                    </div>

                @endforeach
                <div class="post-comment">
                    <img src="images/users/{{ $current_user[0]->avatar }}" alt="" class="profile-photo-sm" />
                    <form method="POST" action="{{ route('post-comment', ['plan_id' => $data[$i]['id']]) }}">
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
}
else{
    for ($i = 0; $i < $total; $i++)
    {
    ?>
<div class="post-content">
    @foreach($data[$i]["list_thumbnail"] as $thumbnail)
        <img src="images/plan-thumbnail/{{ $thumbnail["thumbnail"] }}" alt="post-image" class="img-responsive post-image" />
    @endforeach
    <div class="post-container">
        <img src="images/users/{{ $data[$i]["avatar"] }}" alt="user" class="profile-photo-md pull-left" />
        <div class="post-detail">
            <div class="user-info">
                <h5><a href="timeline.html" class="profile-link">{{ $data[$i]["first_name"] }} {{ $data[$i]["last_name"] }}</a> <span class="following">following</span></h5>
                <p class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($data[$i]["created_at"]))->diffForHumans()?></p>
            </div>
            <div class="reaction">
                <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                <a class="btn text-blue"><i class="icon ion-chatbox-working"></i> {{ $data[$i]['total_comment'] }}</a>
            </div>
            <div class="line-divider"></div>
            <div class="post-title">
                <p>{{ $data[$i]["name"] }}</p>
            </div>
            <div class="line-divider"></div>
            <div class="post-text">
                <p>{{ $data[$i]["description"] }}</p>
            </div>
            <div class="line-divider"></div>
            @foreach($data[$i]['list_comment'] as $comment)
                <div class="post-comment">
                    <img src="images/users/{{ $comment['avatar'] }}" alt="" class="profile-photo-sm" />
                    <p>
                        <a href="timeline.html" class="profile-link">{{ $comment['first_name'] }} {{ $comment['last_name'] }}</a> {{ $comment['comment'] }}
                        <br/>
                        <span class="text-muted" style="display: inline-block"><?php echo \Carbon\Carbon::createFromTimestamp(strtotime($comment["created_at"]))->diffForHumans()?></span>
                    </p>
                </div>
                <a href="#" class="button load_more_comment">LOAD MORE</a>
            @endforeach
            <div class="post-comment">
                <img src="images/users/{{ $current_user[0]->avatar }}" alt="" class="profile-photo-sm" />
                <form method="POST" action="{{ route('post-comment', ['plan_id' => $data[$i]['id']]) }}">
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
}

// Nếu hết dữ liệu thì stop không phan trang nữa
if ($total <= $limit){
    echo '<script language="javascript">stopped = true; </script>';
}
?>