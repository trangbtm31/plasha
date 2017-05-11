<?php

namespace App\Http\Controllers;

use App\Plan;
use App\UserInfo;

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
        $data = Plan::getAllPlan();
        $users_arr = $user_info = array();
        foreach ($data as $plan)
        {
            if (!in_array($plan['user_id'], $users_arr))
            {
                $user_info = UserInfo::getUserByID($plan['user_id']);
                array_push($users_arr, json_decode(json_encode($user_info),true)[0]);
            }
            foreach ($users_arr as $user)
            {
                if ($user['id'] == $plan['user_id'])
                {
                    $plan['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                    $plan['user_avatar'] = $user['avatar'];
                }
            }
        };

        return view('home', compact('data'));
    }
}
