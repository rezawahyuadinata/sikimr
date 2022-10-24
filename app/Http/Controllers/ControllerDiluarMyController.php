<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ControllerDiluarMyController extends Controller
{
    public function getsisatker($id_eselon)
    {
        $datses = DB::table('satker')->select('KODE','NAMA')->where('ES2_ID',$id_eselon)->get();
        return response()->json($datses);
        // return dd($datses);
    }

    public function getsippk($id_satker)
    {
        $datssat = DB::table('ppk')->select('SATKER_ID','NAMA')->where('SATKER_ID',$id_satker)->get();
        return response()->json($datssat);
        // return dd($datssat);
    }
}
