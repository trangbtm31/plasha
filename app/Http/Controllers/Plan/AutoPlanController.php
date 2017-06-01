<?php

namespace App\Http\Controllers\Plan;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AutoPlanController extends Controller
{
    public $total_cost;
    public $find_place;
    public $num_place;
    public $start_time;
    public $end_time;
    public $min_to_do;

    public function __construct() {
        $this->total_cost = (isset($_GET['total_cost']) && !empty($_GET['total_cost'])) ? (int)$_GET['total_cost'] : '0';
        $this->find_place = (isset($_GET['find_place']) && !empty($_GET['find_place'])) ? $_GET['find_place'] : 'random';
        $this->num_place = (isset($_GET['num_place']) && !empty($_GET['num_place'])) ? $_GET['num_place'] : '1';
        $this->start_time = (isset($_GET['start_time']) && !empty($_GET['start_time'])) ? new Carbon($_GET['start_time']) : '';
        $this->end_time = (isset($_GET['end_time']) && !empty($_GET['end_time'])) ? new Carbon($_GET['end_time']) : '';

        if (!empty($this->start_time) && !empty($this->end_time) && $this->start_time->lt($this->end_time)){
            $interval = $this->end_time->diff($this->start_time);
            $this->min_to_do = $interval->days*24*60 + $interval->h*60 + $interval->i;
        }
    }

    public function autoFindPlace()
    {
        switch ($this->find_place) {
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
                $data = $this->findSaveMoney();
                break;
        }

        return view('plan.auto-place', compact('data'));
    }

    /* Hàm chuyển thời gian thành số phút
     * Input : Thời gian dạng String (23:59:59)
     * Output: Số phút
     */
    public function timeToMinutes($time) {
        $parsed = date_parse($time);
        return $parsed['hour'] * 60 + $parsed['minute'];
    }

    /* Hàm đổi vị trí của 2 Place */
    public function swapPlace(&$a, &$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    /* Hàm kiểm tra các địa điểm có phù hợp hay không
     * Input : Danh sách các địa điểm (Place) lấy từ database
     * Output: true/false và danh sách Places sắp xếp theo thứ tự thực hiện.
     */
    public function checkPlaces(&$places) {
        //Tổng thời gian và chi phí của kế hoạch có phù hợp với các địa điểm trên?
        $time = $cost = 0;
        $open_before = $close_after = false; //Kiểm tra có nơi nào mở cửa và đóng cửa trước thời gian thực hiện kế hoạch không.
        foreach ($places as $place) {
            $time += $this->timeToMinutes($place['time_stay']);
            $cost += $place['cost'];
            if (strtotime($place['time_open']) <= strtotime($this->start_time->toTimeString())) {
                $open_before = true;
            }
            if (strtotime($place['time_close']) >= strtotime($this->end_time->toTimeString())) {
                $close_after = true;
            }
        }
        //Giá cao hơn HOẶC không có nơi nào hoạt động trong thời gian này thì sẽ không phù hợp
        if ($cost > $this->total_cost || $open_before == false || $close_after ==false) {
            return false;
        }
        //Tổng thời gian vượt quá thời gian thực hiện kế hoạch thì không phù hợp
        //Hoặc tổng thời gian ít hơn thời gian của kế hoạch khác thì không phù hợp
        if ($time > $this->min_to_do || $time <= $this->max_time) {
            return false;
        }

        //Sắp xếp các địa điểm theo thời gian mở cửa
        //'clone' dùng để sao chép một đối tượng object. Nếu không dùng clone thì khi a thay đổi, b cũng thay đổi theo
        $temp_time = clone $this->start_time;
        for ($i = 0; $i < count($places); $i++) {
            $come_on = clone $temp_time;
            $leave_at = (clone $temp_time)->addMinutes($this->timeToMinutes($places[$i]['time_stay']));
            $close_early = $places[$i]['time_close'];
            for ($j = $i + 1; $j < count($places); $j++) {
                $leave_at = (clone $temp_time)->addMinutes($this->timeToMinutes($places[$j]['time_stay']));
                if ( strtotime($places[$j]['time_open']) <= strtotime($come_on->toTimeString()) //Mở cửa trước khi đến
                    && strtotime($places[$j]['time_close']) >= strtotime($leave_at->toTimeString()) //Đóng cửa sau khi rời
                    && strtotime($places[$j]['time_close']) < strtotime($close_early) ) //Nơi có time_close gần nhất thì đi trước
                {
                    $close_early = $places[$j]['time_close'];
                    $this->swapPlace($places[$i], $places[$j]);
                }
            }
            $places[$i]['come_on'] = $come_on;
            $places[$i]['leave_at'] = $leave_at;
            $temp_time = clone $leave_at;
        }

        $this->max_time = $time;
        $this->great_places = $places;
        return true;
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
    protected $max_time = 0; //Thời gian tối đa thực hiện kế hoạch
    protected $great_places = 0; //Địa điểm phù hợp
    protected function SaveMoney($places, $l, $r, $recursive=1, $parent = []) {
        //Nếu số địa điểm trùng với số lần đệ quy thì so sánh tổng
        if ($this->num_place == $recursive) {
            for ($i = $l; $i <= $r; $i++) {
                $child = $parent;
                array_push($child, $places[$i]); //Thêm $i vào mảng con
                if ($this->checkPlaces($child) == false) { //Kiểm tra những địa điểm này có phù hợp không
                    continue; //Nếu không phù hợp thì bỏ qua lần lặp
                }
            }
            return $this->great_places;
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
        $data = $this->SaveMoney($places, 0, count($places) - 1);
        return $data;
    }
}
