<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Plan\PlanCommentRequest;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $table = 'plan_comment';

    public function create($plan_id, PlanCommentRequest $request)
    {
        //Insert database
        $this->user_id = Auth::id();
        $this->comment = $request->comment;
        $this->plan_id = $plan_id;
        $this->save();
    }

    public function getCommentByPlanID($planID)
    {
        return self::select('*')->where(['plan_id' => $planID])->get();
    }
}
