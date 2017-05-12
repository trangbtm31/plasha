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
        $data = self::select('*')->orderBy('created_at','desc')->get('');
        $users_arr = $user_info = array();
        foreach ($data as $plan)
        {
            if (!in_array($plan['user_id'], $users_arr))
            {
                $user_info = UserInfo::getUserByID($plan['user_id']);
                array_push($users_arr, json_decode(json_encode($user_info),true)[0]);
            }
            foreach ($users_arr as $user)
            {
                if ($user['id'] == $plan['user_id'])
                {
                    $plan['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                    $plan['user_avatar'] = $user['avatar'];
                }
            }
            $comment = new Comment();
            $comment_list = $comment->getCommentByPlanID($plan['user_id']);
//            echo '<pre>';
//            print_r($comment_list);
//            echo '<pre>';
        };
        return $data;
    }
}