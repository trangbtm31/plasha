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
        $plan = new Plan();
        $data = $plan->getAllPlan();
        $current_user = User::getCurrentUserInfo();

        return view('home', compact('data', 'current_user'));
    }
}
