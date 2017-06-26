<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Place;

class PlaceController extends Controller
{

    /* Hàm thêm kinh độ, vĩ độ cho place những chưa có tọa độ trong database */
    public function addGoogleLocation() {
        $places = Place::getPlaceNotHaveLocation();
        $success = 0;
        $total = $places->count();
        foreach ($places as $place) {
            $googleData = $this->getGoogleResult($this->stripUnicode($place->name.' '.$place->address));
            if (!empty($googleData['results']['0'])) {
                $place->lat = $googleData['results']['0']['geometry']['location']['lat'];
                $place->lng = $googleData['results']['0']['geometry']['location']['lng'];
                $place->update();
                $success++;
            }
        }

        echo "<pre>";
        print_r( 'Đã lấy được vị trí của '.$success.'/'.$total.' địa điểm!' );
        echo "</pre>";
    }

    /* Hàm gửi yêu cầu lấy thông tin từ Google Map API */
    public function getGoogleResult($searchText) {
        return json_decode(file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$this->stripUnicode($searchText).'&key=AIzaSyB2frlZn3q7BNK83tuN_y1oBBMyuLbsyZA'), true);
    }

    /* Hàm chuyễn chuỗi tiếng Việt về dạng dữ liệu cho URL */
    function stripUnicode($str){
        if (!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
        return str_replace(' ', '+', $str);
    }

    public function getLocation() {
        if ( !empty(($_GET['address'])) ) {
            $result = $this->getGoogleResult($_GET['address']);
            if ( count($result) < 1 ) {
                return false;
            }
            return $result;
        } else {
            return false;
        }
    }

    public function showPlaceList() {
        $place_list = (new Place)->getPlaceList();
        //var_dump(json_decode($place));die;
        return view('place.place-list', compact('place_list'));
    }
}
