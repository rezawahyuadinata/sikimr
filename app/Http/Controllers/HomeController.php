<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\MYController;
use DB;
use Validator;
use Illuminate\Support\Facades\Hash;

//MODEL//
use App\Model\Pengaturan\ActiveYearModel;
use App\Model\Master\ProvinsiModel;
use App\Model\Master\KotaModel;
use App\Model\Formulir\Form1AModel;
use App\Model\Formulir\Form1BModel;
use App\Model\Master\MapModel;
use App\Model\Master\SuratModel;
use App\Model\Master\PengaduanModel;
use Carbon\Carbon;
use App\Helpers\AppHelper;
use App\User;
use DataTables;
use App\Model\Master\SatkerModel;
use App\Model\Master\Eselon3Model;
use App\Model\Master\Eselon2Model;
use App\Model\Master\Eselon1Model;
use App\Model\Formulir\PemantauanMRModel;

class HomeController extends MYController
{
    public function index()
    {
        if (request()->ajax()) {
            $func = request("function");
            return $this->$func();
        }

        $this->data->tingkat_unit = [
            [
                'tingkat'   => 'UPR-T1',
                'unit'      => 'UNOR',
                'param'  => 'T1_UNOR'
            ],
            [
                'tingkat'   => 'UPR-T2',
                'unit'      => 'UKER',
                'param'  => 'T2_UKER'
            ],
            [
                'tingkat'   => 'UPR-T2',
                'unit'      => 'BALAI (BBWS/BWS)',
                'param'  => 'T2_BALAI'
            ],
            [
                'tingkat'   => 'UPR-T2',
                'unit'      => 'BALTEK',
                'param'  => 'T2_BALTEK'
            ],
            [
                'tingkat'   => 'UPR-T3',
                'unit'      => 'UKER',
                'param'  => 'T3_UKER'
            ],
            [
                'tingkat'   => 'UPR-T3',
                'unit'      => 'BALAI (BBWS/BWS)',
                'param'  => 'T3_BALAI'
            ],
            [
                'tingkat'   => 'UPR-T3',
                'unit'      => 'BALTEK',
                'param'  => 'T3_BALTEK'
            ],
            [
                'tingkat'   => 'UPR-T3',
                'unit'      => 'SKPD-TPOP',
                'param'  => 'T3_SKPD'
            ],
        ];

        $this->data->tahun = isset($_GET['year']) ? $_GET['year'] : date('Y');

        if (Auth::user()->level == 'UPR-T1') {
            $this->data->unit = Eselon1Model::select('eselon-1.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon1_id', '=', 'eselon-1.ID')->where('UPR', 'UPR-T1')->get();
        } else if (Auth::user()->level == 'UPR-T2' && Auth::user()->unit == 'Unit Kerja') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')->where('eselon-2.level_user', 'unit_kerja')->paginate(10);
        } else if (Auth::user()->level == 'UPR-T2' && Auth::user()->unit == 'Balai') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')->where('eselon-2.level_user', 'balai')->paginate(10);
        } else if (Auth::user()->level == 'UPR-T2' && Auth::user()->unit == 'Balai Teknik') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')->where('eselon-2.level_user', 'balai_teknik')->paginate(10);
        } else if (Auth::user()->level == 'UPR-T3' && Auth::user()->unit == 'Unit Kerja') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('eselon-2.level_user', 'unit_kerja')->where('satker.Nama', 'not like', 'Dinas%')->paginate(10);
        } else if (Auth::user()->level == 'UPR-T3' && Auth::user()->unit == 'Balai') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('eselon-2.level_user', 'balai')->where('satker.Nama', 'not like', 'Dinas%')->paginate(10);
        } else if (Auth::user()->level == 'UPR-T3' && Auth::user()->unit == 'Balai Teknik') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('eselon-2.level_user', 'balai_teknik')->where('satker.Nama', 'not like', 'Dinas%')->paginate(10);
        } else if (Auth::user()->level == 'PPK') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi')->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('satker.Nama', 'like', 'Dinas%')->paginate(10);
        }


        $data = $this->data;
        $data->map = MapModel::select('*')->get();
        foreach ($data->map as $key => $value) {
            if ($value->LatLong) {
                $coor = explode(',', $value->LatLong);
                $value->lat = floatval($coor[0]);
                $value->long = floatval($coor[1]);
            }
        }

        $data->progress_pekerjaan_last_date = \Carbon\Carbon::parse(
            DB::table("tbl_api_profiles")
                ->orderBy('tglkirim', 'desc')
                ->first()
                ->tglkirim ?? date("Y-m-d")
        )->format("Y-m-d");
        $data->form_mr_last_date = \Carbon\Carbon::parse(
            DB::table("tbl_komitmen_mr")
                ->whereNotNull("mr_status")
                ->whereNotNull("dibuat_pada")
                ->orderBy('dibuat_pada', 'desc')
                ->first()
                ->dibuat_pada ?? date("Y-m-d")
        )->format("Y-m-d");
        $data->status_penanganan_last_date = \Carbon\Carbon::parse(
            DB::table("tbl_surat")
                ->orderBy('dibuat_pada', 'desc')
                ->first()
                ->dibuat_pada ?? date("Y-m-d")
        )->format("Y-m-d");
        $data->perijinan_last_date = \Carbon\Carbon::parse(
            DB::table("tbl_perijinan")
                ->orderBy('TGL_PENGAJUAN', 'desc')
                ->first()
                ->TGL_PENGAJUAN ?? date("Y-m-d")
        )->format("Y-m-d");

        $data->tgl_backup = DB::table("tbl_api_kontrak")
            ->select("tgl_backup")
            ->groupBy("tgl_backup")
            ->orderBy("id", 'desc')
            ->limit(100)
            ->get();

        $data->tgl_backup_profile = DB::table("tbl_api_profiles")
            ->select("tanggal_backup")
            ->groupBy("tanggal_backup")
            ->orderBy("id", 'desc')
            ->limit(100)
            ->get();

        $data->upt_perizinan = DB::table("tbl_api_daftar_perizinan")
            ->whereNotNull("nama_balai")
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();
        $data->upt_pengaduan = DB::table("tbl_pengaduan")
            ->select("pemilik_resiko_bws")
            ->groupBy("pemilik_resiko_bws")
            ->get();
        $data->satker_pengaduan = DB::table("tbl_pengaduan")
            ->select("pemilik_resiko_satker")
            ->groupBy("pemilik_resiko_satker")
            ->get();
        $data->upt_permohonan_izin = DB::table("tbl_api_permohonan_izin")
            ->whereNotNull("nama_balai")
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();

        $data->javascript = "home_dashboard";
        $data->page->file_js = "home_dashboard";

        $file = 'home_index';


        //updatewaktusurat
        $datsa = SuratModel::all();
        foreach ($datsa as $dat) {
            $hariini = Carbon::now()->format('Y-m-d H:i:s');

            if (Carbon::parse($dat->tanggal_md)->lt(Carbon::now())) {
                $diffMD2 = 0;
            } else {
                $tanggalMD = Carbon::parse($dat->tanggal_md);
                $diffMD = $tanggalMD->diffInDays($hariini);
                $diffMD2 = $diffMD;
            }

            if (Carbon::parse($dat->tanggal_tl)->lt(Carbon::now())) {
                $diffTL2 = 0;
            } else {
                $tanggalTL = Carbon::parse($dat->tanggal_tl);
                $diffTL = $tanggalTL->diffInDays($hariini);
                $diffTL2 = $diffTL;
            }

            if ($diffMD2 <= 5) {
                $tanggalMD = Carbon::parse($dat->tanggal_md);
                $diffMD = $tanggalMD->diffInDays($hariini);
                $statusmd = "Sisa " . ($diffMD + 1) . " Hari Lagi";
                $quer = [
                    'waktu' => $statusmd
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            }

            if ($diffMD2 <= 0) {
                $statusmd = "Waktu telah Habis";
                $quer = [
                    'waktu' => $statusmd
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            }

            if ($diffMD2 > 5) {
                $tanggalMD = Carbon::parse($dat->tanggal_md);
                $diffMD = $tanggalMD->diffInDays($hariini);
                $statusmd = ($diffMD + 1) . " Hari";
                $quer = [
                    'waktu' => $statusmd
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            }


            if ($diffTL2 <= 5) {
                $tanggalTL = Carbon::parse($dat->tanggal_tl);
                $diffTL = $tanggalTL->diffInDays($hariini);
                $statustl = "Sisa " . ($diffTL + 1) . " Hari Lagi";
                $quer = [
                    'status_tl_nota_dinas' => $statustl,
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            }

            if ($diffTL2 <= 0) {
                $statustl = "Waktu telah Habis";
                $quer = [
                    'status_tl_nota_dinas' => $statustl,
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            }

            if ($diffTL2 > 5) {
                $tanggalTL = Carbon::parse($dat->tanggal_tl);
                $diffTL = $tanggalTL->diffInDays($hariini);
                $statustl = ($diffTL + 1) . " Hari";
                $quer = [
                    'status_tl_nota_dinas' => $statustl,
                ];
                SuratModel::where('id', $dat->id)->update($quer);
            };
        }

        // dd($this->data->unit);
        // dd($data);
        return view($file, compact('data'));
    }

    public function detail(Request $request)
    {
        $this->data->tahun = isset($_GET['year']) ? $_GET['year'] : date('Y');

        if ($request->unit == 'T1_UNOR') {
            $this->data->unit = Eselon1Model::select('eselon-1.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon1_id', '=', 'eselon-1.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.eselon2_id', '=', 'eselon-1.ID')
                ->where('UPR', 'UPR-T1')
                ->groupby('eselon-1.Nama')
                ->get();
        } else if ($request->unit == 'T2_UKER') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.eselon2_id', '=', 'eselon-2.ID')
                ->where('eselon-2.level_user', 'unit_kerja')
                ->groupby('eselon-2.Nama')
                ->get();
        } else if ($request->unit == 'T2_BALAI') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.eselon2_id', '=', 'eselon-2.ID')
                ->where('eselon-2.level_user', 'balai')
                ->groupby('eselon-2.Nama')
                ->get();
        } else if ($request->unit == 'T2_BALTEK') {
            $this->data->unit = Eselon2Model::select('eselon-2.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.eselon2_id', '=', 'eselon-2.ID')
                ->where('eselon-2.level_user', 'balai_teknik')
                ->groupby('eselon-2.Nama')
                ->get();
        } else if ($request->unit == 'T3_UKER') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.eselon2_id', '=', 'eselon-2.ID')
                ->where('eselon-2.level_user', 'unit_kerja')
                ->where('satker.Nama', 'not like', 'Dinas%')
                ->groupby('satker.Nama')
                ->get();
        } else if ($request->unit == 'T3_BALAI') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.satker_id', '=', 'satker.ID')
                ->where('eselon-2.level_user', 'balai')
                ->where('satker.Nama', 'not like', 'Dinas%')
                ->groupby('satker.Nama')
                // ->having('satker.nama', '<', 2)
                ->get();
        } else if ($request->unit == 'T3_BALTEK') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.satker_id', '=', 'satker.ID')
                ->where('eselon-2.level_user', 'balai_teknik')
                ->where('satker.Nama', 'not like', 'Dinas%')
                ->groupby('satker.Nama')
                ->get();
        } else if ($request->unit == 'T3_SKPD') {
            $this->data->unit = SatkerModel::select('satker.NAMA', 'tbl_komitmen_mr.verifikasi', 'tbl_pemantauan_mr.triwulan', 'tbl_pemantauan_mr.verifikasi')
                ->leftJoin('eselon-2', 'eselon-2.ID', '=', 'satker.ES2_ID')
                ->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')
                ->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.satker_id', '=', 'satker.ID')
                ->where('satker.Nama', 'like', 'Dinas%')
                ->groupby('satker.Nama')
                ->get();
        }

        $data = $this->data;
        $file = 'detail';

        // dd($this->data);
        return view($file, compact('data'));
    }

    // Chart History Pengadaan Barang dan Jasa
    private function chartPengadaan()
    {
        // $date = request('date');

        $data = new \stdClass();
        $data->series = array(
            array(
                'name' => 'Terkontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Persiapan Kontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Proses Lelang',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Belum Lelang',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Gagal Lelang',
                'periode' => array(),
                'data'  => array()
            )
        );

        // $date = strtotime(date('Y-m-d') . ' -1 year');
        $year = request("date");
        $date = "$year-01-01";
        $oneyear = \Carbon\Carbon::parse($date)->addMonth(11)->format("Y-m-d");
        // dd($date, $oneyear);
        // $oneyear = date('Y-m-d', $date);
        // dd($date, $oneyear);



        $start    = new \DateTime($date);
        $start->modify('first day of this month');
        $end      = new \DateTime($oneyear);
        $end->modify('last day of this month');
        // dd($end);
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        $data->categories = array();
        foreach ($period as $key => $dt) {
            $select_date = \Carbon\Carbon::parse($dt);
            // $last_month = \Carbon\Carbon::parse($dt->format("Y-m-d"))->endOfMonth();
            // $bulan_backup = AppHelper::getMonthIndo($last_month->format('m'));
            // $tgl_backup = $last_month->format("d") . " ". $bulan_backup . " " . $last_month->format("Y") . " ; " . "16:00 WIB";
            // if($last_month->format("Y-m") == $select_date->format("Y-m")) {
            $bulan_backup = AppHelper::getMonthIndo($select_date->format('m'));

            // Cek 16:00
            // $tgl_backup = $select_date->format("d") . " ". $bulan_backup . " " . $select_date->format("Y") . " ; ";

            // Get Tanggal
            $tgl_backup = DB::table("tbl_api_kontrak")
                ->where("tgl_backup", 'like', "%$bulan_backup $year%")
                ->orderBy("id", 'desc')
                ->first()
                ->tgl_backup ?? date('d') . " $bulan_backup $year ; 16:00 WIB";
            // dd($tgl_backup);
            // $data_count_16 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."16:00 WIB"."%")->count();
            // $data_count_12 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."12:00 WIB"."%")->count();
            // $data_count_8 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."08:00 WIB"."%")->count();
            // if($data_count_16 > 0) {
            //     $tgl_backup = $tgl_backup . "16:00 WIB";
            // } elseif($data_count_12 > 0) {
            //     $tgl_backup = $tgl_backup . "12:00 WIB";
            // } else {
            //     $tgl_backup = $tgl_backup . "08:00 WIB";
            // }

            // Selector
            $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Terkontrak')->where('tahun', $year)->first();
            $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Persiapan Kontrak')->where('tahun', $year)->first();
            $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Proses Lelang')->where('tahun', $year)->first();
            $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Belum Lelang')->where('tahun', $year)->first();
            $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Gagal Lelang')->where('tahun', $year)->first();

            array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

            array_push($data->series[0]['data'], ($terkontrak ? floatval($terkontrak->jumlah) : 0));
            array_push($data->series[0]['periode'], $date);
            array_push($data->series[1]['data'], ($persiapan ? floatval($persiapan->jumlah) : 0));
            array_push($data->series[1]['periode'], $date);
            array_push($data->series[2]['data'], ($proses ? floatval($proses->jumlah) : 0));
            array_push($data->series[2]['periode'], $date);
            array_push($data->series[3]['data'], ($belum ? floatval($belum->jumlah) : 0));
            array_push($data->series[3]['periode'], $date);
            array_push($data->series[4]['data'], ($gagal ? floatval($gagal->jumlah) : 0));
            array_push($data->series[4]['periode'], $date);
            // } else {
            //     $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Terkontrak")->first();
            //     $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Persiapan Kontrak")->first();
            //     $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Proses Lelang")->first();
            //     $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Belum Lelang")->first();
            //     $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Gagal Lelang")->first();

            //     array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

            //     array_push($data->series[0]['data'], ($terkontrak ? floatval($terkontrak->jumlah) : 0));
            //     array_push($data->series[0]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[1]['data'], ($persiapan ? floatval($persiapan->jumlah) : 0));
            //     array_push($data->series[1]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[2]['data'], ($proses ? floatval($proses->jumlah) : 0));
            //     array_push($data->series[2]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[3]['data'], ($belum ? floatval($belum->jumlah) : 0));
            //     array_push($data->series[3]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[4]['data'], ($gagal ? floatval($gagal->jumlah) : 0));
            //     array_push($data->series[4]['periode'], $dt->format('Y-m'));
            // }
        }

        return response()->json($data);
    }

    // Kemajuan Pelaksanaan Lelang
    private function chartKemajuan()
    {
        $data = new \stdClass();
        $data->series = array(
            array(
                'name' => 'Terkontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Persiapan Kontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Proses Lelang',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Belum Lelang',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Gagal Lelang',
                'periode' => array(),
                'data'  => array()
            )
        );

        // $date = request("date");
        $year = request("date");
        $date = "$year-01-01";
        $oneyear = \Carbon\Carbon::parse($date)->addMonth(11)->format("Y-m-d");
        // $oneyear = \Carbon\Carbon::parse($date)->subYears(1)->format("Y-m-d");

        $start    = new \DateTime($date);
        $start->modify('first day of this month');
        $end      = new \DateTime($oneyear);
        $end->modify('last day of this month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        $data->categories = array();
        foreach ($period as $key => $dt) {
            $select_date = \Carbon\Carbon::parse($dt);
            // $last_month = \Carbon\Carbon::parse($dt->format("Y-m-d"))->endOfMonth();
            // $bulan_backup = AppHelper::getMonthIndo($last_month->format('m'));
            // $tgl_backup = $last_month->format("d") . " ". $bulan_backup . " " . $last_month->format("Y") . " ; " . "16:00 WIB";

            // if($last_month->format("Y-m") == $select_date->format("Y-m")) {
            $bulan_backup = AppHelper::getMonthIndo($select_date->format('m'));

            // Cek 16:00
            // $tgl_backup = $select_date->format("d") . " ". $bulan_backup . " " . $select_date->format("Y") . " ; ";
            // $data_count_16 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."16:00 WIB"."%")->count();
            // $data_count_12 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."12:00 WIB"."%")->count();
            // $data_count_8 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."08:00 WIB"."%")->count();
            // if($data_count_16 > 0) {
            //     $tgl_backup = $tgl_backup . "16:00 WIB";
            // } elseif($data_count_12 > 0) {
            //     $tgl_backup = $tgl_backup . "12:00 WIB";
            // } else {
            //     $tgl_backup = $tgl_backup . "08:00 WIB";
            // }

            $tgl_backup = DB::table("tbl_api_kontrak")
                ->where("tgl_backup", 'like', "%$bulan_backup $year%")
                ->orderBy("id", 'desc')
                ->first()
                ->tgl_backup ?? date('d') . " $bulan_backup $year ; 16:00 WIB";

            // Selector
            $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%" . $tgl_backup . "%")->where("status_tender", "Terkontrak")->where('tahun', $year)->first();
            $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%" . $tgl_backup . "%")->where("status_tender", "Persiapan Kontrak")->where('tahun', $year)->first();
            $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%" . $tgl_backup . "%")->where("status_tender", "Proses Lelang")->where('tahun', $year)->first();
            $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%" . $tgl_backup . "%")->where("status_tender", "Belum Lelang")->where('tahun', $year)->first();
            $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%" . $tgl_backup . "%")->where("status_tender", "Gagal Lelang")->where('tahun', $year)->first();

            array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

            $total = (($terkontrak ? floatval($terkontrak->jumlah) : 0) + ($persiapan ? floatval($persiapan->jumlah) : 0) + ($proses ? floatval($proses->jumlah) : 0) + ($belum ? floatval($belum->jumlah) : 0)) ?: 1;
            $persentase_terkontrak = round(($terkontrak ? floatval($terkontrak->jumlah) : 0) / $total * 100, 2);
            $persentase_persiapan = round(($persiapan ? floatval($persiapan->jumlah) : 0) / $total * 100, 2);
            $persentase_proses = round(($proses ? floatval($proses->jumlah) : 0) / $total * 100, 2);
            $persentase_belum = round(($belum ? floatval($belum->jumlah) : 0) / $total * 100, 2);
            $persentase_gagal = round(($gagal ? floatval($gagal->jumlah) : 0) / $total * 100, 2);

            array_push($data->series[0]['data'], $persentase_terkontrak);
            array_push($data->series[0]['periode'], $dt->format('Y-m'));
            array_push($data->series[1]['data'], $persentase_persiapan);
            array_push($data->series[1]['periode'], $dt->format('Y-m'));
            array_push($data->series[2]['data'], $persentase_proses);
            array_push($data->series[2]['periode'], $dt->format('Y-m'));
            array_push($data->series[3]['data'], $persentase_belum);
            array_push($data->series[3]['periode'], $dt->format('Y-m'));
            array_push($data->series[4]['data'], $persentase_gagal);
            array_push($data->series[4]['periode'], $dt->format('Y-m'));
            // } else {
            //     $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Terkontrak")->first();
            //     $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Persiapan Kontrak")->first();
            //     $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Proses Lelang")->first();
            //     $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Belum Lelang")->first();
            //     $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Gagal Lelang")->first();

            //     array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

            //     $total = (($terkontrak ? floatval($terkontrak->jumlah) : 0) + ($persiapan ? floatval($persiapan->jumlah) : 0) + ($proses ? floatval($proses->jumlah) : 0) + ($belum ? floatval($belum->jumlah) : 0)) ?: 1;
            //     $persentase_terkontrak = round(($terkontrak ? floatval($terkontrak->jumlah) : 0) / $total * 100, 2);
            //     $persentase_persiapan = round(($persiapan ? floatval($persiapan->jumlah) : 0) / $total * 100,2);
            //     $persentase_proses = round(($proses ? floatval($proses->jumlah) : 0) / $total * 100,2);
            //     $persentase_belum = round(($belum ? floatval($belum->jumlah) : 0) / $total * 100,2);
            //     $persentase_gagal = round(($gagal ? floatval($gagal->jumlah) : 0) / $total * 100,2);

            //     array_push($data->series[0]['data'], $persentase_terkontrak);
            //     array_push($data->series[0]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[1]['data'], $persentase_persiapan);
            //     array_push($data->series[1]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[2]['data'], $persentase_proses);
            //     array_push($data->series[2]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[3]['data'], $persentase_belum);
            //     array_push($data->series[3]['periode'], $dt->format('Y-m'));
            //     array_push($data->series[4]['data'], $persentase_gagal);
            //     array_push($data->series[4]['periode'], $dt->format('Y-m'));
            // }
        }

        // Selector
        // array_push($data->categories, $date);

        // $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Terkontrak')->first();
        // $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Persiapan Kontrak')->first();
        // $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Proses Lelang')->first();
        // $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Belum Lelang')->first();
        // $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Gagal Lelang')->first();

        // $total = (($terkontrak ? floatval($terkontrak->jumlah) : 0) + ($persiapan ? floatval($persiapan->jumlah) : 0) + ($proses ? floatval($proses->jumlah) : 0) + ($belum ? floatval($belum->jumlah) : 0)) ?: 1;
        // $persentase_terkontrak = round(($terkontrak ? floatval($terkontrak->jumlah) : 0) / $total * 100, 2);
        // $persentase_persiapan = round(($persiapan ? floatval($persiapan->jumlah) : 0) / $total * 100,2);
        // $persentase_proses = round(($proses ? floatval($proses->jumlah) : 0) / $total * 100,2);
        // $persentase_belum = round(($belum ? floatval($belum->jumlah) : 0) / $total * 100,2);
        // $persentase_gagal = round(($gagal ? floatval($gagal->jumlah) : 0) / $total * 100,2);

        // array_push($data->series[0]['data'], $persentase_terkontrak);
        // array_push($data->series[0]['periode'], $date);
        // array_push($data->series[1]['data'], $persentase_persiapan);
        // array_push($data->series[1]['periode'], $date);
        // array_push($data->series[2]['data'], $persentase_proses);
        // array_push($data->series[2]['periode'], $date);
        // array_push($data->series[3]['data'], $persentase_belum);
        // array_push($data->series[3]['periode'], $date);
        // array_push($data->series[4]['data'], $persentase_gagal);
        // array_push($data->series[4]['periode'], $date);

        return response()->json($data);
    }


    public function tablePengadaanBanding()
    {
        $date1 = request('date1');
        $date2 = request('date2');
        $year = request("year");

        $kontraktual1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->count();
        $kontraktual1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->sum('pg') / 1000, 0);
        $kontraktual2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->count();
        $kontraktual2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->sum('pg') / 1000, 0);

        $terkontrak1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Terkontrak')->count();
        $terkontrak1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Terkontrak')->sum('pg') / 1000, 0);
        $terkontrak2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Terkontrak')->count();
        $terkontrak2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Terkontrak')->sum('pg') / 1000, 0);

        $persiapan_terkontrak1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', "Persiapan Kontrak")->count();
        $persiapan_terkontrak1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', "Persiapan Kontrak")->sum('pg') / 1000, 0);
        $persiapan_terkontrak2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', "Persiapan Kontrak")->count();
        $persiapan_terkontrak2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', "Persiapan Kontrak")->sum('pg') / 1000, 0);

        $proses_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where("status_tender", "Proses Lelang")->count();
        $proses_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where("status_tender", "Proses Lelang")->sum('pg') / 1000, 0);
        $proses_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where("status_tender", "Proses Lelang")->count();
        $proses_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where("status_tender", "Proses Lelang")->sum('pg') / 1000, 0);

        $belum_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Belum Lelang')->count();
        $belum_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Belum Lelang')->sum('pg') / 1000, 0);
        $belum_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Belum Lelang')->count();
        $belum_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Belum Lelang')->sum('pg') / 1000, 0);

        $gagal_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Gagal Lelang')->count();
        $gagal_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("tahun", $year)->where('status_tender', 'Gagal Lelang')->sum('pg') / 1000, 0);
        $gagal_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Gagal Lelang')->count();
        $gagal_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("tahun", $year)->where('status_tender', 'Gagal Lelang')->sum('pg') / 1000, 0);

        $data =  [
            [
                'tanggal' => $date1,
                'kontraktual' => $kontraktual1,
                'terkontrak' => $terkontrak1,
                'persiapan_terkontrak' => $persiapan_terkontrak1,
                'proses_lelang' => $proses_lelang1,
                'belum_lelang' => $belum_lelang1,
                'gagal_lelang' => $gagal_lelang1
            ],
            [
                'tanggal' => $date2,
                'kontraktual' => $kontraktual2,
                'terkontrak' => $terkontrak2,
                'persiapan_terkontrak' => $persiapan_terkontrak2,
                'proses_lelang' => $proses_lelang2,
                'belum_lelang' => $belum_lelang2,
                'gagal_lelang' => $gagal_lelang2
            ]
        ];

        return response()->json($data);
    }

    public function chartProsesLelang()
    {
        $date = request("date");
        $year = request("year");

        $proses_lelang02 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", "<", 60)
            ->where("tahun", $year)
            ->count();
        $proses_lelang23 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">=", 60)
            ->where("durasi_lelang_hari", "<", 90)
            ->where("tahun", $year)
            ->count();
        $proses_lelang34 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">=", 90)
            ->where("durasi_lelang_hari", "<", 120)
            ->where("tahun", $year)
            ->count();
        $proses_lelang4 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">", 120)
            ->where("tahun", $year)
            ->count();

        $proses_lelang02 = $proses_lelang02;
        $proses_lelang23 = $proses_lelang23;
        $proses_lelang34 = $proses_lelang34;
        $proses_lelang4  = $proses_lelang4;
        $total = $proses_lelang02 + $proses_lelang23 + $proses_lelang34 + $proses_lelang4;

        $persentase_lelang02 = round(($proses_lelang02 / ($total ?: 1) * 100), 2);
        $persentase_lelang23 = round(($proses_lelang23 / ($total ?: 1) * 100), 2);
        $persentase_lelang34 = round(($proses_lelang34 / ($total ?: 1) * 100), 2);
        $persentase_lelang4 = round(($proses_lelang4 / ($total ?: 1) * 100), 2);
        // $persentase = round(($persentase_lelang02 + $persentase_lelang23 + $persentase_lelang34 + $persentase_lelang4),2);
        $persentase = 100;

        $data = [
            'proses_lelang02' => [
                'persen' => $persentase_lelang02,
                'jumlah' => $proses_lelang02
            ],
            'proses_lelang23' => [
                'persen' => $persentase_lelang23,
                'jumlah' => $proses_lelang23
            ],
            'proses_lelang34' => [
                'persen' => $persentase_lelang34,
                'jumlah' => $proses_lelang34
            ],
            'proses_lelang4' => [
                'persen' => $persentase_lelang4,
                'jumlah' => $proses_lelang4
            ],
            'total' => $total,
            'persentase' => $persentase
        ];

        return response()->json($data);
    }

    public function chartTerkontrak()
    {
        $date = request("date");
        $year = request("year");

        $terkontrak02 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", "<", 60)
            ->where("tahun", $year)
            ->count();
        $terkontrak23 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 60)
            ->where("durasi_lelang_hari", "<", 90)
            ->where("tahun", $year)
            ->count();
        $terkontrak34 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 90)
            ->where("durasi_lelang_hari", "<", 120)
            ->where("tahun", $year)
            ->count();
        $terkontrak4 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 120)
            ->where("tahun", $year)
            ->count();

        $terkontrak02 = $terkontrak02;
        $terkontrak23 = $terkontrak23;
        $terkontrak34 = $terkontrak34;
        $terkontrak4  = $terkontrak4;
        $total = $terkontrak02 + $terkontrak23 + $terkontrak34 + $terkontrak4;

        $persentase_terkontrak02 = round(($terkontrak02 / ($total ?: 1) * 100), 2);
        $persentase_terkontrak23 = round(($terkontrak23 / ($total ?: 1) * 100), 2);
        $persentase_terkontrak34 = round(($terkontrak34 / ($total ?: 1) * 100), 2);
        $persentase_terkontrak4 = round(($terkontrak4 / ($total ?: 1) * 100), 2);
        // $persentase = round(($persentase_terkontrak02 + $persentase_terkontrak23 + $persentase_terkontrak34 + $persentase_terkontrak4),2);
        $persentase = 100;

        $data = [
            'terkontrak02' => [
                'persen' => $persentase_terkontrak02,
                'jumlah' => $terkontrak02
            ],
            'terkontrak23' => [
                'persen' => $persentase_terkontrak23,
                'jumlah' => $terkontrak23
            ],
            'terkontrak34' => [
                'persen' => $persentase_terkontrak34,
                'jumlah' => $terkontrak34
            ],
            'terkontrak4' => [
                'persen' => $persentase_terkontrak4,
                'jumlah' => $terkontrak4
            ],
            'total' => $total,
            'persentase' => $persentase
        ];

        return response()->json($data);
    }

    public function chartKontrakHPS()
    {
        $date = request("date");

        $kontrak_hps_au60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 0)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_pengadaan60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 1)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_konstruksi60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 2)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_konsultansi_bu60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 3)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_konsultansi_orang60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 4)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_lainnya60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 5)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_cadangan60 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 6)
            ->where("persentase", '<', 60)
            ->count();
        $kontrak_hps_jumlah60 = $kontrak_hps_au60
            + $kontrak_hps_pengadaan60
            + $kontrak_hps_konstruksi60
            + $kontrak_hps_konsultansi_bu60
            + $kontrak_hps_konsultansi_orang60
            + $kontrak_hps_lainnya60
            + $kontrak_hps_cadangan60;

        $kontrak_hps_au6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 0)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_pengadaan6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 1)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_konstruksi6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 2)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_konsultansi_bu6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 3)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_konsultansi_orang6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 4)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_lainnya6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 5)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_cadangan6070 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 6)
            ->where("persentase", '>=', 60)
            ->where("persentase", '<', 70)
            ->count();
        $kontrak_hps_jumlah6070 = $kontrak_hps_au6070
            + $kontrak_hps_pengadaan6070
            + $kontrak_hps_konstruksi6070
            + $kontrak_hps_konsultansi_bu6070
            + $kontrak_hps_konsultansi_orang6070
            + $kontrak_hps_lainnya6070
            + $kontrak_hps_cadangan6070;

        $kontrak_hps_au7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 0)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_pengadaan7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 1)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_konstruksi7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 2)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_konsultansi_bu7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 3)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_konsultansi_orang7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 4)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_lainnya7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 5)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_cadangan7080 = DB::table('tbl_api_kontrak')
            ->where("tgl_backup", 'like', "%$date%")
            ->where('kdkategori', 6)
            ->where("persentase", '>=', 70)
            ->where("persentase", '<', 80)
            ->count();
        $kontrak_hps_jumlah7080 = $kontrak_hps_au7080
            + $kontrak_hps_pengadaan7080
            + $kontrak_hps_konstruksi7080
            + $kontrak_hps_konsultansi_bu7080
            + $kontrak_hps_konsultansi_orang7080
            + $kontrak_hps_lainnya7080
            + $kontrak_hps_cadangan7080;

        $kontrak_hps_au_total                = $kontrak_hps_au60 + $kontrak_hps_au6070 + $kontrak_hps_au7080;
        $kontrak_hps_pengadaan_total         = $kontrak_hps_pengadaan60 + $kontrak_hps_pengadaan6070 + $kontrak_hps_pengadaan7080;
        $kontrak_hps_konstruksi_total        = $kontrak_hps_konstruksi60 + $kontrak_hps_konstruksi6070 + $kontrak_hps_konstruksi7080;
        $kontrak_hps_konsultansi_bu_total    = $kontrak_hps_konsultansi_bu60 + $kontrak_hps_konsultansi_bu6070 + $kontrak_hps_konsultansi_bu7080;
        $kontrak_hps_konsultansi_orang_total = $kontrak_hps_konsultansi_orang60 + $kontrak_hps_konsultansi_orang6070 + $kontrak_hps_konsultansi_orang7080;
        $kontrak_hps_lainnya_total           = $kontrak_hps_lainnya60 + $kontrak_hps_lainnya6070 + $kontrak_hps_lainnya7080;
        $kontrak_hps_cadangan_total          = $kontrak_hps_cadangan60 + $kontrak_hps_cadangan6070 + $kontrak_hps_cadangan7080;
        $kontrak_hps_jumlah_total            = $kontrak_hps_jumlah60 + $kontrak_hps_jumlah6070 + $kontrak_hps_jumlah7080;

        $kontrak_hps_persentase60   = round($kontrak_hps_jumlah60 / ($kontrak_hps_jumlah_total ?: 1) * 100, 2);
        $kontrak_hps_persentase6070 = round($kontrak_hps_jumlah6070 / ($kontrak_hps_jumlah_total ?: 1) * 100, 2);
        $kontrak_hps_persentase7080 = round($kontrak_hps_jumlah7080 / ($kontrak_hps_jumlah_total ?: 1) * 100, 2);
        $kontrak_hps_persentase_total = round($kontrak_hps_persentase60 + $kontrak_hps_persentase6070 + $kontrak_hps_persentase7080);

        $data = [
            'kontrak_hps60' => [
                'au' => $kontrak_hps_au60,
                'pengadaan' => $kontrak_hps_pengadaan60,
                'konstruksi' => $kontrak_hps_konstruksi60,
                'konsultansi_bu' => $kontrak_hps_konsultansi_bu60,
                'konsultansi_orang' => $kontrak_hps_konsultansi_orang60,
                'lainnya' => $kontrak_hps_lainnya60,
                'cadangan' => $kontrak_hps_cadangan60,
                'jumlah' => $kontrak_hps_jumlah60,
                'persentase' => $kontrak_hps_persentase60
            ],
            'kontrak_hps6070' => [
                'au' => $kontrak_hps_au6070,
                'pengadaan' => $kontrak_hps_pengadaan6070,
                'konstruksi' => $kontrak_hps_konstruksi6070,
                'konsultansi_bu' => $kontrak_hps_konsultansi_bu6070,
                'konsultansi_orang' => $kontrak_hps_konsultansi_orang6070,
                'lainnya' => $kontrak_hps_lainnya6070,
                'cadangan' => $kontrak_hps_cadangan6070,
                'jumlah' => $kontrak_hps_jumlah6070,
                'persentase' => $kontrak_hps_persentase6070
            ],
            'kontrak_hps7080' => [
                'au' => $kontrak_hps_au7080,
                'pengadaan' => $kontrak_hps_pengadaan7080,
                'konstruksi' => $kontrak_hps_konstruksi7080,
                'konsultansi_bu' => $kontrak_hps_konsultansi_bu7080,
                'konsultansi_orang' => $kontrak_hps_konsultansi_orang7080,
                'lainnya' => $kontrak_hps_lainnya7080,
                'cadangan' => $kontrak_hps_cadangan7080,
                'jumlah' => $kontrak_hps_jumlah7080,
                'persentase' => $kontrak_hps_persentase7080
            ],
            'total' => [
                'au' => $kontrak_hps_au_total,
                'pengadaan' => $kontrak_hps_pengadaan_total,
                'konstruksi' => $kontrak_hps_konstruksi_total,
                'konsultansi_bu' => $kontrak_hps_konsultansi_bu_total,
                'konsultansi_orang' => $kontrak_hps_konsultansi_orang_total,
                'lainnya' => $kontrak_hps_lainnya_total,
                'cadangan' => $kontrak_hps_cadangan_total,
                'jumlah' => $kontrak_hps_jumlah_total,
                'persentase' => $kontrak_hps_persentase_total
            ]
        ];

        return response()->json($data);
    }

    public function chartProgressPekerjaan()
    {
        $date = request("date");
        $thang = request("thang");
        $deviasi = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%');
        $dev1_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi', '>', 10);
        $dev1_persentase = $deviasi->count() ? round(($dev1_query->count() / $deviasi->count() * 100)) : 0;
        $dev1 = [
            'persentase' => $dev1_persentase,
            'jumlah_satker' => $dev1_query->count()
        ];

        $dev2_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi', '>', 0)
            ->where('deviasi', '<=', 10);
        $dev2_persentase = $deviasi->count() ? round(($dev2_query->count() / $deviasi->count() * 100)) : 0;;
        $dev2 = [
            'persentase' => $dev2_persentase,
            'jumlah_satker' => $dev2_query->count()
        ];

        $dev3_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi', '>', -10)
            ->where('deviasi', '<=', 0);
        $dev3_persentase = $deviasi->count() ? round(($dev3_query->count() / $deviasi->count() * 100)) : 0;;
        $dev3 = [
            'persentase' => $dev3_persentase,
            'jumlah_satker' => $dev3_query->count()
        ];

        $dev4_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi', '>', -30)
            ->where('deviasi', '<=', -10);
        $dev4_persentase = $deviasi->count() ? round(($dev4_query->count() / $deviasi->count() * 100)) : 0;;
        $dev4 = [
            'persentase' => $dev4_persentase,
            'jumlah_satker' => $dev4_query->count()
        ];

        $dev5_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi', '<=', -30);
        $dev5_persentase = $deviasi->count() ? round(($dev5_query->count() / $deviasi->count() * 100)) : 0;;
        $dev5 = [
            'persentase' => $dev5_persentase,
            'jumlah_satker' => $dev5_query->count()
        ];

        return response()->json([
            'dev1' => $dev1,
            'dev2' => $dev2,
            'dev3' => $dev3,
            'dev4' => $dev4,
            'dev5' => $dev5,
            'persentase_total' => round($dev1['persentase'] + $dev2['persentase'] + $dev3['persentase'] + $dev4['persentase'] + $dev5['persentase']),
            'satker_total' => $dev1['jumlah_satker'] + $dev2['jumlah_satker'] + $dev3['jumlah_satker'] + $dev4['jumlah_satker'] + $dev5['jumlah_satker'],
        ]);
    }

    public function chartProgressMR()
    {
        $tahun = request("tahun");

        $total_datat1 = DB::table('tbl_pemantauan_mr')
            ->where(DB::raw("tahun"), $tahun)
            ->where(DB::raw("tbl_pemantauan_mr", 'UPR-T1'))
            ->select(
                DB::raw()
            );

        $total_datat2 = DB::table('tbl_pemantauan_mr')
            ->where(DB::raw('tahun'), $tahun);

        $total_datat3 = DB::table('tbl_pemantauan_mr')
            ->where(DB::raw('tahun'), $tahun);
    }

    public function chartProgressFisik()
    {
        $date = request("date");
        $thang = request("thang");
        $deviasi_fisik = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%');
        $dev1_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi_fisik', '>', 10);
        $dev1_persentase = $deviasi_fisik->count() ? round(($dev1_query->count() / $deviasi_fisik->count() * 100)) : 0;
        $dev1 = [
            'persentase' => $dev1_persentase,
            'jumlah_satker' => $dev1_query->count()
        ];

        $dev2_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi_fisik', '>', 0)
            ->where('deviasi_fisik', '<=', 10);
        $dev2_persentase = $deviasi_fisik->count() ? round(($dev2_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev2 = [
            'persentase' => $dev2_persentase,
            'jumlah_satker' => $dev2_query->count()
        ];

        $dev3_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi_fisik', '>', -10)
            ->where('deviasi_fisik', '<=', 0);
        $dev3_persentase = $deviasi_fisik->count() ? round(($dev3_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev3 = [
            'persentase' => $dev3_persentase,
            'jumlah_satker' => $dev3_query->count()
        ];

        $dev4_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi_fisik', '>', -30)
            ->where('deviasi_fisik', '<=', -10);
        $dev4_persentase = $deviasi_fisik->count() ? round(($dev4_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev4 = [
            'persentase' => $dev4_persentase,
            'jumlah_satker' => $dev4_query->count()
        ];

        $dev5_query = DB::table("tbl_api_profiles")
            ->where("thang", $thang)
            ->where("tanggal_backup", 'like', $date . '%')
            ->where('deviasi_fisik', '<=', -30);
        $dev5_persentase = $deviasi_fisik->count() ? round(($dev5_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev5 = [
            'persentase' => $dev5_persentase,
            'jumlah_satker' => $dev5_query->count()
        ];

        return response()->json([
            'dev1' => $dev1,
            'dev2' => $dev2,
            'dev3' => $dev3,
            'dev4' => $dev4,
            'dev5' => $dev5,
            'persentase_total' => round($dev1['persentase'] + $dev2['persentase'] + $dev3['persentase'] + $dev4['persentase'] + $dev5['persentase']),
            'satker_total' => $dev1['jumlah_satker'] + $dev2['jumlah_satker'] + $dev3['jumlah_satker'] + $dev4['jumlah_satker'] + $dev5['jumlah_satker'],
        ]);
    }

    public function tableMR()
    {
        $year = request("year");
        // komitmen t1
        $data_t1_komitmen = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("mr_periode"), $year)
            ->where("tbl_komitmen_mr.level", 'UPR-T1')->select(
                DB::raw("'UPR-T1' upr"),
                DB::raw("'UNOR' as level_user"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
            )->get();
        // pemantauan t1
        $data_t1_pemantauan = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), $year)
            ->where("tbl_pemantauan_mr.level", 'UPR-T1')
            ->select(
                DB::raw("'UPR-T1' upr"),
                DB::raw("'UNOR' as level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 1),0) komitmen_t1_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 1),0) komitmen_t1_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 2),0) komitmen_t2_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 2),0) komitmen_t2_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 3),0) komitmen_t3_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 3),0) komitmen_t3_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 4),0) komitmen_t4_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 4),0) komitmen_t4_d"),
            )
            ->get();
        $data_t2_komitmen = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("mr_periode"), $year)
            ->where("tbl_komitmen_mr.level", 'UPR-T2')
            ->leftJoin("eselon-2", 'eselon-2.id', '=', 'tbl_komitmen_mr.eselon2_id')
            ->select(
                DB::raw("'UPR-T2' upr"),
                db::raw("(CASE
                    WHEN `eselon-2`.`level_user` = 'balai' THEN 'BALAI (BBWS/BWS)'
                    WHEN `eselon-2`.`level_user` = 'balai_teknik' THEN 'BALTEK'
                    ELSE 'UKER'
                END) level_user"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
            )
            ->get();
        $data_t2_pemantauan = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), $year)
            ->where("tbl_pemantauan_mr.level", 'UPR-T2')
            ->leftJoin("eselon-2", 'eselon-2.id', '=', 'tbl_pemantauan_mr.eselon2_id')
            ->select(
                DB::raw("'UPR-T2' upr"),
                db::raw("(CASE
                    WHEN `eselon-2`.`level_user` = 'balai' THEN 'BALAI (BBWS/BWS)'
                    WHEN `eselon-2`.`level_user` = 'balai_teknik' THEN 'BALTEK'
                    ELSE 'UKER'
                END) level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 1),0) komitmen_t1_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 1),0) komitmen_t1_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 2),0) komitmen_t2_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 2),0) komitmen_t2_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 3),0) komitmen_t3_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 3),0) komitmen_t3_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 4),0) komitmen_t4_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 4),0) komitmen_t4_d"),
            )
            ->get();
        $data_t3_komitmen = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("mr_periode"), $year)
            ->where("tbl_komitmen_mr.level", 'UPR-T3')
            ->leftJoin("users", 'users.id', '=', 'tbl_komitmen_mr.dibuat_oleh')
            ->leftJoin("eselon-2", 'eselon-2.id', '=', 'tbl_komitmen_mr.eselon2_id')
            ->select(
                DB::raw("'UPR-T3' upr"),
                DB::raw("(CASE
                    WHEN `eselon-2`.`level_user` ='balai' THEN 'BALAI (BBWS/BWS)'
                    WHEN `eselon-2`.`level_user` ='balai_teknik' THEN 'BALTEK'
                    ELSE 'UKER'
                END) level_user"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
            )
            ->get();
        $data_t3_pemantauan = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), $year)
            ->where("tbl_pemantauan_mr.level", 'UPR-T3')
            ->leftJoin("users", 'users.id', '=', 'tbl_pemantauan_mr.dibuat_oleh')
            ->leftJoin("eselon-2", 'eselon-2.id', '=', 'tbl_pemantauan_mr.eselon2_id')
            ->select(
                DB::raw("'UPR-T3' upr"),
                DB::raw("(CASE
                    WHEN `eselon-2`.`level_user` ='balai' THEN 'BALAI (BBWS/BWS)'
                    WHEN `eselon-2`.`level_user` ='balai_teknik' THEN 'BALTEK'
                    ELSE 'UKER'
                END) level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 1),0) komitmen_t1_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 1),0) komitmen_t1_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 2),0) komitmen_t2_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 2),0) komitmen_t2_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 3),0) komitmen_t3_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 3),0) komitmen_t3_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 4),0) komitmen_t4_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 4),0) komitmen_t4_d"),
            )
            ->get();
        $data_t3_op_komitmen = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("mr_periode"), $year)
            ->where("tbl_komitmen_mr.level", 'UPR-T3')
            ->where("eselon2_id", 7)
            ->select(
                DB::raw("'UPR-T3' upr"),
                DB::raw("'SKPD TP-OP' level_user"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
            )
            ->get();
        $data_t3_op_pemantauan = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), $year)
            ->where("tbl_pemantauan_mr.level", 'UPR-T3')
            ->where("eselon2_id", 7)
            ->select(
                DB::raw("'UPR-T3' upr"),
                DB::raw("'SKPD TP-OP' level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 1),0) komitmen_t1_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 1),0) komitmen_t1_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 2),0) komitmen_t2_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 2),0) komitmen_t2_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 3),0) komitmen_t3_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 3),0) komitmen_t3_d"),
                DB::raw("IFNULL(SUM(verifikasi = '3' AND triwulan = 4),0) komitmen_t4_v"),
                DB::raw("IFNULL(SUM(verifikasi < 3 AND triwulan = 4),0) komitmen_t4_d"),
            )
            ->get();

        $total_jumlah = 0;
        $total_komitmen_v = 0;
        $total_komitmen_d = 0;
        $total_komitmen_t1_v = 0;
        $total_komitmen_t1_d = 0;
        $total_komitmen_t2_v = 0;
        $total_komitmen_t2_d = 0;
        $total_komitmen_t3_v = 0;
        $total_komitmen_t3_d = 0;
        $total_komitmen_t4_v = 0;
        $total_komitmen_t4_d = 0;
        $data = [];

        foreach ($data_t1_pemantauan as $dt1) {
            $data[] = $dt1;
            $total_jumlah += $dt1->jumlah;
            $total_komitmen_v += $dt1->komitmen_v;
            $total_komitmen_d += $dt1->komitmen_d;
            $total_komitmen_t1_v += $dt1->komitmen_t1_v;
            $total_komitmen_t1_d += $dt1->komitmen_t1_d;
            $total_komitmen_t2_v += $dt1->komitmen_t2_v;
            $total_komitmen_t2_d += $dt1->komitmen_t2_d;
            $total_komitmen_t3_v += $dt1->komitmen_t3_v;
            $total_komitmen_t3_d += $dt1->komitmen_t3_d;
            $total_komitmen_t4_v += $dt1->komitmen_t4_v;
            $total_komitmen_t4_d += $dt1->komitmen_t4_d;
        }
        foreach ($data_t2_pemantauan as $dt2) {
            $data[] = $dt2;
            $total_jumlah += $dt2->jumlah;
            $total_komitmen_v += $dt2->komitmen_v;
            $total_komitmen_d += $dt2->komitmen_d;
            $total_komitmen_t1_v += $dt2->komitmen_t1_v;
            $total_komitmen_t1_d += $dt2->komitmen_t1_d;
            $total_komitmen_t2_v += $dt2->komitmen_t2_v;
            $total_komitmen_t2_d += $dt2->komitmen_t2_d;
            $total_komitmen_t3_v += $dt2->komitmen_t3_v;
            $total_komitmen_t3_d += $dt2->komitmen_t3_d;
            $total_komitmen_t4_v += $dt2->komitmen_t4_v;
            $total_komitmen_t4_d += $dt2->komitmen_t4_d;
        }
        foreach ($data_t3_pemantauan as $dt3) {
            $data[] = $dt3;
            $total_jumlah += $dt3->jumlah;
            $total_komitmen_v += $dt3->komitmen_v;
            $total_komitmen_d += $dt3->komitmen_d;
            $total_komitmen_t1_v += $dt3->komitmen_t1_v;
            $total_komitmen_t1_d += $dt3->komitmen_t1_d;
            $total_komitmen_t2_v += $dt3->komitmen_t2_v;
            $total_komitmen_t2_d += $dt3->komitmen_t2_d;
            $total_komitmen_t3_v += $dt3->komitmen_t3_v;
            $total_komitmen_t3_d += $dt3->komitmen_t3_d;
            $total_komitmen_t4_v += $dt3->komitmen_t4_v;
            $total_komitmen_t4_d += $dt3->komitmen_t4_d;
        }
        foreach ($data_t3_op_pemantauan as $dt3_op) {
            $data[] = $dt3_op;
            $total_jumlah += $dt3_op->jumlah;
            $total_komitmen_v += $dt3_op->komitmen_v;
            $total_komitmen_d += $dt3_op->komitmen_d;
            $total_komitmen_t1_v += $dt3_op->komitmen_t1_v;
            $total_komitmen_t1_d += $dt3_op->komitmen_t1_d;
            $total_komitmen_t2_v += $dt3_op->komitmen_t2_v;
            $total_komitmen_t2_d += $dt3_op->komitmen_t2_d;
            $total_komitmen_t3_v += $dt3_op->komitmen_t3_v;
            $total_komitmen_t3_d += $dt3_op->komitmen_t3_d;
            $total_komitmen_t4_v += $dt3_op->komitmen_t4_v;
            $total_komitmen_t4_d += $dt3_op->komitmen_t4_d;
        }
        return response()->json([
            'status' => 1,
            'data' => [
                'data' => $data,
                'total' => [
                    'total_jumlah' => $total_jumlah,
                    'total_komitmen_v' => $total_komitmen_v,
                    'total_komitmen_d' => $total_komitmen_d,
                    'total_komitmen_t1_v' => $total_komitmen_t1_v,
                    'total_komitmen_t1_d' => $total_komitmen_t1_d,
                    'total_komitmen_t2_v' => $total_komitmen_t2_v,
                    'total_komitmen_t2_d' => $total_komitmen_t2_d,
                    'total_komitmen_t3_v' => $total_komitmen_t3_v,
                    'total_komitmen_t3_d' => $total_komitmen_t3_d,
                    'total_komitmen_t4_v' => $total_komitmen_t4_v,
                    'total_komitmen_t4_d' => $total_komitmen_t4_d
                ],
                'persentase' => [
                    'komitmen_v' => ROUND($total_komitmen_v == 0 ? 0 : $total_komitmen_v / 293 * 100, 2),
                    'komitmen_d' => ROUND($total_komitmen_d == 0 ? 0 : $total_komitmen_d / 293 * 100, 2),
                    'komitmen_b' => ROUND(($total_komitmen_v + $total_komitmen_d) == 100 ? 0 : (293 - $total_komitmen_v - $total_komitmen_d) / 293 * 100, 2),
                    'komitmen_t1_v' => ROUND($total_komitmen_t1_v == 0 ? 0 : $total_komitmen_t1_v / 293 * 100, 2),
                    'komitmen_t1_d' => ROUND($total_komitmen_t1_d == 0 ? 0 : $total_komitmen_t1_d / 293 * 100, 2),
                    'komitmen_t1_b' => ROUND(($total_komitmen_t1_v + $total_komitmen_t1_d) == 100 ? 0 : (293 - $total_komitmen_t1_v - $total_komitmen_t1_d) / 293 * 100, 2),
                    'komitmen_t2_v' => ROUND($total_komitmen_t2_v == 0 ? 0 : $total_komitmen_t2_v / 293 * 100, 2),
                    'komitmen_t2_d' => ROUND($total_komitmen_t2_d == 0 ? 0 : $total_komitmen_t2_d / 293 * 100, 2),
                    'komitmen_t2_b' => ROUND(($total_komitmen_t2_v + $total_komitmen_t2_d) == 100 ? 0 : (293 - $total_komitmen_t2_v - $total_komitmen_t2_d) / 293 * 100, 2),
                    'komitmen_t3_v' => ROUND($total_komitmen_t3_v == 0 ? 0 : $total_komitmen_t3_v / 293 * 100, 2),
                    'komitmen_t3_d' => ROUND($total_komitmen_t3_d == 0 ? 0 : $total_komitmen_t3_d / 293 * 100, 2),
                    'komitmen_t3_b' => ROUND(($total_komitmen_t3_v + $total_komitmen_t3_d) == 100 ? 0 : (293 - $total_komitmen_t3_v - $total_komitmen_t3_d) / 293 * 100, 2),
                    'komitmen_t4_v' => ROUND($total_komitmen_t4_v == 0 ? 0 : $total_komitmen_t4_v / 293 * 200, 2),
                    'komitmen_t4_d' => ROUND($total_komitmen_t4_d == 0 ? 0 : $total_komitmen_t4_d / 293 * 100, 2),
                    'komitmen_t4_b' => ROUND(($total_komitmen_t4_v + $total_komitmen_t4_d) == 100 ? 0 : (293 - $total_komitmen_t4_v - $total_komitmen_t4_d) / 293 * 100, 2),
                ]
            ]
        ]);
    }

    public function chartFormMr()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $data = [];
        $data_full = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("mr_status")
            ->whereNotNull("level")
            ->select(DB::raw("level, mr_status, count(mr_status) as jumlah"))
            ->groupBy("mr_status")
            ->groupBy("level")
            ->get();

        $levels = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("mr_status")
            ->select("level")
            ->groupBy("level")
            ->get();
        foreach ($levels as $level) {
            $data[$level->level]['status_0'] = 0;
            $data[$level->level]['status_1'] = 0;
            $data[$level->level]['status_2'] = 0;
        }

        foreach ($data_full as $df) {
            $data[$df->level]['status_' . $df->mr_status] = $df->jumlah;
        }

        return response()->json($data);
    }

    public function chartFormMr1()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $date_start = \Carbon\Carbon::parse($date_start)->firstOfMonth();
        $date_end = \Carbon\Carbon::parse($date_end)->addMonths(1)->firstOfMonth();
        $date_diff = $date_start->diffInDays($date_end, false);
        if ($date_diff < 1) {
            return;
        }

        $data = [];
        $data_full = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("date(pemantauan_tanggal)"), ">", $date_start)
            ->where(DB::raw("date(pemantauan_tanggal)"), "<", $date_end)
            ->where("triwulan", 1)
            ->select(DB::raw("level, CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal)) as waktu, count(level) as jumlah"))
            ->groupBy("level")
            ->groupBy(DB::raw("CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal))"))
            ->get()
            ->toArray();
        $label = array_column($data_full, 'waktu');
        $label = array_unique($label);
        $level = array_column($data_full, 'level');
        $level = array_unique($level);

        foreach ($level as $lvl) {
            foreach ($label as $key => $lb) {
                $data[$lvl][$key] = 0;
                foreach ($data_full as $df) {
                    if ($df->waktu == $lb && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1]) . " " . $labex[0];
        }

        return response()->json([
            'labels' => $label,
            'level' => $level,
            'datasets' => $data
        ]);
    }

    public function chartFormMr2()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $date_start = \Carbon\Carbon::parse($date_start)->firstOfMonth();
        $date_end = \Carbon\Carbon::parse($date_end)->addMonths(1)->firstOfMonth();
        $date_diff = $date_start->diffInDays($date_end, false);
        if ($date_diff < 1) {
            return;
        }

        $data = [];
        $data_full = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("date(pemantauan_tanggal)"), ">", $date_start)
            ->where(DB::raw("date(pemantauan_tanggal)"), "<", $date_end)
            ->where("triwulan", 2)
            ->select(DB::raw("level, CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal)) as waktu, count(level) as jumlah"))
            ->groupBy("level")
            ->groupBy(DB::raw("CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal))"))
            ->get()
            ->toArray();
        $label = array_column($data_full, 'waktu');
        $label = array_unique($label);
        $level = array_column($data_full, 'level');
        $level = array_unique($level);

        foreach ($level as $lvl) {
            foreach ($label as $key => $lb) {
                $data[$lvl][$key] = 0;
                foreach ($data_full as $df) {
                    if ($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1]) . " " . $labex[0];
        }

        return response()->json([
            'labels' => $label,
            'level' => $level,
            'datasets' => $data
        ]);
    }

    public function chartFormMr3()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $date_start = \Carbon\Carbon::parse($date_start)->firstOfMonth();
        $date_end = \Carbon\Carbon::parse($date_end)->addMonths(1)->firstOfMonth();
        $date_diff = $date_start->diffInDays($date_end, false);
        if ($date_diff < 1) {
            return;
        }

        $data = [];
        $data_full = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("date(pemantauan_tanggal)"), ">", $date_start)
            ->where(DB::raw("date(pemantauan_tanggal)"), "<", $date_end)
            ->where("triwulan", 3)
            ->select(DB::raw("level, CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal)) as waktu, count(level) as jumlah"))
            ->groupBy("level")
            ->groupBy(DB::raw("CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal))"))
            ->get()
            ->toArray();
        $label = array_column($data_full, 'waktu');
        $label = array_unique($label);
        $level = array_column($data_full, 'level');
        $level = array_unique($level);

        foreach ($level as $lvl) {
            foreach ($label as $key => $lb) {
                $data[$lvl][$key] = 0;
                foreach ($data_full as $df) {
                    if ($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1]) . " " . $labex[0];
        }

        return response()->json([
            'labels' => $label,
            'level' => $level,
            'datasets' => $data
        ]);
    }

    public function chartFormMr4()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $date_start = \Carbon\Carbon::parse($date_start)->firstOfMonth();
        $date_end = \Carbon\Carbon::parse($date_end)->addMonths(1)->firstOfMonth();
        $date_diff = $date_start->diffInDays($date_end, false);
        if ($date_diff < 1) {
            return;
        }

        $data = [];
        $data_full = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("date(pemantauan_tanggal)"), ">", $date_start)
            ->where(DB::raw("date(pemantauan_tanggal)"), "<", $date_end)
            ->where("triwulan", 4)
            ->select(DB::raw("level, CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal)) as waktu, count(level) as jumlah"))
            ->groupBy("level")
            ->groupBy(DB::raw("CONCAT(YEAR(pemantauan_tanggal), '-', MONTH(pemantauan_tanggal))"))
            ->get()
            ->toArray();
        $label = array_column($data_full, 'waktu');
        $label = array_unique($label);
        $level = array_column($data_full, 'level');
        $level = array_unique($level);

        foreach ($level as $lvl) {
            foreach ($label as $key => $lb) {
                $data[$lvl][$key] = 0;
                foreach ($data_full as $df) {
                    if ($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1]) . " " . $labex[0];
        }

        return response()->json([
            'labels' => $label,
            'level' => $level,
            'datasets' => $data
        ]);
    }

    public function chartStatus()
    {
        $date_start = request('date_start');
        $date_end = request('date_end');
        $data = [];
        $data['selesai'] = DB::table("tbl_surat")
            ->where("status", 2)
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->count() ?? 0;
        $data['proses'] = DB::table("tbl_surat")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status", 1)
            ->count() ?? 0;
        $data['belum_tl'] = DB::table("tbl_surat")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status", 0)
            ->count() ?? 0;
        return response()->json($data);
    }

    public function chartPerijinan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");

        $data = [];
        $data_all = DB::table("tbl_api_daftar_perizinan")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"));

        if ($upt) {
            $data_all->where("nama_balai", $upt);
        }
        // dd($data_all->select("nama_balai", "jenis_permohonan_edit")->get());

        $data_all = $data_all->select("nama_balai", 'jenis_permohonan_edit', DB::raw("COUNT(nama_balai) as total"))
            ->groupBy("nama_balai")
            ->groupBy("jenis_permohonan_edit")
            ->get()
            ->toArray();

        $bws = array_column($data_all, 'nama_balai');
        $bws = array_unique($bws);

        $jenis = array_column($data_all, 'jenis_permohonan_edit');
        $jenis = array_unique($jenis);

        $data_new[0]['label'] = "Pengusahaan SDA";
        $data_new[0]['data'] = [];
        $data_new[1]['label'] = "Penggunaan SDA";
        $data_new[1]['data'] = [];
        $data_new[2]['label'] = "Pengusahaan SDA Belum Berizin";
        $data_new[2]['data'] = [];
        $data_new[3]['label'] = "Penggunaan SDA Belum Berizin";
        $data_new[3]['data'] = [];

        foreach ($bws as $bkey => $b) {
            $data_new[0]['data'][$bkey] = 0;
            $data_new[1]['data'][$bkey] = 0;
            $data_new[2]['data'][$bkey] = 0;
            $data_new[3]['data'][$bkey] = 0;
            foreach ($data_all as $dall) {
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Pengusahaan SDA") {
                    $data_new[0]['data'][$bkey] = $dall->total;
                }
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Penggunaan SDA") {
                    $data_new[1]['data'][$bkey] = $dall->total;
                }
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Pengusahaan SDA Belum Berizin") {
                    $data_new[2]['data'][$bkey] = $dall->total;
                }
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Penggunaan SDA Belum Berizin") {
                    $data_new[3]['data'][$bkey] = $dall->total;
                }

                // if($dall->nama_balai == $b && $dall->jenis_permohonan == $jns) {
                //     $data_new[$jkey]['data'][$bkey] = $data_new[$jkey]['data'][$bkey] + $dall->total;
                // }
            }
        }

        return response()->json([
            'labels' => $bws,
            'datasets' => $data_new
        ]);
    }

    // chart pengaduan
    public function chartPengaduan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");

        $data = [];
        $data_all = DB::table("tbl_pengaduan")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"));

        if ($upt) {
            $data_all->where("pemilik_resiko_bws", $upt);
        }

        $data_all = $data_all->select("pemilik_resiko_bws", 'jenis_pengaduan', DB::raw("COUNT(*) as total"))
            ->groupBy("pemilik_resiko_bws")
            ->groupBy("jenis_pengaduan")
            ->get()
            ->toArray();

        $bws = array_column($data_all, 'pemilik_resiko_bws');
        $bws = array_unique($bws);

        $jenis = array_column($data_all, 'jenis_pengaduan');
        $jenis = array_unique($jenis);

        $data_new[0]['label'] = "semua";
        $data_new[0]['data'] = [];
        $data_new[1]['label'] = "kegiatan";
        $data_new[1]['data'] = [];
        $data_new[2]['label'] = "umum";
        $data_new[2]['data'] = [];


        foreach ($bws as $bkey => $b) {
            $data_new[0]['data'][$bkey] = 0;
            $data_new[1]['data'][$bkey] = 0;
            $data_new[2]['data'][$bkey] = 0;

            foreach ($data_all as $dall) {
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "semua") {
                    $data_new[0]['data'][$bkey] = $dall->total;
                }
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "kegiatan") {
                    $data_new[1]['data'][$bkey] = $dall->total;
                }
                if ($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "umum") {
                    $data_new[2]['data'][$bkey] = $dall->total;
                }


                // if($dall->nama_balai == $b && $dall->jenis_permohonan == $jns) {
                //     $data_new[$jkey]['data'][$bkey] = $data_new[$jkey]['data'][$bkey] + $dall->total;
                // }
            }
        }

        return response()->json([
            'labels' => $bws,
            'datasets' => $data_new
        ]);
    }

    //chart kelengkapan dokumen per paket
    public function chartKelengkapanDokumen()
    {
        $year = request("year");

        $data_rupp = DB::table('tbl_sipbj_perencanaan')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->rightjoin('tbl_satker', 'tbl_sipbj_perencanaan.id_satker', '=', 'tbl_satker.kode');
        $data_pkt_ppk = DB::table('tbl_sipbj_perencanaan')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->rightjoin('tbl_satker', 'tbl_sipbj_perencanaan.id_satker', '=', 'tbl_satker.kode')
            ->whereNotNull('tbl_sipbj_perencanaan.pkt_ppk');
        $data_dok_perenc = DB::table('tbl_sipbj_perencanaan')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->rightjoin('tbl_satker', 'tbl_sipbj_perencanaan.id_satker', '=', 'tbl_satker.kode')
            ->whereNotNull('tbl_sipbj_perencanaan.kak_kpa')
            ->whereNotNull('tbl_sipbj_perencanaan.idk_kpa')
            ->whereNotNull('tbl_sipbj_perencanaan.rab_kpa')
            ->whereNotNull('tbl_sipbj_perencanaan.jd_kpa')
            ->whereNotNull('tbl_sipbj_perencanaan.spt_kpa');
        $data_dok_rpp = DB::table('tbl_sipbj_persiapan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_persiapan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_persiapan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_persiapan.spektek_rpp')
            ->whereNotNull('tbl_sipbj_persiapan.rancangan_kontrak_rpp')
            ->whereNotNull('tbl_sipbj_persiapan.hps_rpp');
        $data_rev_dok_rpp = DB::table('tbl_sipbj_review')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_review.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_review.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_review.usulan_pkt')
            ->whereNotNull('tbl_sipbj_review.spektek_pkj')
            ->whereNotNull('tbl_sipbj_review.rancangan_kontrak_pkj')
            ->whereNotNull('tbl_sipbj_review.hps_pkj');
        $data_upload_bahp = DB::table('tbl_sipbj_pemilihan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pemilihan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pemilihan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pemilihan.pelak_pml')
            ->whereNotNull('tbl_sipbj_pemilihan.monitoring');
        $data_sppbj = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.sppbj_pkt')
            ->whereNotNull('tbl_sipbj_pelaksanaan.sdpp_pkt')
            ->whereNotNull('tbl_sipbj_pelaksanaan.kntrk_pkt');
        $data_kso = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.kso_pkt');
        $data_subkon = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.subkon_pkt');
        $data_person = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.kmp_perso')
            ->whereNotNull('tbl_sipbj_pelaksanaan.perso')
            ->whereNotNull('tbl_sipbj_pelaksanaan.peralatan');
        $data_spmk = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.spmk');
        $data_addendum = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.addendum');
        $data_srh_terima = DB::table('tbl_sipbj_pelaksanaan')
            ->leftjoin('tbl_sipbj_perencanaan', 'tbl_sipbj_pelaksanaan.idrupp', '=', 'tbl_sipbj_perencanaan.idrupp')
            ->rightjoin('tbl_satker', 'tbl_sipbj_pelaksanaan.id_satker', '=', 'tbl_satker.kode')
            ->where('tbl_sipbj_perencanaan.tahun_anggaran', '=', $year)
            ->whereNotNull('tbl_sipbj_pelaksanaan.srh_terima');

        $idrupp = $data_rupp->count() ?? 0;
        $jml_pkt_ppk = $data_pkt_ppk->count() ?? 0;
        $jml_dok_perenc = $data_dok_perenc->count() ?? 0;
        $jml_dok_rpp = $data_dok_rpp->count() ?? 0;
        $jml_rev_dok_rpp = $data_rev_dok_rpp->count() ?? 0;
        $jml_upload_bahp = $data_upload_bahp->count() ?? 0;
        $jml_data_sppbj = $data_sppbj->count() ?? 0;
        $jml_data_kso = $data_kso->count() ?? 0;
        $jml_data_subkon = $data_subkon->count() ?? 0;
        $jml_data_person = $data_person->count() ?? 0;
        $jml_data_spmk = $data_spmk->count() ?? 0;
        $jml_data_addendum = $data_addendum->count() ?? 0;
        $jml_data_srh_terima = $data_srh_terima->count() ?? 0;

        $labels = ['Paket Didaftarkan', 'Penugasan PPK', 'Dokumen Perencanaan', 'Dokumen RPP', 'Review Dokumen RPP', 'Upload BAHP', 'SPPBJ & Kontrak', 'KSO', 'Sub Kontrak', 'Personil & Peralatan', 'Upload SPMK', 'Addendum Kontrak', 'Serah Terima'];
        $data = [$idrupp, $jml_pkt_ppk, $jml_dok_perenc, $jml_dok_rpp, $jml_rev_dok_rpp, $jml_upload_bahp, $jml_data_sppbj, $jml_data_kso, $jml_data_subkon, $jml_data_person, $jml_data_spmk, $jml_data_addendum, $jml_data_srh_terima];

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    ///

    public function chartPerizinanMonev()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $upt = request("upt");
        $labels = [];
        $data_sudah_monev = DB::table("tbl_api_daftar_perizinan")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_monev", "SUDAH");
        if ($upt) {
            $data_sudah_monev->where("nama_balai", $upt);
        }
        $data_sudah_monev = $data_sudah_monev->count() ?? 0;

        $data_belum_monev = DB::table("tbl_api_daftar_perizinan")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(function ($query) {
                return $query->where("status_monev", "BELUM")
                    ->orWhere('status_monev', '')
                    ->orWhereNull("status_monev");
            });

        if ($upt) {
            $data_belum_monev->where("nama_balai", $upt);
        }
        $data_belum_monev = $data_belum_monev->count() ?? 0;

        $labels = ['SUDAH', "BELUM"];
        $data = [$data_sudah_monev, $data_belum_monev];

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    public function chartPerijinanTujuan()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $labels = [];
        $data = [];
        $data_query = DB::table("tbl_api_daftar_perizinan")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("tujuan_penggunaan_airdayaair", DB::raw("COUNT(*) as total"))
            ->groupBy("tujuan_penggunaan_airdayaair")
            ->get();

        foreach ($data_query as $dtq) {
            $labels[] = $dtq->tujuan_penggunaan_airdayaair;
            $data[] = $dtq->total;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    public function chartPerijinanBatasWaktu()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $labels = ['Batas Waktu Terakhir', 'Terlambat'];

        $sk1 = DB::table("tbl_api_permohonan_izin")
            ->where(DB::raw("tanggal_surat_edit"), ">", $date_start)
            ->where(DB::raw("tanggal_surat_edit"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), "=", 0);
        if ($upt) {
            $sk1->where("nama_balai", $upt);
        }
        $sk1 = $sk1->count();

        $sk2 = DB::table("tbl_api_permohonan_izin")
            ->where(DB::raw("tanggal_surat_edit"), ">", $date_start)
            ->where(DB::raw("tanggal_surat_edit"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), ">", 7);
        if ($upt) {
            $sk2->where("nama_balai", $upt);
        }
        $sk2 = $sk2->count();

        return response()->json([
            'labels' => $labels,
            'data' => [
                'sk' => [$sk1, $sk2]
            ],
        ]);
    }

    public function chartPerizinanTerlambat()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $labels = [];
        $values = [];

        $data = DB::table("tbl_api_permohonan_izin")
            ->select("nama_balai", DB::raw("count(nama_balai) terlambat"))
            ->where(DB::raw("tanggal_surat_edit"), ">", $date_start)
            ->where(DB::raw("tanggal_surat_edit"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), ">", 7)
            ->groupBy("nama_balai")
            ->orderBy("terlambat", 'desc')
            ->limit(10)
            ->get();

        foreach ($data as $dt) {
            $labels[] = $dt->nama_balai;
            $values[] = $dt->terlambat;
        }


        return response()->json([
            'labels' => $labels,
            'data' => [
                'values' => $values
            ],
        ]);
    }
    public function chartPerizinanTerlambatFull()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $labels = [];
        $values = [];

        $data = DB::table("tbl_api_permohonan_izin")
            ->select("nama_balai", DB::raw("count(nama_balai) terlambat"))
            ->where(DB::raw("tanggal_surat_edit"), ">", $date_start)
            ->where(DB::raw("tanggal_surat_edit"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), ">", 7)
            ->groupBy("nama_balai")
            ->orderBy("terlambat", 'desc')
            ->get();

        foreach ($data as $dt) {
            $labels[] = $dt->nama_balai;
            $values[] = $dt->terlambat;
        }


        return response()->json([
            'labels' => $labels,
            'data' => [
                'values' => $values
            ],
        ]);
    }

    public function chartStatusPaketBelumLelang()
    {
        // $date_start = request('date_start');
        // $date_end = request("date_end");
        $tgl_backup = request("date");
        $year = request("year");

        $total_paket = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();
        $paket = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->get();

        $total_myc = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $total_myc_phln = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("phln", ">", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $total_myc_rmp = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("rmp", ">", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $total_syc = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $total_syc_phln = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("phln", ">", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $total_syc_rmp = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("rmp", ">", 0)
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->count();

        $table = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("kdkategori", DB::raw("count(case when kdjnskon = 0 THEN 1 END) as syc, count(case when kdjnskon>0 THEN 1 END) as myc, sum(pg) as pg, count(*) as jumlah_paket"))
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->groupBy("kdkategori")
            ->get();

        $total_pagu = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_tender", "Belum Lelang")
            ->where('tahun', $year)
            ->sum('pg');

        // $satker = DB::table("tbl_api_kontrak")
        //     ->join("eselon-2", function($join) {
        //         $join->on("tbl_api_kontrak.kdsatker", '=', 'eselon-2.id');
        //             // ->where("eselon-2.level_user", 'unit_kerja');
        //     })
        //     ->where(DB::raw("tanggal_backup"), ">", $date_start)
        //     ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
        //     ->select("kdsatker", DB::raw("count(kdsatker) as jumlah"))
        //     ->groupBy("kdsatker")
        //     ->get();

        return response()->json([
            'table' => $table,
            'total_paket' => $total_paket,
            'total_myc' => $total_myc,
            'total_myc_phln' => $total_myc_phln,
            'total_myc_rmp' => $total_myc_rmp,
            'total_syc' => $total_syc,
            'total_syc_phln' => $total_syc_phln,
            'total_syc_rmp' => $total_syc_rmp,
            'total_pagu' => $total_pagu,
            'paket' => $paket,
            // 'satker' => $satker,
        ]);
    }


    public function chartPengaduanUPT()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");

        $data = DB::table("tbl_pengaduan")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("pemilik_resiko_bws", DB::raw("COUNT(pemilik_resiko_bws) as total"))
            ->where('deleted_at', '=', NULL)
            ->groupBy("pemilik_resiko_bws")
            ->get()
            ->toArray();
        $labels = array_column($data, "pemilik_resiko_bws");
        $data = array_column($data, "total");

        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartBalaiPengaduanTerbanyak()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");

        $data = DB::table("tbl_pengaduan")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("pemilik_resiko_satker", DB::raw("COUNT(pemilik_resiko_satker) as total"))
            ->groupBy("pemilik_resiko_satker")
            ->get()
            ->toArray();
        $labels = array_column($data, "pemilik_resiko_satker");
        $data = array_column($data, "total");

        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartPengaduanKategori()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 0)
            ->select("integritas as label", DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->get()
            ->toArray();
        $btl['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 0)
            ->select("perencanaan as label", DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->get()
            ->toArray();
        $btl['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 0)
            ->select("pembebasan as label", DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->get()
            ->toArray();
        $btl['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 0)
            ->select("tender as label", DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->get()
            ->toArray();
        $btl['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 0)
            ->select("pelaksanaan as label", DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->get()
            ->toArray();
        $btl['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 0)
            ->select("pemanfaatan as label", DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->get()
            ->toArray();

        $proses['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 1)
            ->select("integritas as label", DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->get()
            ->toArray();
        $proses['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 1)
            ->select("perencanaan as label", DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->get()
            ->toArray();
        $proses['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 1)
            ->select("pembebasan as label", DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->get()
            ->toArray();
        $proses['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 1)
            ->select("tender as label", DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->get()
            ->toArray();
        $proses['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 1)
            ->select("pelaksanaan as label", DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->get()
            ->toArray();
        $proses['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 1)
            ->select("pemanfaatan as label", DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->get()
            ->toArray();

        $selesai['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 2)
            ->select("integritas as label", DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->get()
            ->toArray();
        $selesai['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 2)
            ->select("perencanaan as label", DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->get()
            ->toArray();
        $selesai['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 2)
            ->select("pembebasan as label", DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->get()
            ->toArray();
        $selesai['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 2)
            ->select("tender as label", DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->get()
            ->toArray();
        $selesai['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 2)
            ->select("pelaksanaan as label", DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->get()
            ->toArray();
        $selesai['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 2)
            ->select("pemanfaatan as label", DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->get()
            ->toArray();

        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }

        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function schartPengaduan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $btl = [];
        $proses = [];
        $selesai = [];


        $btl['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 0)
            ->select(DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->pluck('total')
            ->toArray();
        $btl['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 0)
            ->select(DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->pluck('total')
            ->toArray();
        $btl['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 0)
            ->select(DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->pluck('total')
            ->toArray();
        $btl['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 0)
            ->select(DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->pluck('total')
            ->toArray();
        $btl['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 0)
            ->select(DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->pluck('total')
            ->toArray();
        $btl['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 0)
            ->select(DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->pluck('total')
            ->toArray();
        $proses['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 1)
            ->select(DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->pluck('total')
            ->toArray();
        $proses['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 1)
            ->select(DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->pluck('total')
            ->toArray();
        $proses['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 1)
            ->select(DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->pluck('total')
            ->toArray();
        $proses['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 1)
            ->select(DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->pluck('total')
            ->toArray();
        $proses['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 1)
            ->select(DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->pluck('total')
            ->toArray();
        $proses['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 1)
            ->select(DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->pluck('total')
            ->toArray();
        $selesai['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("integritas")
            ->where("status", 2)
            ->select(DB::raw("COUNT(integritas) as total"))
            ->groupBy("integritas")
            ->pluck('total')
            ->toArray();
        $selesai['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("perencanaan")
            ->where("status", 2)
            ->select(DB::raw("COUNT(perencanaan) as total"))
            ->groupBy("perencanaan")
            ->pluck('total')
            ->toArray();
        $selesai['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pembebasan")
            ->where("status", 2)
            ->select(DB::raw("COUNT(pembebasan) as total"))
            ->groupBy("pembebasan")
            ->pluck('total')
            ->toArray();
        $selesai['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("tender")
            ->where("status", 2)
            ->select(DB::raw("COUNT(tender) as total"))
            ->groupBy("tender")
            ->pluck('total')
            ->toArray();
        $selesai['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pelaksanaan")
            ->where("status", 2)
            ->select(DB::raw("COUNT(pelaksanaan) as total"))
            ->groupBy("pelaksanaan")
            ->pluck('total')
            ->toArray();
        $selesai['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("dibuat_pada"), ">", $date_start)
            ->where(DB::raw("dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("pemanfaatan")
            ->where("status", 2)
            ->select(DB::raw("COUNT(pemanfaatan) as total"))
            ->groupBy("pemanfaatan")
            ->pluck('total')
            ->toArray();



        $labels = ['Integritas', 'Perencanaan', 'Pembebasan', 'Tender', 'Pelaksanaan', 'Pemanfaatan'];

        $btl_total_integritas = array_sum($btl['integritas']);
        $btl_total_perencanaan = array_sum($btl['perencanaan']);
        $btl_total_pembebasan = array_sum($btl['pembebasan']);
        $btl_total_tender = array_sum($btl['tender']);
        $btl_total_pelaksanaan = array_sum($btl['pelaksanaan']);
        $btl_total_pemanfaatan = array_sum($btl['pemanfaatan']);

        $proses_total_integritas = array_sum($proses['integritas']);
        $proses_total_perencanaan = array_sum($proses['perencanaan']);
        $proses_total_pembebasan = array_sum($proses['pembebasan']);
        $proses_total_tender = array_sum($proses['tender']);
        $proses_total_pelaksanaan = array_sum($proses['pelaksanaan']);
        $proses_total_pemanfaatan = array_sum($proses['pemanfaatan']);

        $selesai_total_integritas = array_sum($selesai['integritas']);
        $selesai_total_perencanaan = array_sum($selesai['perencanaan']);
        $selesai_total_pembebasan = array_sum($selesai['pembebasan']);
        $selesai_total_tender = array_sum($selesai['tender']);
        $selesai_total_pelaksanaan = array_sum($selesai['pelaksanaan']);
        $selesai_total_pemanfaatan = array_sum($selesai['pemanfaatan']);
        // return dd($proses_total_tender);

        $data['btl']['integritas'] = $btl_total_integritas;
        $data['btl']['integritas'] = $data['btl']['integritas'] ?? 0;
        $data['btl']['perencanaan'] = $btl_total_perencanaan;
        $data['btl']['perencanaan'] = $data['btl']['perencanaan'] ?? 0;
        $data['btl']['pembebasan'] = $btl_total_pembebasan;
        $data['btl']['pembahasan'] = $data['btl']['pembebasan'] ?? 0;
        $data['btl']['tender'] = $btl_total_tender;
        $data['btl']['tender'] = $data['btl']['tender'] ?? 0;
        $data['btl']['pelaksanaan'] = $btl_total_pelaksanaan;
        $data['btl']['pelaksanaan'] = $data['btl']['pelaksanaan'] ?? 0;
        $data['btl']['pemanfaatan'] = $btl_total_pemanfaatan;
        $data['btl']['pemanfaatan'] = $data['btl']['pemanfaatan'] ?? 0;

        $data['proses']['integritas'] = $proses_total_integritas;
        $data['proses']['integritas'] = $data['proses']['integritas'] ?? 0;
        $data['proses']['perencanaan'] = $proses_total_perencanaan;
        $data['proses']['perencanaan'] = $data['proses']['perencanaan'] ?? 0;
        $data['proses']['pembebasan'] = $proses_total_pembebasan;
        $data['proses']['pembahasan'] = $data['proses']['pembebasan'] ?? 0;
        $data['proses']['tender'] = $proses_total_tender;
        $data['proses']['tender'] = $data['proses']['tender'] ?? 0;
        $data['proses']['pelaksanaan'] = $proses_total_pelaksanaan;
        $data['proses']['pelaksanaan'] = $data['proses']['pelaksanaan'] ?? 0;
        $data['proses']['pemanfaatan'] = $proses_total_pemanfaatan;
        $data['proses']['pemanfaatan'] = $data['proses']['pemanfaatan'] ?? 0;

        $data['selesai']['integritas'] = $selesai_total_integritas;
        $data['selesai']['integritas'] = $data['selesai']['integritas'] ?? 0;
        $data['selesai']['perencanaan'] = $selesai_total_perencanaan;
        $data['selesai']['perencanaan'] = $data['selesai']['perencanaan'] ?? 0;
        $data['selesai']['pembebasan'] = $selesai_total_pembebasan;
        $data['selesai']['pembahasan'] = $data['selesai']['pembebasan'] ?? 0;
        $data['selesai']['tender'] = $selesai_total_tender;
        $data['selesai']['tender'] = $data['selesai']['tender'] ?? 0;
        $data['selesai']['pelaksanaan'] = $selesai_total_pelaksanaan;
        $data['selesai']['pelaksanaan'] = $data['selesai']['pelaksanaan'] ?? 0;
        $data['selesai']['pemanfaatan'] = $selesai_total_pemanfaatan;
        $data['selesai']['pemanfaatan'] = $data['selesai']['pemanfaatan'] ?? 0;


        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    // seccond kategori
    public function chartIntegritas()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.integritas")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
            ->groupBy("tbl_pengaduan_kategori.integritas")
            ->get()
            ->toArray();

        $proses['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.integritas")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
            ->groupBy("tbl_pengaduan_kategori.integritas")
            ->get()
            ->toArray();



        $selesai['integritas'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.integritas")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
            ->groupBy("tbl_pengaduan_kategori.integritas")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['integritas'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.integritas")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
                ->groupBy("tbl_pengaduan_kategori.integritas")
                ->get()
                ->toArray();

            $proses['integritas'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.integritas")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
                ->groupBy("tbl_pengaduan_kategori.integritas")
                ->get()
                ->toArray();



            $selesai['integritas'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.integritas")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.integritas as label", DB::raw("COUNT(tbl_pengaduan_kategori.integritas) as total"))
                ->groupBy("tbl_pengaduan_kategori.integritas")
                ->get()
                ->toArray();
        }

        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartPerencanaan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.perencanaan")
            ->get()
            ->toArray();

        $proses['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.perencanaan")
            ->get()
            ->toArray();



        $selesai['perencanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.perencanaan")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['perencanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.perencanaan")
                ->get()
                ->toArray();

            $proses['perencanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.perencanaan")
                ->get()
                ->toArray();



            $selesai['perencanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.perencanaan")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.perencanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.perencanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.perencanaan")
                ->get()
                ->toArray();
        }
        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartPembebasan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pembebasan")
            ->get()
            ->toArray();

        $proses['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pembebasan")
            ->get()
            ->toArray();



        $selesai['pembebasan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pembebasan")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['pembebasan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pembebasan")
                ->get()
                ->toArray();

            $proses['pembebasan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pembebasan")
                ->get()
                ->toArray();



            $selesai['pembebasan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pembebasan")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.pembebasan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pembebasan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pembebasan")
                ->get()
                ->toArray();
        }
        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartTender()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.tender")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
            ->groupBy("tbl_pengaduan_kategori.tender")
            ->get()
            ->toArray();

        $proses['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.tender")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
            ->groupBy("tbl_pengaduan_kategori.tender")
            ->get()
            ->toArray();



        $selesai['tender'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.tender")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
            ->groupBy("tbl_pengaduan_kategori.tender")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['tender'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.tender")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
                ->groupBy("tbl_pengaduan_kategori.tender")
                ->get()
                ->toArray();

            $proses['tender'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.tender")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
                ->groupBy("tbl_pengaduan_kategori.tender")
                ->get()
                ->toArray();



            $selesai['tender'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.tender")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.tender as label", DB::raw("COUNT(tbl_pengaduan_kategori.tender) as total"))
                ->groupBy("tbl_pengaduan_kategori.tender")
                ->get()
                ->toArray();
        }
        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartPelaksanaan()
    {

        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
            ->get()
            ->toArray();

        $proses['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
            ->get()
            ->toArray();



        $selesai['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
                ->get()
                ->toArray();

            $proses['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
                ->get()
                ->toArray();



            $selesai['pelaksanaan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pelaksanaan")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.pelaksanaan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pelaksanaan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pelaksanaan")
                ->get()
                ->toArray();
        }

        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }

    public function chartPemanfaatan()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $upt = request("upt");
        $btl = [];
        $proses = [];
        $selesai = [];

        $btl['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 0)
            ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
            ->get()
            ->toArray();

        $proses['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->where("tbl_pengaduan_kategori.status", 1)
            ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
            ->get()
            ->toArray();



        $selesai['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
            ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
            ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
            ->where("tbl_pengaduan_kategori.status", 2)
            ->where("tbl_pengaduan_kategori.deleted_at", NULL)
            ->where("tbl_pengaduan.deleted_at", NULL)
            ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
            ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
            ->get()
            ->toArray();


        if ($upt) {
            $btl['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 0)
                ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
                ->get()
                ->toArray();

            $proses['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where("tbl_pengaduan_kategori.status", 1)
                ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
                ->get()
                ->toArray();



            $selesai['pemanfaatan'] = DB::table("tbl_pengaduan_kategori")
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), ">", $date_start)
                ->where(DB::raw("tbl_pengaduan_kategori.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                ->join('tbl_pengaduan', 'tbl_pengaduan_kategori.id_surat', 'tbl_pengaduan.id_surat')
                ->whereNotNull("tbl_pengaduan_kategori.pemanfaatan")
                ->where("tbl_pengaduan_kategori.deleted_at", NULL)
                ->where("tbl_pengaduan.deleted_at", NULL)
                ->where('tbl_pengaduan.pemilik_resiko_satker', $upt)
                ->where("tbl_pengaduan_kategori.status", 2)
                ->select("tbl_pengaduan_kategori.pemanfaatan as label", DB::raw("COUNT(tbl_pengaduan_kategori.pemanfaatan) as total"))
                ->groupBy("tbl_pengaduan_kategori.pemanfaatan")
                ->get()
                ->toArray();
        }


        $labels = [];
        foreach ($btl as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($proses as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }
        foreach ($selesai as $b) {
            foreach ($b as $v) {
                $labels[] = $v->label;
            }
        }

        $labels = array_unique($labels);

        $data = [];
        foreach ($labels as $key => $lbl) {
            foreach ($btl as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['btl'][$key] = $v->total;
                    }
                }
            }
            $data['btl'][$key] = $data['btl'][$key] ?? 0;

            foreach ($proses as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['proses'][$key] = $v->total;
                    }
                }
            }
            $data['proses'][$key] = $data['proses'][$key] ?? 0;

            foreach ($selesai as $b) {
                foreach ($b as $v) {
                    if ($v->label == $lbl) {
                        $data['selesai'][$key] = $v->total;
                    }
                }
            }
            $data['selesai'][$key] = $data['selesai'][$key] ?? 0;
        }
        return response()->json([
            "labels" => $labels,
            "data" => $data
        ]);
    }



    public function chartStatusSiptl()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $labels = [];
        $data = [];

        $data_table = DB::table("tbl_pemantauan_bpk")
            ->where('created_at', ">", $date_start)
            ->where('created_at', "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("status_siptl as label", DB::raw("count(status_siptl) as total"))
            ->groupBy("status_siptl")
            ->get();

        foreach ($data_table as $dt) {
            $labels[] = $dt->label;
            $data[] = $dt->total;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function chartStatusVerifikasi()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $labels = [];
        $data = [];

        $data_table = DB::table("tbl_pemantauan_bpk")
            ->where('created_at', ">", $date_start)
            ->where('created_at', "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("status_verifikasi as label", DB::raw("count(status_verifikasi) as total"))
            ->groupBy("status_verifikasi")
            ->get();

        foreach ($data_table as $dt) {
            $labels[] = $dt->label;
            $data[] = $dt->total;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function chartPersentaseItjen()
    {
        $date_start = request("date_start");
        $date_end = request("date_end");
        $labels = [];
        $data = [];
        $total = 0;

        $data_table = DB::table("tbl_pemantauan_bpk")
            ->where('created_at', ">", $date_start)
            ->where('created_at', "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("status_verifikasi as label", DB::raw("count(status_verifikasi) as total"))
            ->groupBy("status_verifikasi")
            ->get();

        foreach ($data_table as $dt) {
            $labels[] = $dt->label;
            $total = $total + $dt->total;
        }

        foreach ($data_table as $dt) {
            $data[] = ($dt->total / $total) * 100;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }


    public function tablePerijinan()
    {
        $date_start = request('date_start');
        $date_end = request('date_end');
        $upt = request('upt');

        $queryBuilder = DB::table('tbl_api_permohonan_izin')
            ->where(DB::raw("tanggal_surat_edit"), ">", $date_start)
            ->where(DB::raw("tanggal_surat_edit"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), ">", 5)
            // ->where(function($query) {
            //     return $query->where(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), ">", 5)
            //         ->orWhere(DB::raw("DATEDIFF(NOW(), tanggal_surat_edit)"), "=", 0);
            // })
            // ->select('nama_perusahaan', 'nama_balai', DB::raw("DATEDIFF(now(), tanggal_surat_edit) as VERIFIKASI"), DB::raw("DATEDIFF(now(), tanggal_surat_edit) as SK_MENTERI"))
            ->select('nama_perusahaan', 'tanggal_surat_edit', 'status', 'nama_balai', 'sumber_air', DB::raw("DATEDIFF(now(), tanggal_surat_edit) as SK_MENTERI"), 'nomor_registrasi', 'jenis_permohonan', 'tujuan_penggunaan_airdayaair', 'tujuan_penggunaan_sumberair');
        if ($upt) {
            $queryBuilder->where("nama_balai", $upt);
        }

        return DataTables::queryBuilder($queryBuilder)
            // ->editColumn("VERIFIKASI", function($data) {
            //     if($data->VERIFIKASI == 3) {
            //         return "1 Hari Lagi";
            //     } else if($data->VERIFIKASI == 4) {
            //         return "Hari ini Batas Akhir";
            //     } else if($data->VERIFIKASI > 4) {
            //         return "Terlambat ".$data->VERIFIKASI." Hari";
            //     } else {
            //         return "Belum Batas Akhir";
            //     }
            // })
            ->editColumn("SK_MENTERI", function ($data) {
                // if($data->status == "Sudah Dikirim") {
                //     return "Sudah Dikirim";
                // }

                if ($data->SK_MENTERI == 6) {
                    return "1 Hari Lagi";
                } else if ($data->SK_MENTERI == 7) {
                    return "Hari ini Batas Akhir";
                } else if ($data->SK_MENTERI > 7) {
                    return "Terlambat " . ($data->SK_MENTERI - 8) . " Hari Kalender";
                } else {
                    return "Belum Batas Akhir";
                }
            })
            ->toJson();
    }

    public function changeDate()
    {
        $type = request("type");
        $year = request('year');
        $table = "";
        $column_backup = "";

        switch ($type) {
            case 'kontrak':
                $table = "tbl_api_kontrak";
                $column_backup = "tgl_backup";
                break;
            case 'profiles':
                $table = "tbl_api_profiles";
                $column_backup = "tanggal_backup";
                break;

            default:
                return response()->json([
                    'status' => 0,
                    'message' => "Type tidak diketahui"
                ]);
                break;
        }

        $dates = DB::table($table);

        if ($type == "kontrak") {
            $dates->where("tahun", $year);
        } else {
            $dates->where('thang',  "$year");
        }

        $dates->select("$column_backup as tgl_backup")
            ->groupBy($column_backup);

        if ($dates->count() == 0) {
            return response()->json([
                'status' => 1,
                'data' => [
                    ['tgl_backup' => 'Tidak Ada']
                ]
            ]);
        }
        return response()->json([
            'status' => 1,
            'data' => $dates->orderBy("id", 'desc')->get()
        ]);
    }

    public function tableBalaiPengaduanTerbanyak()
    {
        // $date_start = request('date_start');
        // $date_end = request('date_end');



        // // $queryBuilder = DB::table('tbl_pengaduan')
        // //     ->join('tbl_pembahasan','tbl_pengaduan.id_surat','=','tbl_pembahasan.id_surat')
        // //     ->where(DB::raw("tbl_pengaduan.diubah_pada"), ">", $date_start)
        // //     ->where(DB::raw("tbl_pengaduan.diubah_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
        // //     ->where(function($query) {
        // //         return $query->where(DB::raw("DATEDIFF(NOW(), tbl_pengaduan.diubah_pada)"), ">", 7)
        // //             ->orWhere(DB::raw("DATEDIFF(NOW(), tbl_pengaduan.diubah_pada)"), "=", 0);
        // //     })
        // // ->select(DB::raw('count(tbl_pembahasan.file_memo) as jumlah','tbl_pengaduan.pemilik_resiko_bws as bws','tbl_pengaduan.pemilik_resiko_satker as satker'));



        // return DataTables::queryBuilder(

        //     // ->select('tbl_pengaduan.pemilik_resiko_bws as bws','tbl_pengaduan.pemilik_resiko_satker as satker',DB::raw('count(tbl_pembahasan.file_memo) as jumlah'))
        //     // ->groupBy('tbl_pengaduan.pemilik_resiko_bws')
        //     // ->leftjoin('tbl_pembahasan','tbl_pengaduan.id_surat','=','tbl_pembahasan.id_surat')
        //     // ->where(DB::raw("tbl_pengaduan.dibuat_pada"), ">", $date_start)
        //     // ->where(DB::raw("tbl_pengaduan.dibuat_pada"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
        //     // ->where(function($query) {
        //     //     return $query->where(DB::raw("DATEDIFF(NOW(), tbl_pengaduan.dibuat_pada)"), ">", 7)
        //     //         ->orWhere(DB::raw("DATEDIFF(NOW(), tbl_pengaduan.dibuat_pada)"), "=", 0);
        //     // })
        //     // ->where('tbl_pengaduan.pemilik_resiko_bws','!=','NULL')
        //     // ->where('tbl_pengaduan.pemilik_resiko_satker','!=','NULL')
        //     )->make(true);

    }

    public function tableRekapPengaduanBalai()
    {
        $date_start = request('date_start');
        $date_end = request('date_end');
        $upt = request('upt');

        // $queryBuilder = DB::table('tbl_surat')
        //     ->join('tbl_pengaduan_kategori','tbl_pengaduan_kategori.id_surat','=','tbl_surat.id')
        //     ->join('tbl_pembahasan','tbl_pembahasan.id_surat','=','tbl_surat.id')
        //     ->join('tbl_pengaduan','tbl_pengaduan.id_surat','=','tbl_surat.id')
        //     ->select('tbl_surat.identitas_pelapor','tbl_surat.perihal','tbl_surat.id','tbl_pengaduan_kategori.integritas','tbl_pembahasan.poin_pengaduan')
        //     ->orderBy('tbl_pengaduan_kategori.integritas');
        // $queryBuilder = DB::table('tbl_surat')
        //                 ->select("tbl_surat.*",
        //                     \DB::raw("(SELECT tbl_pengaduan_kategori.integritas FROM tbl_pengaduan_kategori
        //                                WHERE tbl_pengaduan_kategori.id_surat = tbl_surat.id) as integrity"),
        //                     \DB::raw("(SELECT tbl_pembahasan.poin_pengaduan FROM tbl_pembahasan
        //                                WHERE tbl_pembahasan.id_surat = tbl_surat.id) as poinpengadu"),
        //                     \DB::raw("(SELECT tbl_pengaduan.pemilik_resiko_bws FROM tbl_pengaduan
        //                                WHERE tbl_pengaduan.id_surat = tbl_surat.id) as pemilikresiko"))
        //                     ->get();
        // if($upt) {
        //     $queryBuilder->where("pemilikresiko", $upt)->get();
        // }



        // return DataTables::of(
        //     DB::table('tbl_surat')
        //     ->select('tbl_surat.identitas_pelapor as identitas_pelapor','tbl_surat.perihal as perihal','tbl_surat.id as id','tbl_pengaduan_kategori.integritas as integritas','tbl_pembahasan.poin_pengaduan as poin_pengaduan')
        //     ->join('tbl_pengaduan_kategori','tbl_pengaduan_kategori.id_surat','=','tbl_surat.id')
        //     ->join('tbl_pembahasan','tbl_pembahasan.id_surat','=','tbl_surat.id')
        //     ->join('tbl_pengaduan','tbl_pengaduan.id_surat','=','tbl_surat.id')
        //     ->orderBy('tbl_pengaduan_kategori.integritas')->latest())
        //     ->addIndexColumn()
        //     ->make(true);

        if ($upt) {
            return DataTables::of(
                DB::table('tbl_surat')
                    ->select('tbl_surat.identitas_pelapor as identitas_pelapor', 'tbl_surat.perihal as perihal', 'tbl_surat.id as id', 'tbl_pengaduan_kategori.integritas as integritas', 'tbl_pembahasan.poin_pengaduan as poin_pengaduan', 'tbl_pengaduan.pemilik_resiko_bws')
                    ->leftjoin('tbl_pengaduan_kategori', function ($integritas) {
                        $integritas->on('tbl_surat.id', '=', 'tbl_pengaduan_kategori.id_surat')
                            ->whereRaw('tbl_pengaduan_kategori.id IN (select MAX(a2.id) from tbl_pengaduan_kategori as a2 join tbl_surat as u2 on u2.id = a2.id_surat group by u2.id)');
                    })
                    ->leftjoin('tbl_pembahasan', function ($poin_pengaduan) {
                        $poin_pengaduan->on('tbl_surat.id', '=', 'tbl_pembahasan.id_surat')
                            ->whereRaw('tbl_pembahasan.id IN (select MAX(s2.id) from tbl_pembahasan as s2 join tbl_surat as u2 on u2.id = s2.id_surat group by u2.id)');
                    })
                    ->leftjoin('tbl_pengaduan', function ($pemilik_resiko) {
                        $pemilik_resiko->on('tbl_surat.id', '=', 'tbl_pengaduan.id_surat')
                            ->whereRaw('tbl_pengaduan.id IN (select MAX(d2.id) from tbl_pengaduan as d2 join tbl_surat as u2 on u2.id = d2.id_surat group by u2.id)');
                    })
                    ->where("tbl_pengaduan.pemilik_resiko_satker", request('upt'))
                    ->where(DB::raw("tbl_surat.tgl_surat"), ">", $date_start)
                    ->where(DB::raw("tbl_surat.tgl_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                    ->where(function ($query) {
                        return $query->where(DB::raw("DATEDIFF(NOW(), tbl_surat.tgl_surat)"), ">", 7)
                            ->orWhere(DB::raw("DATEDIFF(NOW(), tbl_surat.tgl_surat)"), "=", 0);
                    })
            )
                ->make(true);
        } else {
            return DataTables::of(
                DB::table('tbl_surat')
                    ->select('tbl_surat.identitas_pelapor as identitas_pelapor', 'tbl_surat.perihal as perihal', 'tbl_surat.id as id', 'tbl_pengaduan_kategori.integritas as integritas', 'tbl_pembahasan.poin_pengaduan as poin_pengaduan')
                    ->leftjoin('tbl_pengaduan_kategori', function ($integritas) {
                        $integritas->on('tbl_surat.id', '=', 'tbl_pengaduan_kategori.id_surat')
                            ->whereRaw('tbl_pengaduan_kategori.id IN (select MAX(a2.id) from tbl_pengaduan_kategori as a2 join tbl_surat as u2 on u2.id = a2.id_surat group by u2.id)')
                            ->whereRaw('tbl_pengaduan_kategori.deleted_at IS NULL');
                    })
                    ->leftjoin('tbl_pembahasan', function ($poin_pengaduan) {
                        $poin_pengaduan->on('tbl_surat.id', '=', 'tbl_pembahasan.id_surat')
                            ->whereRaw('tbl_pembahasan.id IN (select MAX(s2.id) from tbl_pembahasan as s2 join tbl_surat as u2 on u2.id = s2.id_surat group by u2.id)')
                            ->whereRaw('tbl_pembahasan.deleted_at IS NULL');
                    })
                    ->leftjoin('tbl_pengaduan', function ($pemilik_resiko) {
                        $pemilik_resiko->on('tbl_surat.id', '=', 'tbl_pengaduan.id_surat')
                            ->whereRaw('tbl_pengaduan.id IN (select MAX(d2.id) from tbl_pengaduan as d2 join tbl_surat as u2 on u2.id = d2.id_surat group by u2.id) ')
                            ->whereRaw('tbl_pengaduan.deleted_at IS NULL');
                    })
                    ->where(DB::raw("tbl_surat.tgl_surat"), ">=", $date_start)
                    ->where(DB::raw("tbl_surat.tgl_surat"), "<=", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
                    ->where('tbl_surat.deleted_at', NULL)
            )->make(true);
        }
    }

    public function profile()
    {
        $file = 'profile';
        $data = $this->data;

        return view($file, compact('data'));
    }

    public function update_account(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name.*'   => 'required',
        ])->setAttributeNames([
            'name.*'   => 'Name',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = User::findOrfail(Auth::user()->id);

        $data->fill($request->all());

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data has been changed successfully.'
        );

        return json_encode($response);
    }

    public function update_security(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_password'   => 'required',
            'new_password'   => 'required|min:6',
            'new_password_confirm'   => 'required|same:new_password',
        ])->setAttributeNames([
            'current_password'   => 'Password',
            'new_password'   => 'New Password',
            'new_password_confirm'   => 'Confirm New Password',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = User::findOrfail(Auth::user()->id);

        if (!Hash::check($request->current_password, $data->password)) {
            $response = [
                'status'    => false,
                'message'   => 'Your password does not match'
            ];
            return json_encode($response);
        }

        if (Hash::check($request->new_password, $data->password)) {
            $response = [
                'status'    => false,
                'message'   => 'Your new password cannot be the same as the old password.'
            ];
            return json_encode($response);
        }

        $data->password = Hash::make($request->new_password);

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Password has been changed successfully.'
        );

        return json_encode($response);
    }

    public function chartmrbaru()
    {
        $date_start = request('date_start');
        $date_end = request("date_end");
        $data = [];
        $data_full = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("mr_status")
            ->whereNotNull("level")
            ->select(DB::raw("level, mr_status, count(mr_status) as jumlah"))
            ->groupBy("mr_status")
            ->groupBy("level")
            ->get();

        $levels = DB::table("tbl_komitmen_mr")
            ->where(DB::raw("date(dibuat_pada)"), ">", $date_start)
            ->where(DB::raw("date(dibuat_pada)"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->whereNotNull("mr_status")
            ->select("level")
            ->groupBy("level")
            ->get();
        foreach ($levels as $level) {
            $data[$level->level]['status_0'] = 0;
            $data[$level->level]['status_1'] = 0;
            $data[$level->level]['status_2'] = 0;
        }

        foreach ($data_full as $df) {
            $data[$df->level]['status_' . $df->mr_status] = $df->jumlah;
        }

        return response()->json($data);
    }
}
