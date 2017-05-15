<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = User::getCurrentUserInfo();
        return view('home', compact('current_user'));
    }

    public function PlanAjax()
    {
        $current_user = User::getCurrentUserInfo();
        return view('plan/plan-ajax',compact('current_user'));
    }
    public function CommentAjax()
    {
        $current_user = User::getCurrentUserInfo();
        return view('plan/comment-ajax',compact('current_user'));
    }
}
