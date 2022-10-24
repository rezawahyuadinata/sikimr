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
use App\Model\Master\ProvinsiModel;

class ProvinsiController extends MYController
{
    public function index() {
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_administrative_province')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'province_code'   => 'required|unique:tbl_administrative_province,province_code',
            'province_name'   => 'required',
        ])->setAttributeNames([
            'province_code'   => 'code',
            'province_name'   => 'name',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new ProvinsiModel;

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
            'id'   => 'required',
            'province_code'   => 'required',
            'province_name'   => 'required',
        ])->setAttributeNames([
            'id'   => 'Data',
            'province_code'   => 'code',
            'province_name'   => 'name',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = ProvinsiModel::findOrfail($request->id);

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
        $data = ProvinsiModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
