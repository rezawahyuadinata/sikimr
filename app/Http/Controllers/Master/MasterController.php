<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Auth;

use App\Model\Master\MapModel;

class MasterController extends MYController
{
    public function index()
    {
        $data = $this->data;
        $data->map = MapModel::select('*')->get();
        foreach ($data->map as $key => $value) {
            if ($value->LatLong) {
                $coor = explode(',', $value->LatLong);
                $value->lat = floatval($coor[0]);
                $value->long = floatval($coor[1]);
            }
        }
        return view($this->data->page->file_view, compact('data'));
    }
}
