<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
=======
>>>>>>> 765ce574eb9e3607078179809aac0af7d3ebdff4
use App\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function create(Request $request)
    {
<<<<<<< HEAD
        try {
            //$plan = new Plan($request);
            return redirect()->route('home');
        } catch (Exception $e){
            print_r('Error: ' . $e);
        }

=======
        $plan = new Plan;
        $plan->user_id = Auth::user()->id;
        $plan->plan_name = $request->plan_name;
        $plan->plan_desc = $request->description;
        $plan->category = 'eating';
        $plan->save();
>>>>>>> 765ce574eb9e3607078179809aac0af7d3ebdff4
    }
}
