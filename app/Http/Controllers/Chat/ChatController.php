<?php

namespace App\Http\Controllers\Chat;

use App\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Chat()
    {
        return view('chat.chat');
    }

    public function ChatFriendAjax()
    {
        return view('chat.load-friend-ajax');
    }
}
