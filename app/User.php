<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\UserInfo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','DOB','Gender', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function createUserInfo() {
        $query = \DB::table('user_info')->select('user_id')->where('user_id','=',Auth::id())->count();
        return $query != 0 ? '' : \DB::table('user_info')->insert(
            [
                'user_id' => Auth::id(),
                'avatar' => 'users_default.png',
                'cover_photo' => 'sunset_winter.png',
            ]
        );
    }

    static function getCurrentUserInfo()
    {
        $current_user_id = Auth::id();
        return \DB::table('users')->join('user_info','id','=','user_id')->select('id', 'first_name', 'last_name', 'avatar', 'cover_photo')->where('id',$current_user_id)->get();
    }

    static function getUserInfo($user_id) {
        return \DB::table('users')->join(
            'user_info','id','=','user_id'
        )->where('id',$user_id)->get();
    }

    static function getUserList() {
        return \DB::table('users')->get();
    }
    public function checkOnline($id)
    {
        return Cache::has('user-is-online-' . $id);
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user_info(){
        return $this->hasOne(UserInfo::class);
    }

}
