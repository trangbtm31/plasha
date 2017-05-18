<?php

namespace App\Http\Controllers;

use App\PlanLike;
use App\User;
use App\Category;
use App\Friend;

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
        User::createUserinfo(); //Tạo user_info
        $current_user = User::getCurrentUserInfo();
        $category = Category::getAllCategory();
        $recommend_friend = (new Friend)->findRandomUser();
        return view('home', compact('current_user', 'category', 'recommend_friend'));
    }

    //Load plan
    public function PlanAjax()
    {
        $current_user = User::getCurrentUserInfo();
        return view('plan/plan-ajax',compact('current_user'));
    }

    //Load comment
    public function CommentAjax()
    {
        $current_user = User::getCurrentUserInfo();
        return view('plan/comment-ajax',compact('current_user'));
    }

    //Update database when like
    public function LikeAjax()
    {
        if(isset($_GET['plan_id'])){
            $plan_id = (int)$_GET['plan_id'];
        }
        else {
            return false;
        }
        $planLike = new PlanLike($plan_id);
        return $planLike->like();
    }

    //Update database when dislike
    public function DislikeAjax()
    {
        if(isset($_GET['plan_id'])){
            $plan_id = (int)$_GET['plan_id'];
        }
        else {
            return false;
        }
        $planLike = new PlanLike($plan_id);
        return $planLike->dislike();
    }
}
