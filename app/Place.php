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

    /* Hàm đệ quy SaveMoney:
     * Trong mảng các địa điểm $places
     * Tìm $num_place (số địa điểm) có chi phí thấp hơn hoặc bằng $total_cost
     * Giá trị trả về là mảng số thứ tự của $places. VD: [0,2,6].
     *
     * $places     : Mảng địa điểm
     * $total_cost : Tổng chi phí
     * $num_place  : Số địa điểm muốn đi
     * $l          : Bắt đầu vòng lặp từ vị trí $l trong mảng $places
     * $r          : Kết thúc vòng lặp ở vị trí $r trong mảng $places
     * $max        : Tổng lớn nhất hiện tại
     * $sum        : Tổng của các đệ quy trước đó
     * $recursive  : Số lần đệ quy (Bắt đầu từ 1)
     * $parent     : Mảng lưu trữ giá trị của hàm đệ quy cha
     */
    static function SaveMoney($places, $total_cost, $num_place, $l, $r, &$max=0, $sum=0, $recursive=1, $parent = []) {
        //Nếu số địa điểm trùng với số lần đệ quy thì so sánh tổng
        if ($num_place == $recursive) {
            for ($i = $l; $i <= $r; $i++) {
                $total = $sum + $places[$i]['cost']; //Tính tổng con
                // Nếu total > max và nhỏ hơn total_cost thì return luôn
                // Vì chuỗi places đã sắp xếp giá giảm dần, nếu cộng tiếp thì $total sẽ <= $max
                if ($total > $max && $total <= $total_cost) {
                    $max = $total;          //Cập nhật giá trị $max
                    $child = $parent;
                    array_push($child, $i); //Thêm $i vào mảng con
                    return $child;
                }
            }
        } else { //Đệ quy đến khi số địa điểm trùng với số lần đệ quy
            $recursive++;
            $data = array();
            for ($i = $l; $i <= $r; $i++) {
                $child = $parent;
                array_push($child, $i); //Thêm $i vào mảng con
                //Gọi đệ quy
                $loop = Place::SaveMoney($places, $total_cost, $num_place, $i+1, $r, $max, $sum + $places[$i]['cost'], $recursive, $child);
                //Nếu có tổng tổ hợp lớn hơn thì $loop sẽ không rỗng.
                if (!empty($loop)) {
                    $data = $loop;
                }
            }
            return $data;
        }
    }

    static function findSaveMoney($total_cost = 0, $num_place = 1) {
        $places = Place::where('cost', '<=', $total_cost)->orderBy('cost', 'DESC')->get()->toArray();
        $data = array();
        if($num_place == 1) {
            $data = $places[0];
        } else {
            $results = Place::SaveMoney($places, $total_cost, $num_place, 0, count($places) - 1);
            foreach ($results as $result) {
                array_push($data, $places[$result]);
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
