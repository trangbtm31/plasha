<?php

namespace App\Http\Controllers\Plan;

use App\Place;
use App\Http\Controllers\Controller;
use App\PlaceThumbnail;
use Carbon\Carbon;

class AutoPlanController extends Controller
{
    public $total_cost;
    public $find_place;
    public $start_time;
    public $end_time;
    public $min_to_do;

    protected $max_cost = 0; //Chi phí cao nhất của kế hoạch dự kiến
    protected $max_time = 0; //Thời gian tối đa thực hiện kế hoạch
    protected $great_places = []; //Địa điểm phù hợp

    public function __construct() {
        $this->total_cost = ( isset($_GET['total_cost']) && !empty($_GET['total_cost']) ) ? (int)$_GET['total_cost'] : '0';
        $this->find_place = ( isset($_GET['find_place']) && !empty($_GET['find_place']) ) ? $_GET['find_place'] : 'random';
        $this->start_time = ( isset($_GET['start_time']) && !empty($_GET['start_time']) ) ? new Carbon($_GET['start_time']) : '';
        $this->end_time = ( isset($_GET['end_time']) && !empty($_GET['end_time']) ) ? new Carbon($_GET['end_time']) : '';

        if ( !empty($this->start_time) && !empty($this->end_time) && $this->start_time->lt($this->end_time) ){
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
        return view( 'plan.auto-place', ['places' => $data, 'max_cost' => $this->max_cost] );
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

    /* Hàm dùng để thiết lập Ngày và Giờ đóng/mở cửa của một địa điểm */
    public function setTimeOpenDoor( Carbon $DateTimeCome, string $TimeOpen, string $TimeClose) {
        if ( strtotime( $TimeOpen ) < strtotime( $TimeClose ) ) {
            //Trường hợp thời gian mở trong ngày (VD: 8h ->23h)
            if ( strtotime( $DateTimeCome->toTimeString() ) >= strtotime( $TimeClose ) ) {
                $date_time_open = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeOpen)->addDay();
                $date_time_close = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeClose)->addDay();
            } else {
                $date_time_open = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeOpen);
                $date_time_close = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeClose);
            }
        } else if ( strtotime( $TimeOpen ) > strtotime( $TimeClose ) ) {
            //Nếu nơi đó mở cửa qua 24h đêm (VD: 18:00 -> 2:00)
            if ( strtotime( $DateTimeCome->toTimeString() ) >= strtotime( $TimeClose ) ) {
                $date_time_open = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString().' ' .$TimeOpen);
                $date_time_close = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString().' '.$TimeClose)->addDay();
            }
            else {
                $date_time_open = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeOpen)->subDay();
                $date_time_close = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeClose);
            }
        } else { //Mở cửa 24/24
            $date_time_open = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeOpen);
            $date_time_close = Carbon::createFromFormat('Y-m-d H:i:s', $DateTimeCome->toDateString(). ' ' . $TimeClose)->addDay();
        }

        return array('date_time_open' => $date_time_open, 'date_time_close' => $date_time_close);
    }

    /* Hàm dùng để sắp xếp các địa điểm đang chọn
     * Nếu sắp xếp không phù hợp sẽ trả về False
     */
    public function arrangePlaces (&$places) {
        //Sắp xếp các địa điểm theo thời gian mở cửa
        //'clone' dùng để sao chép một đối tượng object. Nếu không dùng clone thì khi a thay đổi, b cũng thay đổi theo
        $temp_time = clone $this->start_time;
        for ($i = 0; $i < count($places); $i++) {
            $come_on = clone $temp_time;
            $leave_at = (clone $temp_time)->addMinutes($this->timeToMinutes($places[$i]['time_stay']));
            $close_early = $places[$i]['time_close'];

            $category_1 = '';
            if ($i >= 1) {
                $category_1 = $places[$i-1]['category_id'];
            }
            $category_2 = '';
            if ($i >= 2) {
                $category_2 = $places[$i-2]['category_id'];
            }

            //Tìm địa điểm phù hợp để thực hiện trước
            for ($j = $i + 1; $j < count($places); $j++) {
                $temp_leave_at = (clone $temp_time)->addMinutes( $this->timeToMinutes($places[$j]['time_stay'] ) );
                $open_door = $this->setTimeOpenDoor($come_on,$places[$j]['time_open'],$places[$j]['time_close']);

                if ( $come_on->gte($open_door['date_time_open']) //Mở cửa trước khi đến
                    && $leave_at->lte($open_door['date_time_close']) //Đóng cửa sau khi rời
                    && strtotime( $places[$j]['time_close'] ) < strtotime( $close_early ) //Nơi có time_close gần nhất thì đi trước
                    && $places[$j]['category_id'] != $category_1
                    && $places[$j]['category_id'] != $category_2
                ) {
                    $leave_at = clone $temp_leave_at;
                    $close_early = $places[$j]['time_close'];
                    $this->swapPlace($places[$i], $places[$j]);
                }
            }

            //Kiểm tra category có bị trùng không
            if($i >= 1) {
                if ($places[$i]['category_id'] == $category_1){
                    return false;
                }
            }
            if($i >= 2) {
                if ($places[$i]['category_id'] == $category_2){
                    return false;
                }
            }

            //Nếu đang tìm địa điểm nhưng chưa có nơi nào mở cửa thì tìm nơi mở cửa sớm nhất
            $open_door_i = $this->setTimeOpenDoor($come_on,$places[$i]['time_open'],$places[$i]['time_close']);

            if ( ($come_on->lt($open_door_i['date_time_open']) || $leave_at->gt($open_door_i['date_time_close'])) )
            {
                //Tìm nơi mở cửa sớm nhất
                $min_come_on = clone $open_door_i['date_time_open'];
                for ($k = $i + 1; $k < count($places); $k++) {
                    $open_door_k = $this->setTimeOpenDoor($min_come_on,$places[$k]['time_open'],$places[$k]['time_close']);
                    $temp_leave_at = (clone $open_door_k['date_time_open'])->addMinutes( $this->timeToMinutes($places[$k]['time_stay']) );
                    if ( $min_come_on->gt($open_door_k['date_time_open']) //Nơi mở cửa sớm
                        && $temp_leave_at->lte($open_door_k['date_time_close']) //Và đóng cửa sau khi rời đi
                    )
                    {
                        $min_come_on = clone $open_door_k['date_time_open'];
                        $this->swapPlace($places[$i], $places[$k]);
                    }
                }
                $come_on = clone $min_come_on;
                $leave_at = (clone $come_on)->addMinutes( $this->timeToMinutes($places[$i]['time_stay']) );
            }

            $places[$i]['come_on'] = clone $come_on;
            $places[$i]['leave_at'] = clone $leave_at;
            $temp_time = clone $leave_at;
        }
        return true;
    }

    /* Hàm kiểm tra các địa điểm có phù hợp hay không
     * Input : Danh sách các địa điểm (Place) lấy từ database
     * Output: true/false và danh sách Places sắp xếp theo thứ tự thực hiện.
     */
    public function checkPlaces(&$places) {
        //Tổng thời gian và chi phí của kế hoạch có phù hợp với các địa điểm trên?
        $time = $cost = 0;
        foreach ($places as $place) {
            $time += $this->timeToMinutes($place['time_stay']);
            $cost += $place['cost'];
        }

        //Tổng giá cao hơn thì sẽ không phù hợp
        if ($cost > $this->total_cost) {
            return false;
        }

        //Tổng thời gian vượt quá thời gian thực hiện kế hoạch thì không phù hợp
        //Hoặc tổng thời gian ít hơn thời gian của kế hoạch khác thì không phù hợp
        if ($time > $this->min_to_do || $time <= $this->max_time) {
            return false;
        }

        //Sắp xếp các địa điểm theo thứ tự hợp lý và cập nhật thông tin
        if ( $this->arrangePlaces($places) ) {
            $this->max_cost = $cost;
            $this->max_time = $time;
            $this->great_places = $places;
            return true;
        }
        return false;
    }

    /* Hàm đệ quy SaveMoney:
     * Trong mảng các địa điểm $places
     * Giá trị trả về là mảng $places.
     *
     * $places     : Mảng địa điểm
     * $l          : Bắt đầu vòng lặp từ vị trí $l trong mảng $places
     * $r          : Kết thúc vòng lặp ở vị trí $r trong mảng $places
     * $sum        : Tổng của các đệ quy trước đó
     * $recursive  : Số lần đệ quy (Bắt đầu từ 1)
     * $parent     : Mảng lưu trữ giá trị của hàm đệ quy cha
     */

    protected function ManyPlace($places, $l, $r, $recursive=1, $parent = []) {
        $flag = false; //Đánh dấu có tìm thấy danh sách địa điểm phù hợp không

        for ($i = $l; $i <= $r; $i++) {
            $child = $parent;
            array_push($child, $places[$i]); //Thêm địa điểm $i vào mảng con
            if( $this->checkPlaces($child) ) { //Nếu đã tìm thấy phù hợp thì thoát vòng lặp
                $flag = true; //Đánh dấu đã tìm thấy
                break;
            }
        }

        if ($flag == true) { //Nếu đã tìm thấy địa điểm phù hợp thì sẽ thử tìm thêm 1 place nữa
            $recursive++;
            for ($i = $l; $i <= $r; $i++) {
                $child = $parent;
                array_push($child, $places[$i]); //Thêm địa điểm $i vào mảng con
                $this->ManyPlace($places, $i+1, $r, $recursive, $child); //Gọi đệ quy
            }
        }
    }

    protected function findSaveMoney() {
        $places = Place::where('cost', '<=', $this->total_cost)->orderBy('cost', 'ASC')->get()->toArray();
        $this->ManyPlace($places, 0, count($places) - 1);
        $this->getThumbnail();
        return $this->great_places;
    }

    /* Hàm thay thế địa điểm tìm được bằng địa điểm khác gần hơn
    $places : là danh sách toàn bộ địa điểm
    */
    protected function findShortedPath($places) {
        for ($i = 1; $i < count($this->great_places); $i++) {
            $min_distance = $this->distance($this->great_places[$i-1], $this->great_places[$i]);
            for ($j = 0; $j < count($places); $j++) {
                if ($this->great_places[$i]['category_id'] == $places[$j]['category_id']) {

                    $temp_distance = $this->distance($this->great_places[$i-1], $places[$j]); //Tính khoảng cách
                    $temp_cost = $this->max_cost - $this->great_places[$i]['cost'] + $places[$j]['cost']; //Tính chi phí tạm thời
                    $open_door = $this->setTimeOpenDoor($this->great_places[$i]['come_on'], $places[$j]['time_open'], $places[$j]['time_close']);

                    if (
                        $temp_distance < $min_distance //Địa điểm thay thế gần hơn
                        && $temp_cost <= $this->total_cost //Chi phí đủ
                        && $this->great_places[$i]['come_on']->gte($open_door['date_time_open'])//Kiểm tra time mở cửa
                        && $this->great_places[$i]['leave_at']->lte($open_door['date_time_close'])//Kiểm tra time đóng cửa
                    ) { //Thay thế bằng địa điểm khác gần hơn
                        $this->great_places[$i] = array_merge($this->great_places[$i],$places[$j]);
                        $this->max_cost = $temp_cost; //Cập nhật chi phí kế hoạch
                        $min_distance = $temp_distance;
                    }
                }
            }
        }
    }

    /* Tính khoảng cách giữa 2 điểm */
    protected function distance($place1, $place2) {
        return sqrt( ($place1['lat']-$place2['lat'])*($place1['lat']-$place2['lat']) + ($place1['lng']-$place2['lng'])*($place1['lng']-$place2['lng']) );
    }

    protected function findManyPlace() {
        $places = Place::where('cost', '<=', $this->total_cost)->orderBy('cost', 'ASC')->get()->toArray();
        $this->ManyPlace($places, 0, count($places) - 1); //Tìm số lượng địa điểm tối đa đi được
        $this->findShortedPath($places); //Tìm địa điểm có đường đi ngắn hơn để thay thế
        $this->getThumbnail();
        return $this->great_places;
    }

    protected function findLuxuryPlace() {
        $places = Place::where('star', 5)->orWhere('star', 4)->get()->toArray(); //Chỉ xét những nơi 4 hoặc 5 sao
        $this->ManyPlace($places, 0, count($places) - 1); //Tìm số lượng địa điểm tối đa đi được
        $this->getThumbnail();
        return $this->great_places;
    }

    public function getThumbnail() {
        foreach ($this->great_places as &$place) {
            $thumbnail = new PlaceThumbnail($place['id']);
            $place['place_thumbnail'] = $thumbnail->getThumbnail()->toArray();
        }
    }
}
