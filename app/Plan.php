<?php

namespace App;

use App\Http\Requests\PlanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $table = 'plan';

    public function Create(PlanRequest $request)
    {
        //Insert database
        $this->user_id = Auth::id();
        $this->name = $request->name;
        $this->description = $request->description;
        $this->category = 'eating';
        $this->save();

        //Get thumbnail
        foreach ($request->file('thumbnail') as $thumbnail)
        {
            $image = new PlanThumbnail($this->id);
            $image->create($thumbnail);
        }
    }

    public function getPlanLimit($start, $limit)
    {
        $data = self::join('users',"$this->table.user_id",'=','users.id')->join('user_info', "$this->table.user_id", '=', 'user_info.user_id')->select("$this->table.id", "$this->table.user_id", 'name', 'description', 'category', "$this->table.created_at", "$this->table.updated_at", 'first_name', 'last_name', 'avatar')->orderBy('created_at', 'desc')->offset($start)->limit($limit)->get();
        foreach ($data as $plan)
        {
            //Get all thumbnail of plan
            $thumbnail = new PlanThumbnail($plan['id']);
            $plan['total_thumbnail']= $thumbnail->count();
            $plan['list_thumbnail'] = $thumbnail->getThumbnail();

            //Count total comment of plan
            $comment = new Comment($plan['id']);
            $plan['total_comment']= $comment->count();
        };

        return $data;
    }
}