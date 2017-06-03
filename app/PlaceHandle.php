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
        foreach($request as $place) {
            $this->name = $place->place_name;
            $this->description = $place->place_description;
            $this->category = $place->place_category;
            $this->time_open = $place->place_time_open;
            $this->time_close = $place->place_time_close;
            $this->time_start = $place->place_time_start;
            $this->time_end = $place->place_time_end;
            $this->cost = $place->place_cost;
            $this->save();

            //Get thumbnail
            if (!empty($place->file('place_thumbnail')))
            {
                foreach ($place->file('place_thumbnail') as $thumbnail)
                {
                    $image = new PlanThumbnail($this->id);
                    $image->create($thumbnail);
                }
            }

        };

    }
    public function plan()
    {
        return $this->belongsToMany('\App\PlanHandle','place_place','place_id','plan_id');
    }

}
