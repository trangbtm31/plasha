<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';

    static function getPlaceNotHaveLocation()
    {
        return self::whereNull('lat')->orWhereNull('lng')->get();
    }

    public function Plan_Place()
    {
        return $this->hasMany('App\PlanPlace');
    }
}
