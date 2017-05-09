<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
    //
    public function create(Request $request)
    {
        $plan = new Plan;
        $plan->user_id = 3;
        $plan->plan_name = $request->plan_name;
        $plan->plan_desc = $request->description;
        $plan->category = 'eating';
        $plan->save();
    }
}
