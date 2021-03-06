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
        $this->total_cost = $request->max_cost;
        $this->start_time = $request->start_time;
        $this->end_time = $request->end_time;
        $this->save();

//        //Get thumbnail
//        if (!empty($request->file('thumbnail')))
//        {
//            foreach ($request->file('thumbnail') as $thumbnail)
//            {
//                $image = new PlanThumbnail($this->id);
//                $image->create($thumbnail);
//            }
//        }

    }

    public function getPlanLimit($start, $limit, $id)
    {
        if($id == null) {
            $data = self::join('users',"$this->table.user_id",'=','users.id')->join('user_info', "$this->table.user_id", '=', 'user_info.user_id')
                ->select("$this->table.id", "$this->table.user_id", 'name', 'description', "$this->table.created_at", "$this->table.updated_at", 'first_name', 'last_name', 'avatar', 'start_time', 'end_time', 'total_cost')
                ->orderBy('created_at', 'desc')
                ->offset($start)
                ->limit($limit)
                ->get();
        } else {
            $data = self::join('users',"$this->table.user_id",'=','users.id')
                ->join('user_info', "$this->table.user_id", '=', 'user_info.user_id')
                ->select("$this->table.id", "$this->table.user_id", 'name', 'description', "$this->table.created_at", "$this->table.updated_at", 'first_name', 'last_name', 'avatar', 'start_time', 'end_time', 'total_cost')
                ->where( "$this->table.user_id",'=',$id )
                ->orderBy('created_at', 'desc')
                ->offset($start)
                ->limit($limit)
                ->get();
        }

        foreach ($data as $plan)
        {
//            //Get all thumbnail of plan
//            $thumbnail = new PlanThumbnail($plan['id']);
//            $plan['total_thumbnail']= $thumbnail->count();
//            $plan['list_thumbnail'] = $thumbnail->getThumbnail();

            //Count total comment of plan
            $comment = new Comment($plan['id']);
            $plan['total_comment']= $comment->count();

            //Get like of this plan
            $like = new PlanLike($plan['id']);
            $plan['total_like'] = $like->countLike();
            $plan['like_status'] = $like->getStatus();
            if (empty($plan['like_status']))
            {
                $plan['like_status']='dislike';
            }

            //Get place
            $plan['plan_place'] = self::join('plan_place', "$this->table.id", '=', 'plan_place.plan_id')
                                ->join('place', 'plan_place.place_id', '=', 'place.id')
                                ->where("$this->table.id", '=', $plan['id'])
                                ->orderby('plan_place.start_time', 'asc')
                                ->get();

            //Get Thumbnail for place
            foreach ($plan['plan_place'] as $place) {
                $thumbnail = new PlaceThumbnail($place['place_id']);
                $place['place_thumbnail'] = $thumbnail->getThumbnail();
            }
        };

        return $data;
    }

    public function place()
    {
        return $this->belongsToMany(Place::class);
    }
}