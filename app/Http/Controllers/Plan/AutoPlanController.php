<?php

namespace App\Http\Controllers\Plan;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoPlanController extends Controller
{
    public $total_cost;
    public $find_place;
    public $num_place;

    public function __construct() {
        $this->total_cost = (isset($_GET['total_cost']) && !empty($_GET['total_cost'])) ? (int)$_GET['total_cost'] : '0';
        $this->find_place = (isset($_GET['find_place']) && !empty($_GET['find_place'])) ? $_GET['find_place'] : 'random';
        $this->num_place = (isset($_GET['num_place']) && !empty($_GET['num_place'])) ? $_GET['num_place'] : '1';
    }

    public function autoFindPlace()
    {
        switch ($this->find_place) {
            case 'random':
                $data = $this->findRandom();
                break;
            case 'save-money':
                $data = $this->findSaveMoney();
                break;
            case 'many-place':
                $data = $this->findManyPlace();
                break;
            case 'luxury-place':
                $data = $this->findLuxuryPlace();
                break;
            default:
                $data = $this->findRandom();
        }

        return view('plan.auto-place', compact('data'));
    }

    protected function findRandom() {
        $places = Place::inRandomOrder()->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $this->total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }

    /* Hàm đệ quy SaveMoney:
     * Trong mảng các địa điểm $places
     * Tìm $this->num_place (số địa điểm) có chi phí thấp hơn hoặc bằng $this->total_cost
     * Giá trị trả về là mảng $places.
     *
     * $places     : Mảng địa điểm
     * $l          : Bắt đầu vòng lặp từ vị trí $l trong mảng $places
     * $r          : Kết thúc vòng lặp ở vị trí $r trong mảng $places
     * $sum        : Tổng của các đệ quy trước đó
     * $recursive  : Số lần đệ quy (Bắt đầu từ 1)
     * $parent     : Mảng lưu trữ giá trị của hàm đệ quy cha
     */
    protected $max_total_cost = 0; //Tổng cost lớn nhất
    protected function SaveMoney($places, $l, $r, $recursive=1, $parent = []) {
        //Nếu số địa điểm trùng với số lần đệ quy thì so sánh tổng
        if ($this->num_place == $recursive) {
            for ($i = $l; $i <= $r; $i++) {
                $child = $parent;
                array_push($child, $places[$i]); //Thêm $i vào mảng con
                $total = 0;
                foreach ($child as $place) {
                    $total += $place['cost'];
                }
                if ($total > $this->max_total_cost && $total <= $this->total_cost) {
                    $this->max_total_cost = $total;          //Cập nhật giá trị $max
                    return $child;
                }
            }
        } else { //Đệ quy đến khi số địa điểm trùng với số lần đệ quy
            $recursive++;
            $data = array();
            for ($i = $l; $i <= $r; $i++) {
                $child = $parent;
                array_push($child, $places[$i]); //Thêm $i vào mảng con
                //Gọi đệ quy
                $loop = $this->SaveMoney($places, $i+1, $r, $recursive, $child);
                //Nếu có tổng tổ hợp lớn hơn thì $loop sẽ không rỗng.
                if (!empty($loop)) {
                    $data = $loop;
                }
            }
            return $data;
        }
    }

    protected function findSaveMoney() {
        $places = Place::where('cost', '<=', $this->total_cost)->orderBy('cost', 'DESC')->get()->toArray();
        $data = $this->SaveMoney($places, 0, count($places) - 1);
        return $data;
    }


    protected function findManyPlace() {
        $places = Place::where('cost', '<=', $this->total_cost)->orderBy('cost', 'ASC')->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $this->total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }

    protected function findLuxuryPlace() {
        $places = Place::where('cost', '<=', $this->total_cost)->orderBy('star', 'DESC')->get()->toArray();
        $temp_cost = 0;
        $data = array();
        foreach ($places as $place) {
            if (($temp_cost + $place['cost']) <= $this->total_cost) {
                array_push($data, $place);
                $temp_cost += $place['cost'];
            }
        }
        return $data;
    }
}
