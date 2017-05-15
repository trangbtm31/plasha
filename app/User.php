<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','DOB','Gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function getCurrentUserInfo()
    {
        $current_user_id = Auth::id();
        return \DB::table('users')->join('user_info','id','=','user_id')->select('id', 'first_name', 'last_name', 'avatar', 'cover_photo')->where('id',$current_user_id)->get();
    }
}
