<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Place;
use App\Http\Requests\PlanRequest;
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

    public function autoFindPlace()
    {
        $total_cost = (isset($_GET['total_cost']) && !empty($_GET['total_cost'])) ? (int)$_GET['total_cost'] : '0';
        $find_place = (isset($_GET['find_place']) && !empty($_GET['find_place'])) ? $_GET['find_place'] : 'random';
        $num_place = (isset($_GET['num_place']) && !empty($_GET['num_place'])) ? $_GET['num_place'] : '1';

        switch ($find_place) {
            case 'random':
                $data = Place::findRandom($total_cost);
                break;
            case 'save-money':
                $data = Place::findSaveMoney($total_cost, $num_place);
                break;
            case 'many-place':
                $data = Place::findManyPlace($total_cost);
                break;
            case 'luxury-place':
                $data = Place::findLuxuryPlace($total_cost);
                break;
            default:
                $data = Place::findRandom($total_cost);
        }
        
        return view('plan.auto-place', compact('data'));
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
}