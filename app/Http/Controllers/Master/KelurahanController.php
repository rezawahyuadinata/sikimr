<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

//MODEL//
use App\Model\Master\KelurahanModel;
use App\Model\Master\KecamatanModel;
use App\Model\Master\KotaModel;
use App\Model\Master\ProvinsiModel;

class KelurahanController extends MYController
{
    public function index() {
        $this->data->provinsi = ProvinsiModel::orderBy('province_code',  'ASC')->get();
        
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = KelurahanModel::getDatatable();

        $data = $queryBuilder->get();        

        return DataTables::of($data)->make(true);
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'kecamatan_id'     => 'required',
            'kelurahan_kode'   => 'required|unique:master_kelurahan,kelurahan_kode',
            'kelurahan_nama'   => 'required',
        ])->setAttributeNames([
            'kecamatan_id'     => 'Kecamatan',
            'kelurahan_kode'   => 'Kode',
            'kelurahan_nama'   => 'Nama',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $kelurahan_id = Str::uuid();

        $data = new KelurahanModel;

        $data->kelurahan_id = $kelurahan_id;
        $data->kecamatan_id = $request->kecamatan_id;
        $data->kelurahan_kode = $request->kelurahan_kode;
        $data->kelurahan_nama = $request->kelurahan_nama;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function update(Request $request) {
        $validate = Validator::make($request->all(), [
            'kelurahan_id'      => 'required',
            'kecamatan_id'      => 'required',
            'kelurahan_kode'    => 'required',
            'kelurahan_nama'    => 'required',
        ])->setAttributeNames([
            'kelurahan_id'      => 'Data',
            'kecamatan_id'      => 'Kecamatan',
            'kelurahan_kode'    => 'Kode',
            'kelurahan_nama'    => 'Nama',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = KelurahanModel::findOrfail($request->kelurahan_id);

        $data->kecamatan_id = $request->kecamatan_id;
        $data->kelurahan_kode = $request->kelurahan_kode;
        $data->kelurahan_nama = $request->kelurahan_nama;
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($kelurahan_id) {
        $data = KelurahanModel::findOrfail($kelurahan_id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    public function get_kota(Request $request) {
        $data = KotaModel::where('provinsi_id', $request->provinsi_id)->get();

        $response = array (
            'status'    => true,
            'message'   => '',
            'data'      => $data
        );

        return json_encode($response);
    }

    public function get_kecamatan(Request $request) {
        $data = KecamatanModel::where('kota_id', $request->kota_id)->get();

        $response = array (
            'status'    => true,
            'message'   => '',
            'data'      => $data
        );

        return json_encode($response);
    }
}
