<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanThumbnail extends Model
{
    protected $table = 'plan_thumbnail';

    protected $planID;

    function __construct($plan_id)
    {
        parent::__construct();
        $this->planID = $plan_id;
    }

    public function create($request)
    {
        //Get data
        $thumbnail_name = $request->getClientOriginalName();
        $request->move('images/plan-thumbnail',$thumbnail_name);

        //Insert database
        $this->plan_id   = $this->planID;
        $this->thumbnail = $thumbnail_name;
        $this->save();
    }

    public function count()
    {
        return self::where('plan_id', $this->planID)->count();
    }
    public function getThumbnail()
    {
        return self::join('plan',"$this->table.plan_id",'=','plan.id')->where('plan_id', $this->planID)->get();
    }
}
