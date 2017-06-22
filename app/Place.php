<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';

    public function Plan_Place()
    {
        return $this->hasMany('App\PlanPlace');
    }
}
