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
use App\Model\Master\KecamatanModel;
use App\Model\Master\KotaModel;
use App\Model\Master\ProvinsiModel;

class KecamatanController extends MYController {

    public function index() {
        $this->data->provinsi = ProvinsiModel::orderBy('province_code',  'ASC')->get();
        
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_administrative_kecamatan')
        ->leftJoin('tbl_administrative_kabupaten', 'tbl_administrative_kabupaten.kabupaten_code', '=', 'tbl_administrative_kecamatan.kabupaten_code')
        ->leftJoin('tbl_administrative_province', 'tbl_administrative_province.province_code', '=', 'tbl_administrative_kabupaten.province_code')
        ->select('tbl_administrative_kecamatan.*', 'tbl_administrative_kabupaten.kabupaten_code', 'tbl_administrative_kabupaten.kabupaten_name', 'tbl_administrative_province.province_code', 'tbl_administrative_province.province_code', 'tbl_administrative_province.province_name');

        if ($request->filter_province_code) {
            $queryBuilder->where('tbl_administrative_province.province_code', $request->filter_province_code);
        }

        if ($request->filter_kabupaten_code) {
            $queryBuilder->where('tbl_administrative_kabupaten.kabupaten_code', $request->filter_kabupaten_code);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'kabupaten_code'           => 'required',
            'kecamatan_code'   => 'required|unique:master_kecamatan,kecamatan_code',
            'kecamatan_name'   => 'required',
        ])->setAttributeNames([
            'kabupaten_code'          => 'Kota',
            'kecamatan_code'   => 'code',
            'kecamatan_name'   => 'Nama',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $id = Str::uuid();

        $data = new KecamatanModel;

        $data->fill($request->all());
        $data->insert_user  = Auth::user()->id;
        $data->insert_date  = date('Y-m-d H:i:s');
        
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
            'id'      => 'required',
            'kabupaten_code'           => 'required',
            'kecamatan_code'    => 'required',
            'kecamatan_name'    => 'required',
        ])->setAttributeNames([
            'id'      => 'Data',
            'kabupaten_code'           => 'Kota',
            'kecamatan_code'    => 'code',
            'kecamatan_name'    => 'Nama',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = KecamatanModel::findOrfail($request->id);

        $data->fill($request->all());
        $data->update_user  = Auth::user()->id;
        $data->update_date  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id) {
        $data = KecamatanModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    public function get_kecamatan(Request $request) {
        $data = KecamatanModel::where('kabupaten_code', $request->kabupaten_code)->get();

        $response = array (
            'status'    => true,
            'message'   => '',
            'data'      => $data
        );

        return json_encode($response);
    }
}
