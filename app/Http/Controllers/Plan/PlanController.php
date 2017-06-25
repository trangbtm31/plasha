<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\HandlePlanRequest;
use App\Http\Requests\Plan\PlanCommentRequest;
use App\PlaceThumbnail;
use App\PlanHandle;
use App\PlaceHandle;
use App\Category;
use App\Comment;
use App\Plan;
use App\PlanPlace;
use App\PlanHandleCreate;
use App\Place;
use App\AutoPlan;

class PlanController extends Controller
{
    public function autoCreate(PlanRequest $request)
    {
        $plan = new Plan();
        $plan->Create($request);
        for ($i=0; $i < $request->number_place; $i++) {
            $PlanPlace = new PlanPlace();
            $PlanPlace->plan_id = $plan->id;
            $PlanPlace->place_id = $request->get('place_id')[$i];
            $PlanPlace->start_time = $request->get('come_on')[$i];
            $PlanPlace->end_time = $request->get('leave_at')[$i];
            $PlanPlace->save();
        }
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
    {/*
        echo "<pre>";
        print_r($request->place_name);
        echo "</pre>";
        exit();*/

        /*$request->total_cost = 0;
        foreach ($request->place_cost as $cost) {
            $request->total_cost += $cost;
        }*/

        /*$request->start_time = $request->place_time_start[0];
        foreach ($request->place_time_start as $time) {
            if ( strtotime($request->start_time) > strtotime($time) ) {
                $request->start_time = $time;
            }
        }

        $request->end_time = $request->place_time_end[0];
        foreach ($request->place_time_end as $time) {
            if ( strtotime($request->end_time) < strtotime($time) ) {
                $request->end_time = $time;
            }
        }*/

        /*$plan_info = new PlanHandle();*/
        /*$plan_info->Create($request);*/
        /*$now = Carbon::now('utc')->toDateTimeString();*/
        for($i = 0; $i < count($request->place_name); $i++) {
            $data = array('name' => $request->place_name[$i],
            'address' => $request->place_address[$i],
            'description' => $request->place_description[$i],
            'category' => $request->place_category[$i],
            'time_open' => $request->place_time_open[$i],
            'time_close' => $request->place_time_close[$i],
            'cost' => $request->place_cost[$i],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
            );

            $place_id = Place::insertGetId($data);
            /*
            //Insert into plan_place table
            $PlanPlace = new PlanPlace();
            $PlanPlace->plan_id = $plan_info->id;
            $PlanPlace->place_id = $place_id;
            $PlanPlace->start_time = $request->get('place_time_start')[$i];
            $PlanPlace->end_time = $request->get('place_time_end')[$i];
            $PlanPlace->save();*/

            //Get thumbnail
            if (!empty($request->file('place_thumbnail')[$i]))
            {
//                foreach ($request->file('place_thumbnail') as $thumbnail)
//                {
                    $image = new PlaceThumbnail($place_id);
                    $image->create($request->file('place_thumbnail')[$i]);
//                }
            }

        };

        return redirect()->route('home')->with(['message' => 'Your location has been sent to admin! Please waiting for reply from admin']);
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