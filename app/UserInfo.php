<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id', 'address', 'job', 'company', 'avatar', 'cover_photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
