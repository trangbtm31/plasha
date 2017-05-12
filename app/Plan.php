<?php

namespace App;

use App\Http\Requests\PlanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $table = 'plan';
    protected $id = '';

//    public function __construct($id)
//    {
//        parent::__construct();
//        $this->id = $id;
//    }

    public function Create(PlanRequest $request)
    {
        //Get thumbnail
        if ( !empty($request->file('thumbnail')) )
        {
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = $thumbnail->getClientOriginalName();
            $thumbnail->move('images/plan-thumbnail',$thumbnail_name);
            $this->thumbnail = $thumbnail_name;
        }

        //Insert database
        $this->user_id = Auth::id();
        $this->name = $request->name;
        $this->description = $request->description;
        $this->category = 'eating';

        $this->save();
    }

    static public function getAllPlan()
    {
        return self::select('*')->orderBy('created_at','desc')->get('');
    }
}