<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use DB;

class SatkerController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function satker($id){

        $getSatker = DB::table('satker')->where('ES2_ID', $id)->get();

        return $getSatker->toJson();
    }
}