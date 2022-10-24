<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pengaturan\PenggunaKategoriModel;
use App\Model\Pengaturan\PenggunaAksesModel;
use Auth;
use App\User;
use Hash;
use File;
use Str;

use DataTables;
use Validator;
class RegistersController extends Controller
{
    public function index()
    {
        $queryKategoriBuilder = PenggunaKategoriModel::getActive();
        $data = new \stdClass();

        $data->pengguna_kategori = $queryKategoriBuilder->get();

        $data->satker = DB::table('satker')->get();
        $data->eselon1 = DB::table('eselon-1')->get();
        $data->eselon2 = DB::table('eselon-2')->get();

        $file = 'registerlogin';
        return view($file, compact('data'));
        // return view($file);
    }
    public function read(Request $request)
    {
        $queryBuilder = User::select('users.*', 'app_pengguna_kategori.pengguna_kategori_nama');
        $queryBuilder->leftJoin('app_pengguna_kategori', 'app_pengguna_kategori.pengguna_kategori_id', '=', 'users.pengguna_kategori_id');

        $data = $queryBuilder->get();

        foreach ($data as $key => $value) {
            $value->pengguna_akses = PenggunaAksesModel::getPenggunaAkses()->where('pengguna_id', $value->id)->get();
        }

        return DataTables::of($data)->make(true);
    }
    public function store(Request $request)
    {
        dd($request);
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
        $data->active = null;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }
}
