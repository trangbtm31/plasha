<?php

namespace App\Http\Controllers;

use App\Plan;

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
        $data = Plan::getAllPlan();
        return view('home', compact('data'));
    }
}
