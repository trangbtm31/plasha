<?php

namespace App;

use App\Http\Requests\PlanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class plan extends Model
{
    protected $table = 'plan';

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

    public function getAllPlan()
    {
        $data = self::join('users',"$this->table.user_id",'=','users.id')->join('user_info', "$this->table.user_id", '=', 'user_info.user_id')->select("$this->table.id", "$this->table.user_id", 'name', 'description', 'category', "$this->table.created_at", "$this->table.updated_at", 'thumbnail', 'first_name', 'last_name', 'avatar')->orderBy('created_at', 'desc')->get();
        foreach ($data as $plan) {
            //Get all comment of plan
            $comment = new Comment($plan['id']);
            $plan['list_comment'] = $comment->getComment();
        };

        return $data;
    }
}