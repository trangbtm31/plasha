<?php

namespace App;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class plan extends Model
{
    protected $table = 'plan';
    protected $primaryKey = 'id';

    function __construct(Request $request)
    {
        $v = Validator::make($request->all(), [
            'plan_name' => 'required',
            'description' => 'required'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors);
        }
        $this->user_id = Auth::id();
        $this->plan_name = $request->plan_name;
        $this->plan_desc = $request->description;
        $this->category = 'eating';
        $this->save();
    }
}