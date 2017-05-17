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

    }
}
