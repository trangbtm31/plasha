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
                            <b>Category :</b> Đi ăn{{--{{ $plan["category"] }}--}}
                        </div>
                        <div class="col-md-6">
                            <b>Total cost: </b> 500.000đ {{--{{ $plan["price"] }}--}}
                        </div>
                    </div>
                    <p>{{ $plan["description"] }}</p>
                    <p><b>Start at : </b> 08.00 03/06/2017<b> to</b> 12.00 05/06/2017</p>
                </div>
                <div class="line-divider"></div>
                <div id="plan-place">
                    <ul>
                        <li class="row">
                            <div class="col-md-6" id="place-img-1">
                                <img src="/images/sunset_winter.png"  width="200px" height="200px" style="border-radius: 50%; border: 5px solid #FFF; position:relative;">
                            </div>
                            <div class="col-md-6" id="place-info-1" hidden>
                                <span class="place-stay-time">12to 23:00</span><br>
                                <span class="place-name"><strong>Công viên văn hóa suối tiên</strong></span><br>
                                <span class="place-address">Khu phố 6, phường Linh Trung, quận Thủ Đức</span><br>
                                <span class="place-open-time">Open at: 06:00AM</span><br>
                                <span class="place-close-time">Close at: 00:00AM</span><br>
                                <span class="place-cost">Chi phí dự tính: 200.000đ</span>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-6" id=" place-img-2">
                                <img src="/images/sunset_winter.png"  width="200px" height="200px" style="border-radius: 50%; border: 5px solid #FFF; position:relative;">
                            </div>
                            <div class="col-md-6" id="place-info-2" hidden>
                                <span class="place-stay-time">12:00 to 23:00</span><br>
                                <span class="place-name"><strong>Công viên văn hóa suối tiên</strong></span><br>
                                <span class="place-address">Khu phố 6, phường Linh Trung, quận Thủ Đức</span><br>
                                <span class="place-open-time">Open at: 06:00AM</span><br>
                                <span class="place-close-time">Close at: 00:00AM</span><br>
                                <span class="place-cost">Chi phí dự tính: 200.000đ</span>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-6" id="place-img-3">
                                <img src="/images/sunset_winter.png"  width="200px" height="200px" style="border-radius: 50%; border: 5px solid #FFF; position:relative;">
                            </div>
                            <div class="col-md-6" id="place-info-3" hidden>
                                <span class="place-stay-time">12:00 to 23:00</span><br>
                                <span class="place-name"><strong>Công viên văn hóa suối tiên</strong></span><br>
                                <span class="place-address">Khu phố 6, phường Linh Trung, quận Thủ Đức</span><br>
                                <span class="place-open-time">Open at: 06:00AM</span><br>
                                <span class="place-close-time">Close at: 00:00AM</span><br>
                                <span class="place-cost">Chi phí dự tính: 200.000đ</span>
                            </div>
                        </li>
                    </ul>
                </div>
                {{--<div id ="control">
                    <ul>
                      <li style="list-style-type: none;"><a href="javascript:sliders[0].goToPrev()"><img src="/images/left.png" width=50px;></a></li>
                      <li style="float:right; list-style-type: none;"><a href="javascript:sliders[0].goToNext()"><img src="/images/right.png" width=50px;></a></li>
                    </ul>
                </div>--}}
                <center><span class="text-muted">Published about <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($plan["created_at"]))->diffForHumans()?></span></center>
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
        $(document).ready(function(){
            $("#place-img-1").mouseover(function(){
                $("#place-info-1").show(1000);
            });
            $("#place-img-1").mouseout(function(){
                $("#place-info-1").hide(1000);
            })
        })
    </script>
{{--
	<script>
    var sliders = []
    $('#plan-place').each(function() {
      sliders.push(new Slider(this))
    })
  </script>--}}
    <?php
}

if ($total <= $limit){
    echo '<script language="javascript">stopped = true; </script>';
}