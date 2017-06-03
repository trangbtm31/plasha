<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\HandlePlanRequest;
use App\Http\Requests\Plan\PlanCommentRequest;
use App\Plan;
use App\PlanHandle;
use App\PlaceHandle;
use App\AutoPlan;
use App\Category;
use App\Comment;

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
        $plan_info = new PlanHandle();
        $place = new PlaceHandle();
        $plan_info->Create($request);
        $place->Create($request);

        return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
    }
    /*public function handleCreatePlace(PlaceRequest $request)
    {
        $plan = new HandlePlan();
        $plan->Create($request);
        return redirect()->route('home')->with(['message' => 'Your plan has been created successfully!']);
    }*/
    public function showCreatePlace() {
        $category = Category::getAllCategory();
        return view('plan.create-place',compact('category'));
    }
}