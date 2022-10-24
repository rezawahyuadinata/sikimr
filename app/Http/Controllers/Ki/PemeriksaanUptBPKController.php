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
use App\Model\Ki\PemeriksaanBPKModel;

class PemeriksaanUptBPKController extends MYController
{
    public function index() {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_pemantauan_bpk')
                        ->leftJoin('eselon-2', 'tbl_pemantauan_bpk.upt_id', '=', 'eselon-2.id')
                        ->select(
                        'eselon-2.NAMA as esNama',
                        DB::raw('count(tbl_pemantauan_bpk.id) as rekomendasi_jumlah,upt_id,sum(IFNULL(nilai_rekomendasi,0)) rekomendasi_nilai'),
                        DB::raw("SUM(status_tekomendasi_unor = 'SESUAI') tindak_lanjut_sesuai_rekomendasi_jumlah"),
                        DB::raw('SUM(IF(status_tekomendasi_unor = "SESUAI", nilai_rekomendasi, 0)) tindak_lanjut_sesuai_rekomendasi_nilai'),
                        DB::raw('SUM(status_tekomendasi_unor = "BELUM SESUAI") tindak_lanjut_belum_sesuai_rekomendasi_jumlah'),
                        DB::raw('SUM(IF(status_tekomendasi_unor = "BELUM SESUAI", nilai_rekomendasi, 0)) tindak_lanjut_belum_sesuai_rekomendasi_nilai'),
                        DB::raw('SUM(status_tekomendasi_unor = "BELUM DITINDAKLANJUTI") tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah'),
                        DB::raw('SUM(IF(status_tekomendasi_unor = "BELUM DITINDAKLANJUTI", nilai_rekomendasi, 0)) tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai'),
                        DB::raw('SUM(status_tekomendasi_unor = "TIDAK DAPAT DITINDAKLANJUTI") tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah'),
                        DB::raw('SUM(IF(status_tekomendasi_unor = "TIDAK DAPAT DITINDAKLANJUTI", nilai_rekomendasi, 0)) tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai')
                        )
                        ->groupBy('upt_id');
        return DataTables::queryBuilder($queryBuilder)
            ->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'unor' => 'required',
            'nomor_lhp_bpk' => 'required',
            'tahun' => 'required',
            'jenis_lhp' => 'required',
            'rekomendasi_jumlah' => 'required',
            'rekomendasi_nilai' => 'required',
            'tindak_lanjut_sesuai_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_sesuai_rekomendasi_nilai' => 'required',
            'tindak_lanjut_belum_sesuai_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_belum_sesuai_rekomendasi_nilai' => 'required',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai' => 'required',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai' => 'required',
            'deskripsi_tindak_lanjut' => 'required',
        ])->setAttributeNames([
            'unor' => 'UNOR',
            'nomor_lhp_bpk' => 'Nomor LHP BPK',
            'tahun' => 'Tahun',
            'jenis_lhp' => 'Jenis LHP',
            'rekomendasi_jumlah' => 'Jumlah Rekomendasi',
            'rekomendasi_nilai' => 'Nilai Rekomendasi',
            'tindak_lanjut_sesuai_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Sesuai',
            'tindak_lanjut_sesuai_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Sesuai',
            'tindak_lanjut_belum_sesuai_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Belum Sesuai',
            'tindak_lanjut_belum_sesuai_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Belum Sesuai',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Belum Ditindaklanjuti',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Belum Ditindaklanjuti',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Tidak Dapat Ditindaklanjuti',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Tidak Dapat Ditindaklanjuti',
            'deskripsi_tindak_lanjut' => 'Deskripsi Tindak Lanjut',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PemeriksaanBPKModel;

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
            'unor' => 'required',
            'nomor_lhp_bpk' => 'required',
            'tahun' => 'required',
            'jenis_lhp' => 'required',
            'rekomendasi_jumlah' => 'required',
            'rekomendasi_nilai' => 'required',
            'tindak_lanjut_sesuai_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_sesuai_rekomendasi_nilai' => 'required',
            'tindak_lanjut_belum_sesuai_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_belum_sesuai_rekomendasi_nilai' => 'required',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai' => 'required',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah' => 'required',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai' => 'required',
            'deskripsi_tindak_lanjut' => 'required',
        ])->setAttributeNames([
            'unor' => 'UNOR',
            'nomor_lhp_bpk' => 'Nomor LHP BPK',
            'tahun' => 'Tahun',
            'jenis_lhp' => 'Jenis LHP',
            'rekomendasi_jumlah' => 'Jumlah Rekomendasi',
            'rekomendasi_nilai' => 'Nilai Rekomendasi',
            'tindak_lanjut_sesuai_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Sesuai',
            'tindak_lanjut_sesuai_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Sesuai',
            'tindak_lanjut_belum_sesuai_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Belum Sesuai',
            'tindak_lanjut_belum_sesuai_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Belum Sesuai',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Belum Ditindaklanjuti',
            'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Belum Ditindaklanjuti',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah' => 'Jumlah Tindak Lanjut Rekomendasi Tidak Dapat Ditindaklanjuti',
            'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai' => 'Nilai Tindak Lanjut Rekomendasi Tidak Dapat Ditindaklanjuti',
            'deskripsi_tindak_lanjut' => 'Deskripsi Tindak Lanjut',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PemeriksaanBPKModel::findOrfail($request->id);

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
        $data = PemeriksaanBPKModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
