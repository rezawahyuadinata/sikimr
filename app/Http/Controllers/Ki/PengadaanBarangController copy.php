<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;
use Illuminate\Support\Facades\Http;

use DataTables;
use Validator;

//MODEL//

class PengadaanBarangController extends MYController
{
    public function index(Request $request) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://gis.pusair-pu.go.id:8181/api/v1/packet',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS =>'{
            "tahun": "2021"
        }',
        CURLOPT_HTTPHEADER => array(
            'x-key: vHUuNuslJsOZHGw5LWpHkJxR1Au2NGzI'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }
}