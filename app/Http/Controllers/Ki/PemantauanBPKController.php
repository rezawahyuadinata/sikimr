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
use App\Model\Ki\PemantauanBPKModel;

class PemantauanBPKController extends MYController
{
    public function index() {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_pemantauan_bpk')
        ->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_pemantauan_bpk.upt_id')
        ->leftJoin('satker', 'satker.ID', '=', 'tbl_pemantauan_bpk.satker_id')
        ->select('tbl_pemantauan_bpk.*', 'eselon-2.NAMA as es2Nama', 'satker.NAMA as satkerNama');

        return DataTables::queryBuilder($queryBuilder)
            ->toJson();

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'judul_matriks' => 'required',
            'no_lhp' => 'required',
            'jenis_lhp',
            'jenis_temuan',
            'reff_lhp',
            'ref_idt',
            'tahun_lhp',
            'judul_temuan_besar' ,
            'rekomendasi_temuan',
            'unit_organisasi',
            'upt_id',
            'satker_id',
            'provinsi',
            'nilai_ss',
            'nilai_tptd',
            'nilai_sisa',
            'uraian_tl_bpk',
            'status_siptl',
            'status_tekomendasi_unor',
            'uraian_kekurangan_tl',
            'status_upload_siptl',
            'status_finalisasi_siptl',
            'uraian_kekurangan_dokumen',
            'uraian_verifikasi',
            'nilai_memadai',
            'status_verifikasi',
            'catatan_belum_memadai',
            'tl_baru_diajukan_verifikasi_itjen',
            'nilai_tl_baru_diajukan_itjen',
            'tl_baru_validasi_uki',
            'nilai_tl_baru_validasi_uki',
            'nilai_total_tl',
            'status_tl_satker',
            'sifat_rekomendasi',
            'rencana_aksi',
            'duedate_renaksi',
            'penyelesaian_bpk_pendek',
            'penyelesaian_bpk_menengah',
            'penyelesaian_bpk_panjang',
            'klasren_dapat_tl',
            'klasren_pembahasan_tl',
            'klasren_tptd',
            'klasren_tl_disepakati',
            'klasren_proses_telaah',
            'pejabat_terkait',
            'catatan_pembahasan',
            'tl_sebelum_khp',
        ])->setAttributeNames([
            'judul_matriks' => 'judul_matriks',
            'no_lhp' => 'no_lhp' , 
            'jenis_lhp' => 'jenis_lhp',
            'jenis_temuan' => 'jenis_temuan' ,
            'reff_lhp' => 'reff_lhp' ,
            'ref_idt' => 'ref_idt',
            'tahun_lhp' => 'tahun_lhp',
            'judul_temuan_besar' => 'judul_temuan_besar',
            'rekomendasi_temuan' => 'rekomendasi_temuan',
            'unit_organisasi' => 'unit_organisasi',
            'upt_id' => 'upt_id' ,
            'satker_id' => 'satker_id' ,
            'provinsi' => 'provinsi' ,
            'nilai_ss'=> 'nilai_ss',
            'nilai_tptd' => 'nilai_tptd' ,
            'nilai_sisa' => 'nilai_sisa' ,
            'uraian_tl_bpk' => 'uraian_tl_bpk',
            'status_siptl' => 'status_siptl' ,
            'status_tekomendasi_unor' => 'status_tekomendasi_unor' ,
            'uraian_kekurangan_tl' => 'uraian_kekurangan_tl' ,
            'status_upload_siptl' => 'status_upload_siptl',
            'status_finalisasi_siptl' => 'status_finalisasi_siptl' ,
            'uraian_kekurangan_dokumen' => 'uraian_kekurangan_dokumen' ,
            'uraian_verifikasi' => 'uraian_verifikasi' ,
            'nilai_memadai' => 'nilai_memadai' ,
            'status_verifikasi' => 'status_verifikasi',
            'catatan_belum_memadai' => 'catatan_belum_memadai', 
            'tl_baru_diajukan_verifikasi_itjen' => 'tl_baru_diajukan_verifikasi_itjen',
            'nilai_tl_baru_diajukan_itjen' => 'nilai_tl_baru_diajukan_itjen',
            'tl_baru_validasi_uki' => 'tl_baru_validasi_uki' ,
            'nilai_tl_baru_validasi_uki' => 'nilai_tl_baru_validasi_uki',
            'nilai_total_tl' => 'nilai_total_tl' ,
            'status_tl_satker' => 'status_tl_satker',
            'sifat_rekomendasi' => 'sifat_rekomendasi',
            'rencana_aksi' => 'rencana_aksi' ,
            'duedate_renaksi' => 'duedate_renaksi',
            'penyelesaian_bpk_pendek' => 'penyelesaian_bpk_pendek',
            'penyelesaian_bpk_menengah' => 'penyelesaian_bpk_menengah',
            'penyelesaian_bpk_panjang' => 'penyelesaian_bpk_panjang' ,
            'klasren_dapat_tl' => 'klasren_dapat_tl',
            'klasren_pembahasan_tl' => 'klasren_pembahasan_tl' ,
            'klasren_tptd' => 'klasren_tptd',
            'klasren_tl_disepakati' => 'klasren_tl_disepakati' ,
            'klasren_proses_telaah' => 'klasren_proses_telaah',
            'pejabat_terkait' => 'pejabat_terkait' ,
            'catatan_pembahasan' => 'catatan_pembahasan',
            'tl_sebelum_khp' => 'tl_sebelum_khp',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PemantauanBPKModel;

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
           
            'judul_matriks' => 'required',
            'no_lhp' => 'required',
            'jenis_lhp',
            'jenis_temuan',
            'reff_lhp',
            'ref_idt',
            'tahun_lhp',
            'judul_temuan_besar' ,
            'rekomendasi_temuan',
            'unit_organisasi',
            'upt_id',
            'satker_id',
            'provinsi',
            'nilai_ss',
            'nilai_tptd',
            'nilai_sisa',
            'uraian_tl_bpk',
            'status_siptl',
            'status_tekomendasi_unor',
            'uraian_kekurangan_tl',
            'status_upload_siptl',
            'status_finalisasi_siptl',
            'uraian_kekurangan_dokumen',
            'uraian_verifikasi',
            'nilai_memadai',
            'status_verifikasi',
            'catatan_belum_memadai',
            'tl_baru_diajukan_verifikasi_itjen',
            'nilai_tl_baru_diajukan_itjen',
            'tl_baru_validasi_uki',
            'nilai_tl_baru_validasi_uki',
            'nilai_total_tl',
            'status_tl_satker',
            'sifat_rekomendasi',
            'rencana_aksi',
            'duedate_renaksi',
            'penyelesaian_bpk_pendek',
            'penyelesaian_bpk_menengah',
            'penyelesaian_bpk_panjang',
            'klasren_dapat_tl',
            'klasren_pembahasan_tl',
            'klasren_tptd',
            'klasren_tl_disepakati',
            'klasren_proses_telaah',
            'pejabat_terkait',
            'catatan_pembahasan',
            'tl_sebelum_khp',
        ])->setAttributeNames([
            'judul_matriks' => 'judul_matriks',
            'no_lhp' => 'no_lhp' , 
            'jenis_lhp' => 'jenis_lhp',
            'jenis_temuan' => 'jenis_temuan' ,
            'reff_lhp' => 'reff_lhp' ,
            'ref_idt' => 'ref_idt',
            'tahun_lhp' => 'tahun_lhp',
            'judul_temuan_besar' => 'judul_temuan_besar',
            'rekomendasi_temuan' => 'rekomendasi_temuan',
            'unit_organisasi' => 'unit_organisasi',
            'upt_id' => 'upt_id' ,
            'satker_id' => 'satker_id' ,
            'provinsi' => 'provinsi' ,
            'nilai_ss'=> 'nilai_ss',
            'nilai_tptd' => 'nilai_tptd' ,
            'nilai_sisa' => 'nilai_sisa' ,
            'uraian_tl_bpk' => 'uraian_tl_bpk',
            'status_siptl' => 'status_siptl' ,
            'status_tekomendasi_unor' => 'status_tekomendasi_unor' ,
            'uraian_kekurangan_tl' => 'uraian_kekurangan_tl' ,
            'status_upload_siptl' => 'status_upload_siptl',
            'status_finalisasi_siptl' => 'status_finalisasi_siptl' ,
            'uraian_kekurangan_dokumen' => 'uraian_kekurangan_dokumen' ,
            'uraian_verifikasi' => 'uraian_verifikasi' ,
            'nilai_memadai' => 'nilai_memadai' ,
            'status_verifikasi' => 'status_verifikasi',
            'catatan_belum_memadai' => 'catatan_belum_memadai', 
            'tl_baru_diajukan_verifikasi_itjen' => 'tl_baru_diajukan_verifikasi_itjen',
            'nilai_tl_baru_diajukan_itjen' => 'nilai_tl_baru_diajukan_itjen',
            'tl_baru_validasi_uki' => 'tl_baru_validasi_uki' ,
            'nilai_tl_baru_validasi_uki' => 'nilai_tl_baru_validasi_uki',
            'nilai_total_tl' => 'nilai_total_tl' ,
            'status_tl_satker' => 'status_tl_satker',
            'sifat_rekomendasi' => 'sifat_rekomendasi',
            'rencana_aksi' => 'rencana_aksi' ,
            'duedate_renaksi' => 'duedate_renaksi',
            'penyelesaian_bpk_pendek' => 'penyelesaian_bpk_pendek',
            'penyelesaian_bpk_menengah' => 'penyelesaian_bpk_menengah',
            'penyelesaian_bpk_panjang' => 'penyelesaian_bpk_panjang' ,
            'klasren_dapat_tl' => 'klasren_dapat_tl',
            'klasren_pembahasan_tl' => 'klasren_pembahasan_tl' ,
            'klasren_tptd' => 'klasren_tptd',
            'klasren_tl_disepakati' => 'klasren_tl_disepakati' ,
            'klasren_proses_telaah' => 'klasren_proses_telaah',
            'pejabat_terkait' => 'pejabat_terkait' ,
            'catatan_pembahasan' => 'catatan_pembahasan',
            'tl_sebelum_khp' => 'tl_sebelum_khp',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PemantauanBPKModel::findOrfail($request->id);

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
        dd($id);
        $data = PemantauanBPKModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
