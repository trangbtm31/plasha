<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PlanLike extends Model
{
    protected $table = 'plan_like';
    protected $planID;

    function __construct($plan_id)
    {
        parent::__construct();
        $this->planID = $plan_id;
    }

    public function like()
    {
        $check_exist = self::where([
            ['plan_id', '=', $this->planID],
            ['user_id', '=', Auth::User()->id]
        ])->get();
        if( $check_exist->count() < 1 )
        {
            $this->plan_id = $this->planID;
            $this->user_id = Auth::id();
            $this->status = 'like';
            $this->save();
        }
        else
        {
            self::where([
                ['plan_id', '=', $this->planID],
                ['user_id', '=', Auth::User()->id]
            ])->update(['status' => 'like']);
        }
        return $this->countLike();
    }
    public function dislike()
    {
        $check_exist = self::where([
            ['plan_id', '=', $this->planID],
            ['user_id', '=', Auth::User()->id]
        ])->get();
        if( $check_exist->count() < 1 )
        {
            $this->plan_id = $this->planID;
            $this->user_id = Auth::id();
            $this->status = 'dislike';
            $this->save();
        }
        else
        {
            self::where([
                ['plan_id', '=', $this->planID],
                ['user_id', '=', Auth::User()->id]
            ])->update(['status' => 'dislike']);
        }
        return $this->countLike();
    }

    public function countLike()
    {
        $data = self::where([
                ['plan_id', '=', $this->planID],
                ['status', '=', 'like']
            ])
            ->count();
        return $data;
    }

    public function getStatus()
    {
        $data = json_decode(self::select('status')
            ->where([
                ['plan_id', '=', $this->planID],
                ['user_id', '=', Auth::User()->id]
            ])
            ->get(), true);
        $data = array_shift($data)['status'];
        return $data;
    }
}
