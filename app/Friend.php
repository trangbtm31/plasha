<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Friend extends Model
{
    protected $table = "users";

    //Return array category ['category_id' => 'category_name']
    static function findRandomUser() {
        $query = json_decode(
            self::join('user_info', 'id', '=', 'user_info.user_id')
                ->select('id', 'first_name', 'last_name', 'Gender', 'address', 'job', 'company', 'avatar', 'cover_photo')
                ->whereNotIn('id', [Auth::User()->id])
                ->inRandomOrder()
                ->limit(6)
                ->get()
            , true);
        return $query;
    }
}
