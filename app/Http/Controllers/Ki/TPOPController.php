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
use App\Model\Ki\TPOPModel;

class TPOPController extends MYController
{
    public function index() {
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_pelaksanaan_tp_op')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'ppk' => 'required',
            'satuan_kerja' => 'required',
            'balai' => 'required',
            'alokasi_dana' => 'required',
            'sumber_dana' => 'required',
            'jumlah_paket_kegiatan' => 'required',
            'jumlah_kak_delegasi' => 'required',
            'tp_op_non_fisik_jumlah' => 'required',
            'tp_op_non_fisik_dana' => 'required',
            'tp_op_fisik_jumlah' => 'required',
            'tp_op_fisik_dana' => 'required',
            'kegiatan_irisan_non_fisik_jumlah' => 'required',
            'kegiatan_irisan_non_fisik_dana' => 'required',
            'kegiatan_irisan_fisik_jumlah' => 'required',
            'kegiatan_irisan_fisik_dana' => 'required',
            'monev_fisik_progres_rencana' => 'required',
            'monev_fisik_progres_realisasi' => 'required',
            'monev_fisik_progres_deviasi' => 'required',
            'monev_keuangan_rencana' => 'required',
            'monev_keuangan_realisasi' => 'required',
            'monev_keuangan_deviasi' => 'required',
            'resiko_program_terkait' => 'required',
            'resiko_anggaran' => 'required',
            'resiko_output' => 'required',
            'resiko_outcome' => 'required',
            'resiko_penerima_manfaat' => 'required',
            'pengaduan_status' => 'required',
            'pengaduan_jumlah' => 'required',
            'laporan_pelaksanaan_proses' => 'required',
            'laporan_pelaksanaan_selesai' => 'required',
            'laporan_pelaksanaan_deliver' => 'required',
        ])->setAttributeNames([
            'ppk' => 'PPPK',
            'satuan_kerja' => 'Satuan Kerja',
            'balai' => 'Balai',
            'alokasi_dana' => 'Alokasi Dana',
            'sumber_dana' => 'Sumber Dana',
            'jumlah_paket_kegiatan' => 'Jumlah Paket Kegiatan',
            'jumlah_kak_delegasi' => 'Jumah KAK Delegasi',
            'tp_op_non_fisik_jumlah' => 'Jumlah TP OP Non Fisik',
            'tp_op_non_fisik_dana' => 'Dana TP OP Non Fisik',
            'tp_op_fisik_jumlah' => 'Jumlah TP OP Fisik',
            'tp_op_fisik_dana' => 'Dana TP OP Dana',
            'kegiatan_irisan_non_fisik_jumlah' => 'Jumlah Kegiatan Irisan Non Fisik',
            'kegiatan_irisan_non_fisik_dana' => 'Dana Kegiatan Irisan Non Fisik',
            'kegiatan_irisan_fisik_jumlah' => 'Jumlah Kegiatan Irisian Fisik',
            'kegiatan_irisan_fisik_dana' => 'Dana Kegiatan Irisian Fisik',
            'monev_fisik_progres_rencana' => 'Monitoring dan Evaluasi Fisik Progress Rencana',
            'monev_fisik_progres_realisasi' => 'Monitoring dan Evaluasi Fisik Progress Realisasi',
            'monev_fisik_progres_deviasi' => 'Monitoring dan Evaluasi Fisik Deviasi',
            'monev_keuangan_rencana' => 'Monitoring dan Evaluasi Rencana Keuangan',
            'monev_keuangan_realisasi' => 'Monitoring dan Evaluasi Realisasi Keuangan',
            'monev_keuangan_deviasi' => 'Monitoring dan Evaluasi Deviaso Keuangan',
            'resiko_program_terkait' => 'Resiko Keterlambatan Program Terkait',
            'resiko_anggaran' => 'Resiko Keterlambatan Anggaran',
            'resiko_output' => 'Resiko Keterlambatan Output',
            'resiko_outcome' => 'Resiko Keterlambatan Outcome',
            'resiko_penerima_manfaat' => 'Resiko Keterlambatan Penerima Manfaat',
            'pengaduan_status' => 'Resiko Keterlambatan Status',
            'pengaduan_jumlah' => 'Resiko Keterlambatan Jumlah',
            'laporan_pelaksanaan_proses' => 'Proses Laporan Pelaksanaan',
            'laporan_pelaksanaan_selesai' => 'Penyelesaian Laporan Pelaksanaan',
            'laporan_pelaksanaan_deliver' => 'Deliver ke Balai Laporan Pelaksanaan',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new TPOPModel;

        $data->fill($request->all());
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
            'ppk' => 'required',
            'satuan_kerja' => 'required',
            'balai' => 'required',
            'alokasi_dana' => 'required',
            'sumber_dana' => 'required',
            'jumlah_paket_kegiatan' => 'required',
            'jumlah_kak_delegasi' => 'required',
            'tp_op_non_fisik_jumlah' => 'required',
            'tp_op_non_fisik_dana' => 'required',
            'tp_op_fisik_jumlah' => 'required',
            'tp_op_fisik_dana' => 'required',
            'kegiatan_irisan_non_fisik_jumlah' => 'required',
            'kegiatan_irisan_non_fisik_dana' => 'required',
            'kegiatan_irisan_fisik_jumlah' => 'required',
            'kegiatan_irisan_fisik_dana' => 'required',
            'monev_fisik_progres_rencana' => 'required',
            'monev_fisik_progres_realisasi' => 'required',
            'monev_fisik_progres_deviasi' => 'required',
            'monev_keuangan_rencana' => 'required',
            'monev_keuangan_realisasi' => 'required',
            'monev_keuangan_deviasi' => 'required',
            'resiko_program_terkait' => 'required',
            'resiko_anggaran' => 'required',
            'resiko_output' => 'required',
            'resiko_outcome' => 'required',
            'resiko_penerima_manfaat' => 'required',
            'pengaduan_status' => 'required',
            'pengaduan_jumlah' => 'required',
            'laporan_pelaksanaan_proses' => 'required',
            'laporan_pelaksanaan_selesai' => 'required',
            'laporan_pelaksanaan_deliver' => 'required',
        ])->setAttributeNames([
            'ppk' => 'PPPK',
            'satuan_kerja' => 'Satuan Kerja',
            'balai' => 'Balai',
            'alokasi_dana' => 'Alokasi Dana',
            'sumber_dana' => 'Sumber Dana',
            'jumlah_paket_kegiatan' => 'Jumlah Paket Kegiatan',
            'jumlah_kak_delegasi' => 'Jumah KAK Delegasi',
            'tp_op_non_fisik_jumlah' => 'Jumlah TP OP Non Fisik',
            'tp_op_non_fisik_dana' => 'Dana TP OP Non Fisik',
            'tp_op_fisik_jumlah' => 'Jumlah TP OP Fisik',
            'tp_op_fisik_dana' => 'Dana TP OP Dana',
            'kegiatan_irisan_non_fisik_jumlah' => 'Jumlah Kegiatan Irisan Non Fisik',
            'kegiatan_irisan_non_fisik_dana' => 'Dana Kegiatan Irisan Non Fisik',
            'kegiatan_irisan_fisik_jumlah' => 'Jumlah Kegiatan Irisian Fisik',
            'kegiatan_irisan_fisik_dana' => 'Dana Kegiatan Irisian Fisik',
            'monev_fisik_progres_rencana' => 'Monitoring dan Evaluasi Fisik Progress Rencana',
            'monev_fisik_progres_realisasi' => 'Monitoring dan Evaluasi Fisik Progress Realisasi',
            'monev_fisik_progres_deviasi' => 'Monitoring dan Evaluasi Fisik Deviasi',
            'monev_keuangan_rencana' => 'Monitoring dan Evaluasi Rencana Keuangan',
            'monev_keuangan_realisasi' => 'Monitoring dan Evaluasi Realisasi Keuangan',
            'monev_keuangan_deviasi' => 'Monitoring dan Evaluasi Deviaso Keuangan',
            'resiko_program_terkait' => 'Resiko Keterlambatan Program Terkait',
            'resiko_anggaran' => 'Resiko Keterlambatan Anggaran',
            'resiko_output' => 'Resiko Keterlambatan Output',
            'resiko_outcome' => 'Resiko Keterlambatan Outcome',
            'resiko_penerima_manfaat' => 'Resiko Keterlambatan Penerima Manfaat',
            'pengaduan_status' => 'Resiko Keterlambatan Status',
            'pengaduan_jumlah' => 'Resiko Keterlambatan Jumlah',
            'laporan_pelaksanaan_proses' => 'Proses Laporan Pelaksanaan',
            'laporan_pelaksanaan_selesai' => 'Penyelesaian Laporan Pelaksanaan',
            'laporan_pelaksanaan_deliver' => 'Deliver ke Balai Laporan Pelaksanaan',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = TPOPModel::findOrfail($request->id);

        $data->fill($request->all());
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
        $data = TPOPModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
