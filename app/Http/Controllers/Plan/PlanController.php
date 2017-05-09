<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Plan;

class PlanController extends Controller
{
    //
    public function create(Request $request)
    {
        try {
            //$plan = new Plan($request);
            return redirect()->route('home');
        } catch (Exception $e){
            print_r('Error: ' . $e);
        }

    }
}