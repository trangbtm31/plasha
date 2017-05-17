<?php

namespace App\Http\Controllers\Friend;

use App\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    public function FindFriend() {
        $data = Friend::findRandomUser();
        return view('friend.find-friend', compact('data'));
    }

    public function ReloadRecommendFriend() {
        $data = Friend::findRandomUser();
        return view('friend.reload-recommend-friend', compact('data'));
    }

    public function AddFriendRequest() {
        if (isset($_GET['user_id'])) {
            $user_id = (int) $_GET['user_id'];
            $result = (new Friend)->addFriend($user_id);
            echo json_encode(array(
                'success' => $result
            ));
        }else{
            echo json_encode(array(
                'success' => false
            ));
        }
    }

    public function CancelFriendRequest() {
        if (isset($_GET['user_id'])) {
            $user_id = (int) $_GET['user_id'];
            $result = (new Friend)->updateFriendStatus($user_id, 'none');
            echo json_encode(array(
                'success' => $result
            ));
        }else{
            echo json_encode(array(
                'success' => false
            ));
        }
    }
}
