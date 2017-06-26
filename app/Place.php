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
    public function getPlaceList()
    {
        //Nếu user hiện tại là user_id_1 thì tìm tất cả user_id_2 đang là bạn
        $list_place = self::join('place_thumbnail',"$this->table.id",'=','place_thumbnail.place_id')
            ->select(
                "$this->table.id",
                "$this->table.name",
                "$this->table.description",
                "$this->table.address",
                "$this->table.time_open",
                "$this->table.time_close",
                "$this->table.cost",
                "$this->table.star",
                "$this->table.category_id",
                "$this->table.lat",
                "$this->table.lng",
                "$this->table.created_at",
                "$this->table.updated_at",
                'thumbnail')
            ->orderBy('created_at', 'desc')
            ->get();

        return $list_place;
    }

    public function Plan_Place()
    {
        return $this->hasMany('App\PlanPlace');
    }
}
