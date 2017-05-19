<h4 class="grey">
    <a href="/friend-request" class="text-green text-center col-xs-12">Friend Requests</a>
</h4>
<div class="suggestions" id="sticky-sidebar">
<h4 class="grey">Who to Follow</h4>
@foreach($recommend_friend as $user)
<div class="follow-user">
  <img src="images/users/{{ $user['avatar'] }}" alt="" class="profile-photo-sm pull-left" />
  <div>
    <h5><strong><a href="{{route('time-line', ['id' => $user['id']])}}">{{ $user['first_name'] }} {{ $user['last_name'] }}</a></strong></h5>
    <a href="#" tabindex="0" role="button" onclick="add_friend(this)" class="text-green button-add-friend" user_id="{{ $user['id'] }}">Add friend</a>
  </div>
</div>
@endforeach
<a href="/find-friend" class="text-green text-center col-xs-12">Find more friend</a>
</div>