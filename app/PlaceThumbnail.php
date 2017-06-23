<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceThumbnail extends Model
{
    protected $table = 'place_thumbnail';

    protected $placeID;

    function __construct($place_id)
    {
        parent::__construct();
        $this->placeID = $place_id;
    }

    public function create($request)
    {
        //Get data
        $thumbnail_name = $request->getClientOriginalName();
        $request->move('images/places',$thumbnail_name);

        //Insert database
        $this->place_id   = $this->placeID;
        $this->thumbnail = $thumbnail_name;
        $this->save();
    }

    public function count()
    {
        return self::where('place_id', $this->placeID)->count();
    }
    public function getThumbnail()
    {
        return self::where('place_id', $this->placeID)->get();
    }
}
