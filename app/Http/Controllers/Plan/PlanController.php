<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Plan;

class PlanController extends Controller
{
    //
    public function create(PlanRequest $request)
    {
        try {
            $plan = new Plan();
            $plan->Create($request);
            return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
        } catch (Exception $e){
            print_r('Error: ' . $e);
        }
    }
}