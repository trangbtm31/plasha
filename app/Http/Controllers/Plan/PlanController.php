<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Plan;
use App\PlanHandleCreate;
use App\Place;
use App\AutoPlan;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\HandlePlanRequest;
use App\Comment;
use App\Http\Requests\Plan\PlanCommentRequest;

class PlanController extends Controller
{
    //
    public function create(PlanRequest $request)
    {
        $plan = new Plan();
        $plan->Create($request);
        return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
    }

    public function postComment($plan_id, PlanCommentRequest $request)
    {
        try {
            $comment = new Comment($plan_id);
            $comment->create($request);
            return redirect()->route('home')->with(['message' => 'Your comment has been posted successfully!']);
        } catch (Exception $e){
            print_r('Error: ' . $e);
        }
    }
    public function handleCreate(HandlePlanRequest $request)
    {
        $plan = new HandlePlan();
        $plan->Create($request);
        return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
    }
    public function handleCreatePlace(PlaceRequest $request)
    {
        $plan = new HandlePlan();
        $plan->Create($request);
        return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
    }
    public function showCreatePlace() {
        return \View::make('plan.create-place');
    }
}