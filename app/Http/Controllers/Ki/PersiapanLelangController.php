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
//use App\Model\Ki\SatkerModel;

class PersiapanLelangController extends MYController
{
  public function index() {

    $data = $this->data;
    return view($this->data->page->file_view, compact('data'));

  }

    public function read() {

      $year = request('year');

      $queryBuilder = DB::table('tbl_sipbj_perencanaan')
                          ->select('tbl_sipbj_perencanaan.idrupp',
                          'tbl_sipbj_perencanaan.namapaket',
                          'tbl_sipbj_perencanaan.pkt_ppk',
                          'tbl_sipbj_perencanaan.kak_kpa',
                          'tbl_sipbj_perencanaan.idk_kpa',
                          'tbl_sipbj_perencanaan.rab_kpa',
                          'tbl_sipbj_perencanaan.jd_kpa',
                          'tbl_sipbj_perencanaan.spt_kpa',
                          'tbl_satker.nama_satker',
                          'tbl_sipbj_review.usulan_pkt',
                          'tbl_sipbj_review.pnt',
                          'tbl_sipbj_review.spektek_pkj',
                          'tbl_sipbj_review.rancangan_kontrak_pkj',
                          'tbl_sipbj_review.hps_pkj',
                          'tbl_sipbj_pemilihan.pelak_pml',
                          'tbl_sipbj_pemilihan.monitoring',
                          'tbl_sipbj_pelaksanaan.kntrk_pkt',
                          'tbl_sipbj_pelaksanaan.sppbj_pkt',
                          'tbl_sipbj_pelaksanaan.sdpp_pkt',
                          'tbl_sipbj_pelaksanaan.kso_pkt',
                          'tbl_sipbj_pelaksanaan.subkon_pkt',
                          'tbl_sipbj_pelaksanaan.kmp_perso',
                          'tbl_sipbj_pelaksanaan.perso',
                          'tbl_sipbj_pelaksanaan.spmk',
                          'tbl_sipbj_pelaksanaan.addendum',
                          'tbl_sipbj_pelaksanaan.srh_terima',
                          'tbl_sipbj_pelaksanaan.peralatan',
                          'tbl_sipbj_persiapan.spektek_rpp',
                          'tbl_sipbj_persiapan.rancangan_kontrak_rpp',
                          'tbl_sipbj_persiapan.hps_rpp'
                          )
                          ->distinct()
                          ->rightjoin('tbl_satker', 'tbl_sipbj_perencanaan.id_satker', '=', 'tbl_satker.kode')
                          ->leftjoin('tbl_sipbj_review', 'tbl_sipbj_perencanaan.idrupp', '=', 'tbl_sipbj_review.idrupp')
                          ->leftjoin('tbl_sipbj_pemilihan', 'tbl_sipbj_perencanaan.idrupp', '=', 'tbl_sipbj_pemilihan.idrupp')
                          ->leftjoin('tbl_sipbj_pelaksanaan', 'tbl_sipbj_perencanaan.idrupp', '=', 'tbl_sipbj_pelaksanaan.idrupp')
                          ->leftjoin('tbl_sipbj_persiapan', 'tbl_sipbj_perencanaan.idrupp', '=', 'tbl_sipbj_persiapan.idrupp')
                          ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
                          ;

      return DataTables::queryBuilder($queryBuilder)->toJson();
    }
}
