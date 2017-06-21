<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PlaceRequest;
use App\User;
use App\Place;
use Request;
use Response;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminPage() {
        $list_user = User::paginate(5);

        if (Request::ajax()) {
            return Response::json(view('admin.admin-manager-ajax', array('list_user' => $list_user))->render());
        }

        return view('admin.admin-manager', ['list_user' => $list_user]);
    }

    public function AddAdminPermission() {
        $user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : null;

        if ($user_id == null) {
            return 'false';
        }

        $get_user = User::find($user_id);

        if ( $get_user->admin == 1 ) {
            return 'false';
        } else {
            $get_user->admin = 1;
            $get_user->save();
            return 'true';
        }
    }

    public function DelAdminPermission() {
        $user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : null;

        if ($user_id == null) {
            return 'false';
        }

        $get_user = User::find($user_id);

        if ( $get_user->admin == 0 ) {
            return 'false';
        } else {
            $get_user->admin = 0;
            $get_user->save();
            return 'true';
        }
    }

    public function AllPlace() {
        $list_place = Place::paginate(5);

        if (Request::ajax()) {
            return Response::json(view('admin.place.load-place', array('list_place' => $list_place))->render());
        }

        return view('admin.place.all-place', ['list_place' => $list_place]);
    }

    public function InfoPlace() {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

        if ($id == null) {
            return 'false';
        }
        $place = Place::find($id);

        return view('admin.place.info-modal',['place' => $place]);
    }

    public function EditPlaceForm() {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $cates = Category::getAllCategory();
        if ($id == null) {
            return 'false';
        }
        $place = Place::find($id);

        return view('admin.place.edit-form',['place' => $place, 'cates' => $cates]);
    }

    public function EditPlace() {
        $id = isset($_POST['place_id']) ? (int)$_POST['place_id'] : null;
        if ($id == null) {
            return 'false';
        }
        //$place = Place::find($id);
        Place::where('id', $id)->update([
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'description' => $_POST['description'],
            'time_open' => $_POST['time_open'],
            'time_close' => $_POST['time_close'],
            'time_stay' => $_POST['time_stay'],
            'cost' => $_POST['cost'],
            'star' => $_POST['star'],
            'category_id' => $_POST['category_id'],
        ]);

        return 'true';
    }

    public function DelPlace() {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

        if ($id == null) {
            return 'false';
        }

        $place = Place::find($id);
        $place->Plan_Place()->delete();
        $place->delete();
        return 'true';
    }

    public function AddNewPlace() {
        $cates = Category::getAllCategory();
        return view('admin.place.add-new', ['cates' => $cates]);
    }

    public function InsertPlace(PlaceRequest $request) {
        $place = new Place();
        $place->name = $request->name;
        $place->address = $request->address;
        $place->description = $request->description;
        $place->time_open = $request->time_open;
        $place->time_close = $request->time_close;
        $place->time_stay = $request->time_stay;
        $place->cost = $request->cost;
        $place->star = $request->star;
        $place->category_id = $request->category_id;
        $place->save();

        return redirect()->route('add-new-place')->with(['message' => 'The place has been created successfully!']);
    }
}
