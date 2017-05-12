<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Http\Requests\PlanRequest;
use App\Comment;
use App\Http\Requests\Plan\PlanCommentRequest;

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

    public function postComment($plan_id, PlanCommentRequest $request)
    {
        try {
            $comment = new Comment();
            $comment->create($plan_id, $request);
            return redirect()->route('home')->with(['message' => 'Your comment has been posted successfully!']);
        } catch (Exception $e){
            print_r('Error: ' . $e);
        }
    }
}