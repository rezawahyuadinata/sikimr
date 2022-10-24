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
use App\Model\Ki\OPKontraktualModel;

class OPKontraktualController extends MYController
{
    public function index() {
        $satker = DB::table("satker")
            ->where("id", Auth::user()->satker_id)
            ->first();
        
        $this->data->pakets = DB::table("tbl_paket_pekerjaan")
            ->where("kdsatker", $satker->KODE ?? null)
            ->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_pelaksanaan_op_kontraktual')
            ->leftJoin("tbl_paket_pekerjaan", 'tbl_pelaksanaan_op_kontraktual.kdpaket', '=', 'tbl_paket_pekerjaan.kdpaket')
            ->select('tbl_pelaksanaan_op_kontraktual.*', 'nmpaket');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'kdpaket'  => 'required',
            'kontrak_no'  => 'required',
            'kontrak_penyedia_jasa'  => 'required',
            'kontrak_mulai'  => 'required',
            'kontrak_selesai'  => 'required',
            'kontrak_nilai'  => 'required',
            'kontrak_sumber_dana'  => 'required',
            'kontrak_jenis'  => 'required',
            'addendum_no'  => 'required',
            'addendum_perubahan'  => 'required',
            'addendum_analisis_status'  => 'required',
            'monev_pergantian_tenaga_inti'  => 'required',
            'monev_progres_rencana'  => 'required',
            'monev_progres_realisasi'  => 'required',
            'monev_deviasi'  => 'required',
            'resiko_program_terkait'  => 'required',
            'resiko_anggaran'  => 'required',
            'resiko_output'  => 'required',
            'resiko_outcome'  => 'required',
            'resiko_penerima_manfaat'  => 'required',
            'pengaduan_status'  => 'required',
            'pengaduan_jumlah'  => 'required',
        ])->setAttributeNames([
            'kdpaket'  => 'Nama Paket',
            'kontrak_no'  => 'NO Kontrak',
            'kontrak_penyedia_jasa'  => 'Penyedia Jasa',
            'kontrak_mulai'  => 'Mulai Kontrak',
            'kontrak_selesai'  => 'Selesai Kontrak',
            'kontrak_nilai'  => 'Nilai Kontrak',
            'kontrak_sumber_dana'  => 'Sumber Dana Kontrak',
            'kontrak_jenis'  => 'Jenis Kontrak',
            'addendum_no'  => 'No Addendum',
            'addendum_perubahan'  => 'Addendum Perubahan',
            'addendum_analisis_status'  => 'Analisis Status Addendum',
            'monev_pergantian_tenaga_inti'  => 'Monev Pergantian Tenaga Inti',
            'monev_progres_rencana'  => 'Monev Progres Rencana',
            'monev_progres_realisasi'  => 'Monev Progres Realisasi',
            'monev_deviasi'  => 'Monev Deviasi',
            'resiko_program_terkait'  => 'Resiko Keterlambatan Program Terkait',
            'resiko_anggaran'  => 'Resiko Keterlambatan Anggaran',
            'resiko_output'  => 'Resiko Keterlambatan Output',
            'resiko_outcome'  => 'Resiko Keterlambatan Outcome',
            'resiko_penerima_manfaat'  => 'Resiko Keterlambatan Penerima Manfaat',
            'pengaduan_status'  => 'Status Pengaduan',
            'pengaduan_jumlah'  => 'Jumlah Pengaduan',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new OPKontraktualModel;

        $saveData = request()->all();
        if($saveData['addendum_perubahan']) {
            $addendum_perubahan = '';
            foreach($saveData['addendum_perubahan'] as $penyebab){
                $addendum_perubahan .= $penyebab.',';
            }
            $saveData['addendum_perubahan'] = rtrim($addendum_perubahan, ',');
        }

        $data->fill($saveData);
        $data->created_by  = Auth::user()->id;
        $data->created_at  = date('Y-m-d H:i:s');
        
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
            'kdpaket'  => 'required',
            'kontrak_no'  => 'required',
            'kontrak_penyedia_jasa'  => 'required',
            'kontrak_mulai'  => 'required',
            'kontrak_selesai'  => 'required',
            'kontrak_nilai'  => 'required',
            'kontrak_sumber_dana'  => 'required',
            'kontrak_jenis'  => 'required',
            'addendum_no'  => 'required',
            'addendum_perubahan'  => 'required',
            'addendum_analisis_status'  => 'required',
            'monev_pergantian_tenaga_inti'  => 'required',
            'monev_progres_rencana'  => 'required',
            'monev_progres_realisasi'  => 'required',
            'monev_deviasi'  => 'required',
            'resiko_program_terkait'  => 'required',
            'resiko_anggaran'  => 'required',
            'resiko_output'  => 'required',
            'resiko_outcome'  => 'required',
            'resiko_penerima_manfaat'  => 'required',
            'pengaduan_status'  => 'required',
            'pengaduan_jumlah'  => 'required',
        ])->setAttributeNames([
            'kdpaket'  => 'Nama Paket',
            'kontrak_no'  => 'NO Kontrak',
            'kontrak_penyedia_jasa'  => 'Penyedia Jasa',
            'kontrak_mulai'  => 'Mulai Kontrak',
            'kontrak_selesai'  => 'Selesai Kontrak',
            'kontrak_nilai'  => 'Nilai Kontrak',
            'kontrak_sumber_dana'  => 'Sumber Dana Kontrak',
            'kontrak_jenis'  => 'Jenis Kontrak',
            'addendum_no'  => 'No Addendum',
            'addendum_perubahan'  => 'Addendum Perubahan',
            'addendum_analisis_status'  => 'Analisis Status Addendum',
            'monev_pergantian_tenaga_inti'  => 'Monev Pergantian Tenaga Inti',
            'monev_progres_rencana'  => 'Monev Progres Rencana',
            'monev_progres_realisasi'  => 'Monev Progres Realisasi',
            'monev_deviasi'  => 'Monev Deviasi',
            'resiko_program_terkait'  => 'Resiko Keterlambatan Program Terkait',
            'resiko_anggaran'  => 'Resiko Keterlambatan Anggaran',
            'resiko_output'  => 'Resiko Keterlambatan Output',
            'resiko_outcome'  => 'Resiko Keterlambatan Outcome',
            'resiko_penerima_manfaat'  => 'Resiko Keterlambatan Penerima Manfaat',
            'pengaduan_status'  => 'Status Pengaduan',
            'pengaduan_jumlah'  => 'Jumlah Pengaduan',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = OPKontraktualModel::findOrfail($request->id);

        $saveData = request()->all();
        if($saveData['addendum_perubahan']) {
            $addendum_perubahan = '';
            foreach($saveData['addendum_perubahan'] as $penyebab){
                $addendum_perubahan .= $penyebab.',';
            }
            $saveData['addendum_perubahan'] = rtrim($addendum_perubahan, ',');
        }

        $data->fill($saveData);
        $data->updated_by  = Auth::user()->id;
        $data->updated_at  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id) {
        $data = OPKontraktualModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
