<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Friend extends Model
{
    protected $table = "relationship";

    function __construct(array $attributes = [])
    {
        $this->action_user_id = Auth::User()->id;
        parent::__construct($attributes);
    }

    /* Find new friend short by random */
    public function findRandomUser() {
        //Các user ID không gợi ý kết bạn cho người dùng
        $not_in_user_id = array(Auth::User()->id);

        //Các trạng thái không gợi ý kết bạn cho người dùng
        $not_in_status = array('friend', 'waiting', 'block');

        //Nếu user hiện tại là user_id_1 thì tìm tất cả user_id_2
        $friend_arr1 = json_decode(self::select('user_id_2')
            ->where('user_id_1', '=', Auth::User()->id)
            ->whereIn('status', $not_in_status)
            ->get(), true);
        foreach ($friend_arr1 as $friend)
        {
            array_push($not_in_user_id, $friend['user_id_2']);
        }

        //Nếu user hiện tại là user_id_2 thì tìm tất cả user_id_1
        $friend_arr2 = json_decode(self::select('user_id_1')
            ->where('user_id_2', '=', Auth::User()->id)
            ->whereIn('status', $not_in_status)
            ->get(), true);
        foreach ($friend_arr2 as $friend)
        {
            array_push($not_in_user_id, $friend['user_id_1']);
        }

        $query = json_decode(
            \DB::table('users')
                ->join('user_info', 'id', '=', 'user_info.user_id')
                ->select('id', 'first_name', 'last_name', 'Gender', 'address', 'job', 'company', 'avatar', 'cover_photo')
                ->whereNotIn('id', $not_in_user_id)
                ->inRandomOrder()
                ->limit(6)
                ->get()
            , true);
        return $query;
    }

    /* Current user request add new friend */
    public function addFriend($user_id) {
        $this->user_id_1 = Auth::User()->id;
        $this->user_id_2 = $user_id;
        $this->status    = 'waiting';

        $check_exist = self::where([
            ['user_id_1', '=', $this->user_id_1],
            ['user_id_2', '=', $this->user_id_2]
        ])
        ->orWhere([
            ['user_id_1', '=', $this->user_id_2],
            ['user_id_2', '=', $this->user_id_1]
        ])
        ->get();
        if ($check_exist->count() < 1) { // Nếu mối quan hệ chưa được tạo thì sẽ khởi tạo
            return $this->save();
        } elseif ($check_exist->count() >= 1) {  // Nếu đã tồn tại mối quan hệ
            // Nếu người đó đã gửi lời mời kết bạn thì sẽ chấp nhận
            if ($check_exist[0]['status'] == 'waiting')
            {
                $this->updateFriendStatus($user_id, 'friend');
                return 'friend';
            } else { // Ngược lại sẽ gửi lời mời
                return $this->updateFriendStatus($user_id, $this->status);
            }
        } else {
            return false;
        }
    }

    /* Update friend status */
    /* status = ['none', 'waiting', 'friend', 'deny', 'unfriend', 'block'] */
    public function updateFriendStatus($user_id, $status) {
        $this->user_id_1 = Auth::User()->id;
        $this->user_id_2 = $user_id;
        return self::where([
            ['user_id_1', '=', $this->user_id_1],
            ['user_id_2', '=', $this->user_id_2]
        ])
        ->orWhere([
            ['user_id_1', '=', $this->user_id_2],
            ['user_id_2', '=', $this->user_id_1]
        ])
        ->update(['status' => $status, 'action_user_id' => $this->action_user_id]);
    }

    public function getFriendRequest($start, $limit) {
        $list_friend_id = array();

        //Nếu user hiện tại là user_id_1 thì tìm tất cả user_id_2 đang gửi lời mời kết bạn
        $friend_arr1 = json_decode(self::select('user_id_2')
            ->where([
                ['user_id_1', '=', Auth::User()->id],
                ['status', '=', 'waiting']
            ])
            ->whereNotIn('action_user_id', [Auth::User()->id])
            ->get(), true);
        foreach ($friend_arr1 as $friend)
        {
            array_push($list_friend_id, $friend['user_id_2']);
        }

        //Nếu user hiện tại là user_id_2 thì tìm tất cả user_id_1 đang gửi lời mời kết bạn
        $friend_arr2 = json_decode(self::select('user_id_1')
            ->where([
                ['user_id_2', '=', Auth::User()->id],
                ['status', '=', 'waiting']
            ])
            ->whereNotIn('action_user_id', [Auth::User()->id])
            ->get(), true);
        foreach ($friend_arr2 as $friend)
        {
            array_push($list_friend_id, $friend['user_id_1']);
        }

        $query = json_decode(
            \DB::table('users')
                ->join('user_info', 'id', '=', 'user_info.user_id')
                ->select('id', 'first_name', 'last_name', 'Gender', 'address', 'job', 'company', 'avatar', 'cover_photo')
                ->whereIn('id', $list_friend_id)
                ->orderBy('updated_at', 'desc')
                ->offset($start)
                ->limit($limit)
                ->get()
            , true);
        return $query;
    }
}
