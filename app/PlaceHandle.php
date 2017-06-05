<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\HandlePlanRequest;
use App\PlanHandle;

class PlaceHandle extends Model
{
    protected $table = 'place';

    public function Create(HandlePlanRequest $request)
    {
        //Insert database


    }
    public function plan($plan_id, $place_id)
    {
        return $this->belongsToMany('\App\PlanHandle','place_place',$request->id,'plan_id');
    }

}
