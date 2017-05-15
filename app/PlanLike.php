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
            ['user_id', Auth::User()->id]
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
