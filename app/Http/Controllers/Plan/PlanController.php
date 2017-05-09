<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function create(Request $request)
    {
        $plan = new Plan;
        $plan->user_id = Auth::user()->id;
        $plan->plan_name = $request->plan_name;
        $plan->plan_desc = $request->description;
        $plan->category = 'eating';
        $plan->save();
    }
}
