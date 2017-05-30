<?php

namespace App;

use App\Http\Requests\HandlePlanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class HandlePlan extends Model
{
    protected $table = 'plan';

    public function Create(PlanRequest $request)
    {
        //Insert database
        $this->user_id = Auth::id();
        $this->name = $request->name;
        $this->description = $request->description;
        $this->category = $request->category;
        $this->save();

        //Get thumbnail
        if (!empty($request->file('thumbnail')))
        {
            foreach ($request->file('thumbnail') as $thumbnail)
            {
                $image = new PlanThumbnail($this->id);
                $image->create($thumbnail);
            }
        }

    }
    public function place()
    {
        return $this->belongsToMany(HandlePlace::class);
    }
}