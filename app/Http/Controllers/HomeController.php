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
        $plan = new Plan();
        $data = $plan->getAllPlan();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        return view('home', compact('data'));
    }
}
