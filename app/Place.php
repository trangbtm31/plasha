<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';

    static function findRandom($total_cost = 0) {
        $places = Place::inRandomOrder()->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }

    static function findSaveMoney($total_cost = 0) {
        $places = Place::where('cost', '<=', $total_cost)->orderBy('cost', 'DESC')->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }


    static function findManyPlace($total_cost = 0) {
        $places = Place::where('cost', '<=', $total_cost)->orderBy('cost', 'ASC')->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }

    static function findLuxuryPlace($total_cost = 0) {
        $places = Place::where('cost', '<=', $total_cost)->orderBy('star', 'DESC')->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }
}
