<?php

namespace App\Http\Controllers\Ki;

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
use App\Model\Master\PbjUnorModel;

class PbjUnorController extends MYController
{
    public function index()
    {
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = PbjUnorModel::select('*')->get();

        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($queryBuilder)->make(true);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'UNIT_ORGANISASI'               => 'required',
            'KONTRAK_PKT'                   => 'required',
            'KONTRAK_PAGU_DIPA'             => 'required',
            'KONTRAK_PAGU_PENGADAAN'        => 'required',
            'TERKONTRAK_PKT'                => 'required',
            'TERKONTRAK_PAGU_DIPA'          => 'required',
            'TERKONTRAK_PAGU_PENGADAAN'     => 'required',
            'PERSIAPAN_PKT'                 => 'required',
            'PERSIAPAN_PAGU_DIPA'           => 'required',
            'PERSIAPAN_PAGU_PENGADAAN'      => 'required',
            'PROSES_LELANG_PKT'             => 'required',
            'PROSES_LELANG_PAGU_DIPA'       => 'required',
            'PROSES_LELANG_PAGU_PENGADAAN'  => 'required',
            'BELUM_LELANG_PKT'              => 'required',
            'BELUM_LELANG_PAGU_DIPA'        => 'required',
            'BELUM_LELANG_PAGU_PENGADAAN'   => 'required',
        ])->setAttributeNames([
            'UNIT_ORGANISASI'               => 'Unit Organisasi',
            'KONTRAK_PKT'                   => 'Kontrak PKT',
            'KONTRAK_PAGU_DIPA'             => 'Kontrak Pagu Dipa',
            'KONTRAK_PAGU_PENGADAAN'        => 'Kontrak Pagu Pengadaan',
            'TERKONTRAK_PKT'                => 'Terkontrak PKT',
            'TERKONTRAK_PAGU_DIPA'          => 'Terkontrak Pagu Dipa',
            'TERKONTRAK_PAGU_PENGADAAN'     => 'Terkontrak Pagu Pengadaan',
            'PERSIAPAN_PKT'                 => 'Persiapan PKT',
            'PERSIAPAN_PAGU_DIPA'           => 'Persiapan Pagu Dipa',
            'PERSIAPAN_PAGU_PENGADAAN'      => 'Persiapan Pagu Pengadaan',
            'PROSES_LELANG_PKT'             => 'Proses Lelang PKT',
            'PROSES_LELANG_PAGU_DIPA'       => 'Proses Lelang Pagu Dipa',
            'PROSES_LELANG_PAGU_PENGADAAN'  => 'Proses Lelang Pagu Pengadaan',
            'BELUM_LELANG_PKT'              => 'Belum Lelang PKT',
            'BELUM_LELANG_PAGU_DIPA'        => 'Belum Lelang Pagu Dipa',
            'BELUM_LELANG_PAGU_PENGADAAN'   => 'Belum Lelang Pagu Pengadaan',
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

        $data = new PbjUnorModel;

        $data->fill($request->all());
        // $data->insert_user  = Auth::user()->id;
        // $data->insert_date  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'UNIT_ORGANISASI'               => 'required',
            'KONTRAK_PKT'                   => 'required',
            'KONTRAK_PAGU_DIPA'             => 'required',
            'KONTRAK_PAGU_PENGADAAN'        => 'required',
            'TERKONTRAK_PKT'                => 'required',
            'TERKONTRAK_PAGU_DIPA'          => 'required',
            'TERKONTRAK_PAGU_PENGADAAN'     => 'required',
            'PERSIAPAN_PKT'                 => 'required',
            'PERSIAPAN_PAGU_DIPA'           => 'required',
            'PERSIAPAN_PAGU_PENGADAAN'      => 'required',
            'PROSES_LELANG_PKT'             => 'required',
            'PROSES_LELANG_PAGU_DIPA'       => 'required',
            'PROSES_LELANG_PAGU_PENGADAAN'  => 'required',
            'BELUM_LELANG_PKT'              => 'required',
            'BELUM_LELANG_PAGU_DIPA'        => 'required',
            'BELUM_LELANG_PAGU_PENGADAAN'   => 'required',
        ])->setAttributeNames([
            'UNIT_ORGANISASI'               => 'Unit Organisasi',
            'KONTRAK_PKT'                   => 'Kontrak PKT',
            'KONTRAK_PAGU_DIPA'             => 'Kontrak Pagu Dipa',
            'KONTRAK_PAGU_PENGADAAN'        => 'Kontrak Pagu Pengadaan',
            'TERKONTRAK_PKT'                => 'Terkontrak PKT',
            'TERKONTRAK_PAGU_DIPA'          => 'Terkontrak Pagu Dipa',
            'TERKONTRAK_PAGU_PENGADAAN'     => 'Terkontrak Pagu Pengadaan',
            'PERSIAPAN_PKT'                 => 'Persiapan PKT',
            'PERSIAPAN_PAGU_DIPA'           => 'Persiapan Pagu Dipa',
            'PERSIAPAN_PAGU_PENGADAAN'      => 'Persiapan Pagu Pengadaan',
            'PROSES_LELANG_PKT'             => 'Proses Lelang PKT',
            'PROSES_LELANG_PAGU_DIPA'       => 'Proses Lelang Pagu Dipa',
            'PROSES_LELANG_PAGU_PENGADAAN'  => 'Proses Lelang Pagu Pengadaan',
            'BELUM_LELANG_PKT'              => 'Belum Lelang PKT',
            'BELUM_LELANG_PAGU_DIPA'        => 'Belum Lelang Pagu Dipa',
            'BELUM_LELANG_PAGU_PENGADAAN'   => 'Belum Lelang Pagu Pengadaan',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PbjUnorModel::findOrfail($request->id);

        $data->fill($request->all());
        // $data->update_user  = Auth::user()->id;
        // $data->update_date  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id)
    {
        $data = PbjUnorModel::findOrfail($id)->delete();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
