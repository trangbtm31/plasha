<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    //Return array category ['category_id' => 'category_name']
    static function getAllCategory() {
        $category = json_decode(self::select('*')->get(), true);
        $category_arr = array();
        foreach ($category as $cate) {
            $category_arr[$cate['category_id']] = $cate['category_name'];
        }
        return $category_arr;
    }
}