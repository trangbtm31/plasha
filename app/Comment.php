<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Plan\PlanCommentRequest;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $table = 'plan_comment';
    protected $id = '';

    function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function create(PlanCommentRequest $request)
    {

        //Insert database
        $this->user_id = Auth::id();
        $this->plan_id = '27';
        $this->comment = $request->comment;

        $this->save();
    }
}
