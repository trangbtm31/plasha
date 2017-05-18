<?php

namespace App\Http\Controllers\Friend;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function FindFriend() {
        $current_user = User::getCurrentUserInfo();
        $data = (new Friend)->findRandomUser();
        return view('friend.find-friend', compact('data', 'current_user'));
    }

    public function ReloadRecommendFriend() {
        $data = (new Friend)->findRandomUser();
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

    public function FriendRequest() {
        $current_user = User::getCurrentUserInfo();
        $data = (new Friend)->getFriendRequest();
        return view('friend.friend-request', compact('data', 'current_user'));
    }

    public function AcceptFriend() {
        if (isset($_GET['user_id'])) {
            $user_id = (int) $_GET['user_id'];
            $result = (new Friend)->updateFriendStatus($user_id, 'friend');
            echo json_encode(array(
                'success' => $result
            ));
        }else{
            echo json_encode(array(
                'success' => false
            ));
        }
    }
    public function DenyFriend() {
        if (isset($_GET['user_id'])) {
            $user_id = (int) $_GET['user_id'];
            $result = (new Friend)->updateFriendStatus($user_id, 'deny');
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
