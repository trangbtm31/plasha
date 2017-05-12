<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $id = '';

    public function __construct($id)
    {
        $this->id = $id;
    }
    static function getUserByID($id)
    {
        return \DB::table('user_info')->join('users','user_info.user_id','=','users.id')->select('users.id','first_name','last_name','avatar')->where('id',$id)->get('');
    }
}
