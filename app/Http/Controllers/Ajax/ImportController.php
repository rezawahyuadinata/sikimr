<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Auth;

class ImportController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function importExcel()
    {
        // Get the csv rows as an array
        $theArray = \Excel::toArray([], request()->file('fileupload'));
        $sliceArray = array_slice($theArray[0], 6);
        $newData = [];
        foreach($sliceArray as $key => $data){
            if($data[2] == null) continue;

            $upt = DB::table('eselon-2')->where('NAMA', $data[11])->first();
            $satker = DB::table('satker')->where('NAMA', $data[12])->first();

            if(!$upt){
                $res['status'] = 0;
                $res['message'] = "Nama Unit Kerja pada baris ".($key+1)." tidak ditemukan";
                return response()->json($res);
                exit();
            }else if(!$satker){
                $res['status'] = 0;
                $res['message'] = "Nama Satuan Kerja pada baris ".($key+1)." tidak ditemukan";
                return response()->json($res);
                exit();
            }
            
            $newData[] = [
                'judul_matriks' => $data[1],
                'no_lhp' => $data[2],
                'jenis_lhp' => $data[3],
                'jenis_temuan' => $data[4],
                'reff_lhp' => $data[5],
                'ref_idt' => $data[6],
                'tahun_lhp' => $data[7],
                'judul_temuan_besar' => $data[8],
                'rekomendasi_temuan' => $data[9],
                'unit_organisasi' => $data[10],
                'upt_id' => $upt->ID,
                'satker_id' => $satker->ID,
                'provinsi' => $data[13],
                'nilai_rekomendasi' => $data[14],
                'nilai_ss' => $data[15],
                'nilai_tptd' => $data[16],
                'nilai_sisa' => $data[17],
                'uraian_tl_bpk' => $data[18],
                'status_siptl' => $data[19],
                'status_tekomendasi_unor' => $data[20],
                'uraian_kekurangan_tl' => $data[21],
                'status_upload_siptl' => $data[22],
                'status_finalisasi_siptl' => $data[23],
                'uraian_kekurangan_dokumen' => $data[24],
                'uraian_verifikasi' => $data[25],
                'nilai_memadai' => $data[26],
                'status_verifikasi' => $data[27],
                'catatan_belum_memadai' => $data[28],
                'tl_baru_diajukan_verifikasi_itjen' => $data[29],
                'nilai_tl_baru_diajukan_itjen' => $data[30],
                'tl_baru_validasi_uki' => $data[31],
                'nilai_tl_baru_validasi_uki' => $data[32],
                'nilai_total_tl' => $data[33],
                'status_tl_satker' => $data[34],
                'sifat_rekomendasi' => $data[35],
                'rencana_aksi' => $data[36],
                'duedate_renaksi' => $data[37],
                'penyelesaian_bpk_pendek' => $data[38],
                'penyelesaian_bpk_menengah' => $data[39],
                'penyelesaian_bpk_panjang' => $data[40],
                'klasren_dapat_tl' => $data[41],
                'klasren_pembahasan_tl' => $data[42],
                'klasren_tptd' => $data[43],
                'klasren_tl_disepakati' => $data[44],
                'klasren_proses_telaah' => $data[45],
                'pejabat_terkait' => $data[46],
                'catatan_pembahasan' => $data[47],
                'tl_sebelum_khp' => $data[48],
                'created_at' => now()->format('Y-m-d H:i:s'),
                'created_by' => Auth::user()->id,
            ];
        }
        
        $insert = DB::table('tbl_pemantauan_bpk')->insert($newData);
        if($insert){
            $res['status'] = 1;
            $res['message'] = "Berhasil Menginput Data";
        }else
        {
            $res['status'] = 0;
            $res['message'] = "Terjadi Kesalahan";
        }
        return response()->json($res);
    }

    public function downloadTemplate()
    {
        // Get the csv rows as an array
        return \Storage::download('public/template/template-input-pemantauan-bpk.xlsx');
    }
}