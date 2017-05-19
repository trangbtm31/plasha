<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Plan\PlanCommentRequest;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $table = 'plan_comment';
    protected $planID;

    function __construct($plan_id)
    {
        parent::__construct();
        $this->planID = $plan_id;
    }

    public function create(PlanCommentRequest $request)
    {
        //Insert database
        $this->user_id = Auth::id();
        $this->comment = $request->comment;
        $this->plan_id = $this->planID;
        $this->save();
    }

    public function getComment()
    {
        return self::join('users',"$this->table.user_id",'=','users.id')
            ->join('user_info',"$this->table.user_id",'=','user_info.user_id')
            ->select("$this->table.id","$this->table.user_id",'plan_id','comment',"$this->table.created_at","$this->table.updated_at",'first_name','last_name','avatar')
            ->where('plan_id', $this->planID)
            ->orderBy('created_at','asc')
            ->get()->toArray();
    }

    public function getCommentLimit($start, $limit)
    {
        return self::join('users',"$this->table.user_id",'=','users.id')->join('user_info',"$this->table.user_id",'=','user_info.user_id')
            ->select("$this->table.id","$this->table.user_id",'plan_id','comment',"$this->table.created_at","$this->table.updated_at",'first_name','last_name','avatar')
            ->where('plan_id', $this->planID)
            ->orderBy('created_at','asc')
            ->offset($start)
            ->limit($limit)
            ->get();
    }

    public function count()
    {
        return self::join('users',"$this->table.user_id",'=','users.id')
            ->join('user_info',"$this->table.user_id",'=','user_info.user_id')
            ->where('plan_id', $this->planID)
            ->count();
    }
}
