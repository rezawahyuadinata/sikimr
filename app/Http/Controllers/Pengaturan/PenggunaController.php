<?php

namespace App\Http\Controllers\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Hash;
use File;
use Str;

use DataTables;
use Validator;

use App\Model\Pengaturan\PenggunaKategoriModel;
use App\Model\Pengaturan\PenggunaAksesModel;
use App\Model\Master\DinasModel;
use App\Model\Master\BalaiModel;

class PenggunaController extends MYController {
    public function index() {
        $queryKategoriBuilder = PenggunaKategoriModel::getActive();

        if ($this->data->user->pengguna_kategori->pengguna_kategori_spesial != 'developer' ) {
            $queryKategoriBuilder->where('pengguna_kategori_spesial', '!=', 'developer');
        }

        $this->data->pengguna_kategori = $queryKategoriBuilder->get();

        $this->data->satker = DB::table('satker')->get();
        $this->data->eselon1 = DB::table('eselon-1')->get();
        $this->data->eselon2 = DB::table('eselon-2')->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = User::select('users.*', 'app_pengguna_kategori.pengguna_kategori_nama', 'satker.NAMA as nama_satker', 'eselon-1.NAMA as nama_eselon1', 'eselon-2.NAMA as nama_eselon2' );
        $queryBuilder->leftJoin('app_pengguna_kategori', 'app_pengguna_kategori.pengguna_kategori_id', '=', 'users.pengguna_kategori_id');
        $queryBuilder->leftJoin('satker', 'users.satker_id', '=', 'satker.ID');
        $queryBuilder->leftJoin('eselon-1', 'users.eselon1_id', '=', 'eselon-1.ID');
        $queryBuilder->leftJoin('eselon-2', 'users.eselon2_id', '=', 'eselon-2.ID');

        $data = $queryBuilder->get();  

        foreach ($data as $key => $value) {
            $value->pengguna_akses = PenggunaAksesModel::getPenggunaAkses()->where('pengguna_id', $value->id)->get();
        }      

        return DataTables::of($data)->make(true);
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'email'   => 'nullable',
            'password'   => 'required',
            'password_confirmation' => 'required|same:password',
        ])->setAttributeNames([
            'name'   => 'Nama',
            'email'   => 'Nama',
            'password'   => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new User;

        $data->id = Str::uuid();
        $data->fill($request->all());
        $data->password = Hash::make($request->password);
        $data->active = 1;
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
            'name'   => 'required',
            'email'   => 'nullable',
            'password'   => 'nullable',
            'password_confirmation' => 'nullable|same:password',
        ])->setAttributeNames([
            'name'   => 'Nama',
            'email'   => 'Email',
            'password'   => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }
        $data_exist = User::findOrfail($request->id);

        DB::beginTransaction();

        $data = User::findOrfail($request->id);

        $data->fill($request->except('password'));
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        $data->active = 1;
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

    public function destroy($id) {
        $data = User::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    public function store_kategori(Request $request) {
        $validate = Validator::make($request->all(), [
            'pengguna_kategori_id'   => 'required',
            'pengguna_akses_aktif' => 'required',
        ])->setAttributeNames([
            'pengguna_kategori_id'   => 'Pengguna Kategori',
            'pengguna_akses_aktif'   => 'Status',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PenggunaAksesModel;
        
        $data->pengguna_akses_id = Str::uuid();
        $data->fill($request->all());
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

    public function destroy_kategori($id) {
        $data = PenggunaAksesModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}