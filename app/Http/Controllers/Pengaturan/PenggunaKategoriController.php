<?php

namespace App\Http\Controllers\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;
use File;

use App\Model\Pengaturan\PenggunaKategoriModel;

class PenggunaKategoriController extends MYController {
    public function index() {
        $modul_list = Storage::disk('local')->get('modul.json');
        $this->data->modul_list = json_decode($modul_list);

        foreach ($this->data->modul_list as $key => $value) {
            if (Storage::disk('local')->exists($key . '.json')) {
                $menu = Storage::disk('local')->get($key . '.json');
                $value->menu = json_decode($menu);
            }
        }

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = PenggunaKategoriModel::select('*');

        $data = $queryBuilder->get();        

        return DataTables::of($data)->make(true);
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'pengguna_kategori_nama'   => 'required|unique:app_pengguna_kategori,pengguna_kategori_nama',
            'pengguna_kategori_status' => 'required',
        ])->setAttributeNames([
            'pengguna_kategori_nama'   => 'Nama',
            'pengguna_kategori_status' => 'Status',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $pengguna_kategori_id = Str::uuid();

        $data = new PenggunaKategoriModel;

        $data->pengguna_kategori_id = $pengguna_kategori_id;
        $data->pengguna_kategori_nama = $request->pengguna_kategori_nama;
        $data->pengguna_kategori_akses = json_encode($request->pengguna_kategori_akses);
        $data->pengguna_kategori_status = $request->pengguna_kategori_status;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil ditambah.'
        );

        return json_encode($response);
    }

    public function update(Request $request) {
        $validate = Validator::make($request->all(), [
            'pengguna_kategori_id'   => 'required',
            'pengguna_kategori_nama'   => 'required',
            'pengguna_kategori_status' => 'required',
        ])->setAttributeNames([
            'pengguna_kategori_id'   => 'Data',
            'pengguna_kategori_nama'   => 'Nama',
            'pengguna_kategori_status' => 'Status',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PenggunaKategoriModel::findOrfail($request->pengguna_kategori_id);

        $data->pengguna_kategori_nama = $request->pengguna_kategori_nama;
        $data->pengguna_kategori_akses = json_encode($request->pengguna_kategori_akses);
        $data->pengguna_kategori_status = $request->pengguna_kategori_status;
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

    public function destroy($id) {
        $data = PenggunaKategoriModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}