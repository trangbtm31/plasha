<?php

namespace App\Http\Controllers\Chat;

use App\Friend;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

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

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user', 'user_info')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        $user_info = UserInfo::find(Auth::user()->id);
        broadcast(new MessageSent($user, $message, $user_info ))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function MessagesAjax(){
        return view('chat.messages-ajax');
    }
}
