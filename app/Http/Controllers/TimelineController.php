<?php
/**
 * Created by PhpStorm.
 * User: minhtrang
 * Date: 5/17/2017
 * Time: 12:07 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Category;

class TimelineController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTimeline($id) {
        $user = User::getUserInfo($id);
        $category = Category::getAllCategory();
        return view('User.time-line', ['user' => $user, 'category' => $category] );
    }

} 