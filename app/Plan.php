<?php

namespace App;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class plan extends Model
{
    protected $table = 'plan';
    protected $primaryKey = 'id';

    function __construct(Request $request)
    {
        $this->user_id = Auth::id();
        $this->plan_name = $request->plan_name;
        $this->plan_desc = $request->description;
        $this->category = 'eating';
        $this->save();
    }
}