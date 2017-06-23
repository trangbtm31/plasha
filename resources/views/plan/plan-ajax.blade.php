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
if(!isset($user)) {
    $user_id = null;
} else {
    $user_id = $user[0]->id;
}
$data = $plan->getPlanLimit($start, $limit + 1, $user_id);
$data = json_decode($data, true);
$total = count($data);

// Hiển thị dữ liệu

// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check còn dữ liệu hay không
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row
if ($total > $limit){
    array_pop($data);
}

foreach($data as $plan)
{
    ?>
    <div id="plan-{{ $plan['id'] }}" class="post-content">
        @if(isset($user))
        <div class="post-date hidden-xs hidden-sm">
          <h5>{{ $user[0]->first_name }}</h5>
          <p class="text-grey">Sometimes ago</p>
        </div>
        @endif
        {{--@foreach($plan["list_thumbnail"] as $thumbnail)
            <img src="images/plan-thumbnail/{{ $thumbnail["thumbnail"] }}" alt="post-image" class="img-responsive post-image" />
        @endforeach--}}
        <div class="post-container">
            <img src="images/users/{{ !empty($plan["avatar"]) ? $plan["avatar"] : 'users_default.png' }}" alt="user" class="profile-photo-md pull-left" />
            <div class="post-detail">
                <div class="user-info">
                    <div class="post-title">
                        <p>{{ $plan["name"] }}</p>
                    </div>
                    <h5>by <a href="{{route('time-line', ['id' => $plan['user_id']] ) }}" class="profile-link">{{ $plan["first_name"] }} {{ $plan["last_name"] }}</a> <span class="following"></span></h5>
                    {{--<span role="presentation" aria-hidden="true"> · </span>--}}
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
                <div class="post-text">
                    <div class="detail row">
                        <div class="col-md-6">
                            <b>Total cost: </b> {{ $plan["total_cost"] }} VND
                        </div>
                        <div class="col-md-6">
                            {{--<b>Category :</b> Đi ăn{{ $plan["category_id"] }}--}}
                        </div>
                    </div>
                    <p>{{ $plan["description"] }}</p>
                    <p><b>Start at : </b>{{ date('H:i d-m-Y', strtotime($plan["start_time"])) }}<b> to </b>{{ date('H:i d-m-Y', strtotime($plan["end_time"])) }}</p>
                </div>
                <div class="line-divider"></div>
                <div id="plan-place">
                    <ul>
                        @foreach($plan['plan_place'] as $plan_place)
                        <li class="row">
                            <div class="col-md-5">
                                <img src="/images/places/{{ !empty($plan_place['place_thumbnail'])? $plan_place['place_thumbnail'][0]['thumbnail'] : 'sunset_winter.png'}}"  width="200px" height="200px" style="border-radius: 50%; border: 5px solid #FFF; position:relative;">
                            </div>
                            <div class="col-md-7 place-info">
                                <span class="place-stay-time">{{ date('H:i d-m-Y', strtotime($plan_place['start_time'])) }} to {{ date('H:m d-m-Y', strtotime($plan_place['end_time'])) }}</span><br>
                                <span class="place-name"><strong>{{ $plan_place['name'] }}</strong></span><br>
                                <span class="place-address">{{ $plan_place['address'] }}</span><br>
                                <span class="place-open-time">Open at: {{ date('H:i', strtotime($plan_place['time_open'])) }}</span><br>
                                <span class="place-close-time">Close at: {{ date('H:i', strtotime($plan_place['time_close'])) }}</span><br>
                                <span class="place-cost">Expected cost: {{ $plan_place['cost'] }} VND</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                {{--<div id ="control">
                    <ul>
                      <li style="list-style-type: none;"><a href="javascript:sliders[0].goToPrev()"><img src="/images/left.png" width=50px;></a></li>
                      <li style="float:right; list-style-type: none;"><a href="javascript:sliders[0].goToNext()"><img src="/images/right.png" width=50px;></a></li>
                    </ul>
                </div>--}}
                <span class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($plan["created_at"]))->diffForHumans()?></span>
                <div class="line-divider"></div>
                <div id="comment-plan-{{ $plan["id"] }}" class="flex-reverse-wrapper">
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

	<script>
    var sliders = []
    $('#plan-place').each(function() {
      sliders.push(new Slider(this))
    })
  </script>
    <?php
}

// Nếu hết dữ liệu thì stop không phân trang nữa
if ($total <= $limit){
    echo '<script language="javascript">stopped = true; </script>';
}