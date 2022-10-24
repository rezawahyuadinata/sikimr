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
use App\Model\Ki\SIDModel;

class SIDController extends MYController
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
        $queryBuilder = DB::table('tbl_sid')
            ->leftJoin("tbl_paket_pekerjaan", 'tbl_sid.kdpaket', '=', 'tbl_paket_pekerjaan.kdpaket')
            ->select('tbl_sid.*', 'nmpaket');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'kdpaket' => 'required',
            'sid_tahun' => 'required',
            'sid_pemrakarsa' => 'required',
            'sid_ee' => 'required',
            'sid_lingkup_pekerjaan' => 'required',
            'sid_outcome' => 'required',
            'desain_tahun' => 'required',
            'desain_pemrakarsa' => 'required',
            'desain_ee' => 'required',
            'desain_lingkup_kerja' => 'required',
            'desain_outcome' => 'required',
            'lingkungan_tahun' => 'required',
            'lingkungan_pemrakarsa' => 'required',
            'lingkungan_no_ijin' => 'required',
            'lingkungan_masa_laku' => 'required',
            'larap_tahun' => 'required',
            'larap_pemrakarsa' => 'required',
            'larap_objek' => 'required',
            'sertifikasi_pengisian_no' => 'required',
            'sertifikasi_pengisian_catatan' => 'required',
            'rencana_no' => 'required',
            'rencana_program' => 'required',
            'rencana_keterkaitan' => 'required',
        ])->setAttributeNames([
            'kdpaket' => 'Nama Paket',
            'sid_tahun' => 'Tahun SID',
            'sid_pemrakarsa' => 'Pemrakarsa SID',
            'sid_ee' => 'Nilai EE SID',
            'sid_lingkup_pekerjaan' => 'Lingkup Pekerjaan SID',
            'sid_outcome' => 'Outcome SID',
            'desain_tahun' => 'Tahun Desain',
            'desain_pemrakarsa' => 'Pemrakarsa Desain',
            'desain_ee' => 'Nilai EE Desain',
            'desain_lingkup_kerja' => 'Lingkup Kerja Desain',
            'desain_outcome' => 'Outcome Desain',
            'lingkungan_tahun' => 'Tahun Dokumen Lingkungan',
            'lingkungan_pemrakarsa' => 'Pemrakarsa Dokumen Lingkungan',
            'lingkungan_no_ijin' => 'No Ijin Dokumen Lingkungan',
            'lingkungan_masa_laku' => 'Masa Laku Dokumen Lingkungan',
            'larap_tahun' => 'Tahun Dokumen LARAP',
            'larap_pemrakarsa' => 'Pemrakarsa Dokumen LARAP',
            'larap_objek' => 'Objek Dokumentasi LARAP',
            'sertifikasi_desain_no' => 'No Sertifikasi Desain',
            'sertifikasi_desain_lingkup_pekerjaan' => 'Lingkungan Sertifikasi Desain',
            'sertifikasi_desain_catatan_penting' => 'Catatan Penting Sertifikasi Desain',
            'sertifikasi_pengisian_no' => 'No Sertifikasi Pengisian',
            'sertifikasi_pengisian_catatan' => 'Catatan Sertifikasi Pengisian',
            'sertifikasi_op_no' => 'No Sertifikasi OP',
            'sertifikasi_op_catatan' => 'Catatan Sertifikasi OP',
            'persiapan_op_pop' => 'POP Persiapan OP',
            'persiapan_op_catatan' => 'Catatan Persiapan OP',
            'rencana_no' => 'No Pola Rencana',
            'rencana_program' => 'Program Pola Rencana',
            'rencana_keterkaitan' => 'Keterkaitan Pola Rencana',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new SIDModel;
        $savedata = $request->all();
        $sertifikasi_desain_no = $savedata['sertifikasi_desain_no'];
        $sertifikasi_desain_lingkup_pekerjaan = $savedata['sertifikasi_desain_lingkup_pekerjaan'];
        $sertifikasi_desain_catatan_penting = $savedata['sertifikasi_desain_catatan_penting'];
        $sertifikasi_desain = '';
        foreach ($sertifikasi_desain_no as $key => $sert) {
            $sertifikasi_desain .= $sertifikasi_desain_no[$key].':'.$sertifikasi_desain_lingkup_pekerjaan[$key].':'.$sertifikasi_desain_catatan_penting[$key].';';
        }
        $savedata['sertifikasi_desain'] = rtrim($sertifikasi_desain,";");
        unset($savedata['sertifikasi_desain_no']);
        unset($savedata['sertifikasi_desain_lingkup_pekerjaan']);
        unset($savedata['sertifikasi_desain_catatan_penting']);

        $sertifikasi_op_no = $savedata['sertifikasi_op_no'];
        $sertifikasi_op_catatan = $savedata['sertifikasi_op_catatan'];
        $sertifikasi_op = '';
        foreach ($sertifikasi_desain_no as $key => $sert) {
            $sertifikasi_op .= $sertifikasi_op_no[$key].':'.$sertifikasi_op_catatan[$key].';';
        }
        $savedata['sertifikasi_op'] = rtrim($sertifikasi_op,";");
        unset($savedata['sertifikasi_op_no']);
        unset($savedata['sertifikasi_op_catatan']);

        $persiapan_op_pop = $savedata['persiapan_op_pop'];
        $persiapan_op_catatan = $savedata['persiapan_op_catatan'];
        $persiapan_op = '';
        foreach ($persiapan_op_pop as $key => $sert) {
            $persiapan_op .= $persiapan_op_pop[$key].':'.$persiapan_op_catatan[$key].';';
        }
        $savedata['persiapan_op'] = rtrim($persiapan_op,';');
        unset($savedata['persiapan_op_pop']);
        unset($savedata['persiapan_op_catatan']);

        $data->fill($savedata);
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
            'kdpaket' => 'required',
            'sid_tahun' => 'required',
            'sid_pemrakarsa' => 'required',
            'sid_ee' => 'required',
            'sid_lingkup_pekerjaan' => 'required',
            'sid_outcome' => 'required',
            'desain_tahun' => 'required',
            'desain_pemrakarsa' => 'required',
            'desain_ee' => 'required',
            'desain_lingkup_kerja' => 'required',
            'desain_outcome' => 'required',
            'lingkungan_tahun' => 'required',
            'lingkungan_pemrakarsa' => 'required',
            'lingkungan_no_ijin' => 'required',
            'lingkungan_masa_laku' => 'required',
            'larap_tahun' => 'required',
            'larap_pemrakarsa' => 'required',
            'larap_objek' => 'required',
            'sertifikasi_pengisian_no' => 'required',
            'sertifikasi_pengisian_catatan' => 'required',
            'rencana_no' => 'required',
            'rencana_program' => 'required',
            'rencana_keterkaitan' => 'required',
        ])->setAttributeNames([
            'kdpaket' => 'Nama Paket',
            'sid_tahun' => 'Tahun SID',
            'sid_pemrakarsa' => 'Pemrakarsa SID',
            'sid_ee' => 'Nilai EE SID',
            'sid_lingkup_pekerjaan' => 'Lingkup Pekerjaan SID',
            'sid_outcome' => 'Outcome SID',
            'desain_tahun' => 'Tahun Desain',
            'desain_pemrakarsa' => 'Pemrakarsa Desain',
            'desain_ee' => 'Nilai EE Desain',
            'desain_lingkup_kerja' => 'Lingkup Kerja Desain',
            'desain_outcome' => 'Outcome Desain',
            'lingkungan_tahun' => 'Tahun Dokumen Lingkungan',
            'lingkungan_pemrakarsa' => 'Pemrakarsa Dokumen Lingkungan',
            'lingkungan_no_ijin' => 'No Ijin Dokumen Lingkungan',
            'lingkungan_masa_laku' => 'Masa Laku Dokumen Lingkungan',
            'larap_tahun' => 'Tahun Dokumen LARAP',
            'larap_pemrakarsa' => 'Pemrakarsa Dokumen LARAP',
            'larap_objek' => 'Objek Dokumentasi LARAP',
            'sertifikasi_desain_no' => 'No Sertifikasi Desain',
            'sertifikasi_desain_lingkup_pekerjaan' => 'Lingkungan Sertifikasi Desain',
            'sertifikasi_desain_catatan_penting' => 'Catatan Penting Sertifikasi Desain',
            'sertifikasi_pengisian_no' => 'No Sertifikasi Pengisian',
            'sertifikasi_pengisian_catatan' => 'Catatan Sertifikasi Pengisian',
            'sertifikasi_op_no' => 'No Sertifikasi OP',
            'sertifikasi_op_catatan' => 'Catatan Sertifikasi OP',
            'persiapan_op_pop' => 'POP Persiapan OP',
            'persiapan_op_catatan' => 'Catatan Persiapan OP',
            'rencana_no' => 'No Pola Rencana',
            'rencana_program' => 'Program Pola Rencana',
            'rencana_keterkaitan' => 'Keterkaitan Pola Rencana',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = SIDModel::findOrfail($request->id);
        $savedata = $request->all();
        $sertifikasi_desain_no = $savedata['sertifikasi_desain_no'];
        $sertifikasi_desain_lingkup_pekerjaan = $savedata['sertifikasi_desain_lingkup_pekerjaan'];
        $sertifikasi_desain_catatan_penting = $savedata['sertifikasi_desain_catatan_penting'];
        $sertifikasi_desain = '';
        foreach ($sertifikasi_desain_no as $key => $sert) {
            $sertifikasi_desain .= $sertifikasi_desain_no[$key].':'.$sertifikasi_desain_lingkup_pekerjaan[$key].':'.$sertifikasi_desain_catatan_penting[$key].';';
        }
        $savedata['sertifikasi_desain'] = rtrim($sertifikasi_desain,';');
        unset($savedata['sertifikasi_desain_no']);
        unset($savedata['sertifikasi_desain_lingkup_pekerjaan']);
        unset($savedata['sertifikasi_desain_catatan_penting']);

        $sertifikasi_op_no = $savedata['sertifikasi_op_no'];
        $sertifikasi_op_catatan = $savedata['sertifikasi_op_catatan'];
        $sertifikasi_op = '';
        foreach ($sertifikasi_desain_no as $key => $sert) {
            $sertifikasi_op .= $sertifikasi_op_no[$key].':'.$sertifikasi_op_catatan[$key].';';
        }
        $savedata['sertifikasi_op'] = rtrim($sertifikasi_op,';');
        unset($savedata['sertifikasi_op_no']);
        unset($savedata['sertifikasi_op_catatan']);

        $persiapan_op_pop = $savedata['persiapan_op_pop'];
        $persiapan_op_catatan = $savedata['persiapan_op_catatan'];
        $persiapan_op = '';
        foreach ($persiapan_op_pop as $key => $sert) {
            $persiapan_op .= $persiapan_op_pop[$key].':'.$persiapan_op_catatan[$key].';';
        }
        $savedata['persiapan_op'] = rtrim($persiapan_op,';');
        unset($savedata['persiapan_op_pop']);
        unset($savedata['persiapan_op_catatan']);

        $data->fill($savedata);
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
        $data = SIDModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
