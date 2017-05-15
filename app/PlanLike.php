<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Plan\PlanLikeRequest;
use Illuminate\Support\Facades\Auth;

class PlanLike extends Model
{
    protected $table = 'plan_like';
    protected $planID;

    function __construct($plan_id)
    {
        parent::__construct();
        $this->planID = $plan_id;
    }

    public function like()
    {
        $this->plan_id = $this->planID;
        $this->user_id = Auth::id();
        $this->status = 'like';
        $this->save();
    }
}
