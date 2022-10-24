<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\MYController;
use DB;
use Validator;

//MODEL//
use App\Model\Pengaturan\ActiveYearModel;
use App\Model\Master\ProvinsiModel;
use App\Model\Master\KotaModel;
use App\Model\Formulir\Form1AModel;
use App\Model\Formulir\Form1BModel;
use App\Model\Master\MapModel;

use App\Helpers\AppHelper;
use App\User;
use DataTables;

class HomeController extends MYController {
    public function index() {
        if(request()->ajax()) {
            $func = request("function");
            return $this->$func();
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
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();
        $data->upt_pengaduan = DB::table("tbl_pengaduan")
            ->select("pemilik_resiko_bws")
            ->groupBy("pemilik_resiko_bws")
            ->get();
        $data->upt_permohonan_izin = DB::table("tbl_api_permohonan_izin")
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();

        $data->javascript = "home_dashboard";
        $data->page->file_js = "home_dashboard";
        
        $file = 'home_index';
        return view($file, compact('data'));
    }

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
                'name' => 'Persiapan Terkontrak',
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
        $date = request("date");
        $oneyear = \Carbon\Carbon::parse($date)->subYears(1)->format("Y-m-d");
        // $oneyear = date('Y-m-d', $date);
        // dd($date, $oneyear);

        

        $start    = new \DateTime($oneyear);
        $start->modify('first day of this month');
        $end      = new \DateTime($date);
        $end->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        $data->categories = array();
        foreach ($period as $key => $dt) {
            $select_date = \Carbon\Carbon::parse($date);
            $last_month = \Carbon\Carbon::parse($dt->format("Y-m-d"))->endOfMonth();
            $bulan_backup = AppHelper::getMonthIndo($last_month->format('m'));
            $tgl_backup = $last_month->format("d") . " ". $bulan_backup . " " . $last_month->format("Y") . " ; " . "16:00 WIB";
            if($last_month->format("Y-m") == $select_date->format("Y-m")) {
                $bulan_backup = AppHelper::getMonthIndo($select_date->format('m'));
                
                // Cek 16:00
                $tgl_backup = $select_date->format("d") . " ". $bulan_backup . " " . $select_date->format("Y") . " ; ";
                $data_count_16 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."16:00 WIB"."%")->count();
                $data_count_12 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."12:00 WIB"."%")->count();
                $data_count_8 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."08:00 WIB"."%")->count();
                if($data_count_16 > 0) {
                    $tgl_backup = $tgl_backup . "16:00 WIB";
                } elseif($data_count_12 > 0) {
                    $tgl_backup = $tgl_backup . "12:00 WIB";
                } else {
                    $tgl_backup = $tgl_backup . "08:00 WIB";
                }

                // Selector
                $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Terkontrak')->first();
                $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Persiapan Terkontrak')->first();
                $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Proses Lelang')->first();
                $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Belum Lelang')->first();
                $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%$tgl_backup%")->where('status_tender', 'Gagal Lelang')->first();
                
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
            } else {
                $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Terkontrak")->first();
                $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Persiapan Terkontrak")->first();
                $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Proses Lelang")->first();
                $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Belum Lelang")->first();
                $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Gagal Lelang")->first();
    
                array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));
    
                array_push($data->series[0]['data'], ($terkontrak ? floatval($terkontrak->jumlah) : 0));
                array_push($data->series[0]['periode'], $dt->format('Y-m'));
                array_push($data->series[1]['data'], ($persiapan ? floatval($persiapan->jumlah) : 0));
                array_push($data->series[1]['periode'], $dt->format('Y-m'));
                array_push($data->series[2]['data'], ($proses ? floatval($proses->jumlah) : 0));
                array_push($data->series[2]['periode'], $dt->format('Y-m'));
                array_push($data->series[3]['data'], ($belum ? floatval($belum->jumlah) : 0));
                array_push($data->series[3]['periode'], $dt->format('Y-m'));
                array_push($data->series[4]['data'], ($gagal ? floatval($gagal->jumlah) : 0));
                array_push($data->series[4]['periode'], $dt->format('Y-m'));
            }
        }

        return response()->json($data);
    }
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
                'name' => 'Persiapan Terkontrak',
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

        $date = request("date");
        $oneyear = \Carbon\Carbon::parse($date)->subYears(1)->format("Y-m-d");

        $start    = new \DateTime($oneyear);
        $start->modify('first day of this month');
        $end      = new \DateTime($date);
        $end->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        $data->categories = array();
        foreach ($period as $key => $dt) {
            $select_date = \Carbon\Carbon::parse($date);
            $last_month = \Carbon\Carbon::parse($dt->format("Y-m-d"))->endOfMonth();
            $bulan_backup = AppHelper::getMonthIndo($last_month->format('m'));
            $tgl_backup = $last_month->format("d") . " ". $bulan_backup . " " . $last_month->format("Y") . " ; " . "16:00 WIB";

            if($last_month->format("Y-m") == $select_date->format("Y-m")) {
                $bulan_backup = AppHelper::getMonthIndo($select_date->format('m'));
                
                // Cek 16:00
                $tgl_backup = $select_date->format("d") . " ". $bulan_backup . " " . $select_date->format("Y") . " ; ";
                $data_count_16 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."16:00 WIB"."%")->count();
                $data_count_12 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."12:00 WIB"."%")->count();
                $data_count_8 = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup."08:00 WIB"."%")->count();
                if($data_count_16 > 0) {
                    $tgl_backup = $tgl_backup . "16:00 WIB";
                } elseif($data_count_12 > 0) {
                    $tgl_backup = $tgl_backup . "12:00 WIB";
                } else {
                    $tgl_backup = $tgl_backup . "08:00 WIB";
                }

                // Selector
                $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Terkontrak")->first();
                $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Persiapan Terkontrak")->first();
                $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Proses Lelang")->first();
                $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Belum Lelang")->first();
                $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Gagal Lelang")->first();

                array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

                $total = (($terkontrak ? floatval($terkontrak->jumlah) : 0) + ($persiapan ? floatval($persiapan->jumlah) : 0) + ($proses ? floatval($proses->jumlah) : 0) + ($belum ? floatval($belum->jumlah) : 0)) ?: 1;
                $persentase_terkontrak = round(($terkontrak ? floatval($terkontrak->jumlah) : 0) / $total * 100, 2);
                $persentase_persiapan = round(($persiapan ? floatval($persiapan->jumlah) : 0) / $total * 100,2);
                $persentase_proses = round(($proses ? floatval($proses->jumlah) : 0) / $total * 100,2);
                $persentase_belum = round(($belum ? floatval($belum->jumlah) : 0) / $total * 100,2);
                $persentase_gagal = round(($gagal ? floatval($gagal->jumlah) : 0) / $total * 100,2);

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
            } else {
                $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Terkontrak")->first();
                $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Persiapan Terkontrak")->first();
                $proses = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Proses Lelang")->first();
                $belum = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Belum Lelang")->first();
                $gagal = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tgl_backup', 'like', "%".$tgl_backup ."%")->where("status_tender", "Gagal Lelang")->first();

                array_push($data->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

                $total = (($terkontrak ? floatval($terkontrak->jumlah) : 0) + ($persiapan ? floatval($persiapan->jumlah) : 0) + ($proses ? floatval($proses->jumlah) : 0) + ($belum ? floatval($belum->jumlah) : 0)) ?: 1;
                $persentase_terkontrak = round(($terkontrak ? floatval($terkontrak->jumlah) : 0) / $total * 100, 2);
                $persentase_persiapan = round(($persiapan ? floatval($persiapan->jumlah) : 0) / $total * 100,2);
                $persentase_proses = round(($proses ? floatval($proses->jumlah) : 0) / $total * 100,2);
                $persentase_belum = round(($belum ? floatval($belum->jumlah) : 0) / $total * 100,2);
                $persentase_gagal = round(($gagal ? floatval($gagal->jumlah) : 0) / $total * 100,2);

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
            }
        }

        // Selector
        // array_push($data->categories, $date);

        // $terkontrak = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Terkontrak')->first();
        // $persiapan = DB::table('tbl_api_kontrak')->select(DB::raw('count(*) as jumlah'))->where('tanggal_backup', 'like', "%$date%")->where('status_tender', 'Persiapan Terkontrak')->first();
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

        $kontraktual1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->count();
        $kontraktual1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->sum('pg')/1000,0);
        $kontraktual2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->count();
        $kontraktual2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->sum('pg')/1000,0);
        
        $terkontrak1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Terkontrak')->count();
        $terkontrak1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Terkontrak')->sum('pg')/1000,0);
        $terkontrak2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Terkontrak')->count();
        $terkontrak2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Terkontrak')->sum('pg')/1000,0);

        $persiapan_terkontrak1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', "Persiapan Terkontrak")->count();
        $persiapan_terkontrak1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', "Persiapan Terkontrak")->sum('pg')/1000,0);
        $persiapan_terkontrak2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', "Persiapan Terkontrak")->count();
        $persiapan_terkontrak2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', "Persiapan Terkontrak")->sum('pg')/1000,0);

        $proses_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("status_tender", "Proses Lelang")->count();
        $proses_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where("status_tender", "Proses Lelang")->sum('pg')/1000,0);
        $proses_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("status_tender", "Proses Lelang")->count();
        $proses_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where("status_tender", "Proses Lelang")->sum('pg')/1000,0);

        $belum_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Belum Lelang')->count();
        $belum_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Belum Lelang')->sum('pg')/1000,0);
        $belum_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Belum Lelang')->count();
        $belum_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Belum Lelang')->sum('pg')/1000,0);

        $gagal_lelang1['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Gagal Lelang')->count();
        $gagal_lelang1['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date1%")->where('status_tender', 'Gagal Lelang')->sum('pg')/1000,0);
        $gagal_lelang2['pkt'] = DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Gagal Lelang')->count();
        $gagal_lelang2['pagu_dipa'] = round(DB::table("tbl_api_kontrak")->where('tgl_backup', 'like', "%$date2%")->where('status_tender', 'Gagal Lelang')->sum('pg')/1000,0);
        
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
        
        $proses_lelang02 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", "<", 60)
            ->count();
        $proses_lelang23 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">=", 60)
            ->where("durasi_lelang_hari", "<", 90)
            ->count();
        $proses_lelang34 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">=", 90)
            ->where("durasi_lelang_hari", "<", 120)
            ->count();
        $proses_lelang4 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Proses Lelang')
            ->where("durasi_lelang_hari", ">", 120)
            ->count();

        $proses_lelang02 = $proses_lelang02;
        $proses_lelang23 = $proses_lelang23;
        $proses_lelang34 = $proses_lelang34;
        $proses_lelang4  = $proses_lelang4;
        $total = $proses_lelang02 + $proses_lelang23 + $proses_lelang34 + $proses_lelang4;
        
        $persentase_lelang02 = round(($proses_lelang02/($total ?: 1) * 100),2);
        $persentase_lelang23 = round(($proses_lelang23/($total ?: 1) * 100),2);
        $persentase_lelang34 = round(($proses_lelang34/($total ?: 1) * 100),2);
        $persentase_lelang4 = round(($proses_lelang4/($total ?: 1) * 100),2);
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
        
        $terkontrak02 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", "<", 60)
            ->count();
        $terkontrak23 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 60)
            ->where("durasi_lelang_hari", "<", 90)
            ->count();
        $terkontrak34 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 90)
            ->where("durasi_lelang_hari", "<", 120)
            ->count();
        $terkontrak4 = DB::table("tbl_api_kontrak")
            ->where('tgl_backup', 'like', "%$date%")
            ->where("status_tender", 'Terkontrak')
            ->where("durasi_lelang_hari", ">=", 120)
            ->count();

        $terkontrak02 = $terkontrak02;
        $terkontrak23 = $terkontrak23;
        $terkontrak34 = $terkontrak34;
        $terkontrak4  = $terkontrak4;
        $total = $terkontrak02 + $terkontrak23 + $terkontrak34 + $terkontrak4;
        
        $persentase_terkontrak02 = round(($terkontrak02/($total ?: 1) * 100),2);
        $persentase_terkontrak23 = round(($terkontrak23/($total ?: 1) * 100),2);
        $persentase_terkontrak34 = round(($terkontrak34/($total ?: 1) * 100),2);
        $persentase_terkontrak4 = round(($terkontrak4/($total ?: 1) * 100),2);
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

        $kontrak_hps_persentase60   = round($kontrak_hps_jumlah60/($kontrak_hps_jumlah_total ?: 1)*100, 2);
        $kontrak_hps_persentase6070 = round($kontrak_hps_jumlah6070/($kontrak_hps_jumlah_total ?: 1)*100, 2);
        $kontrak_hps_persentase7080 = round($kontrak_hps_jumlah7080/($kontrak_hps_jumlah_total ?: 1)*100, 2);
        $kontrak_hps_persentase_total = $kontrak_hps_persentase60 + $kontrak_hps_persentase6070 + $kontrak_hps_persentase7080;

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
        $deviasi = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%');
        $dev1_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi', '>', 10);
        $dev1_persentase = $deviasi->count() ? round(($dev1_query->count() / $deviasi->count() * 100)) : 0;
        $dev1 = [
            'persentase' => $dev1_persentase,
            'jumlah_satker' => $dev1_query->count()
        ];

        $dev2_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi', '>', 0)
            ->where('deviasi', '<=', 10);
        $dev2_persentase = $deviasi->count() ? round(($dev2_query->count() / $deviasi->count() * 100)) : 0;;
        $dev2 = [
            'persentase' => $dev2_persentase,
            'jumlah_satker' => $dev2_query->count()
        ];

        $dev3_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi', '>', -10)
            ->where('deviasi', '<=', 0);
        $dev3_persentase = $deviasi->count() ? round(($dev3_query->count() / $deviasi->count() * 100)) : 0;;
        $dev3 = [
            'persentase' => $dev3_persentase,
            'jumlah_satker' => $dev3_query->count()
        ];

        $dev4_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi', '>', -30)
            ->where('deviasi', '<=', -10);
        $dev4_persentase = $deviasi->count() ? round(($dev4_query->count() / $deviasi->count() * 100)) : 0;;
        $dev4 = [
            'persentase' => $dev4_persentase,
            'jumlah_satker' => $dev4_query->count()
        ];

        $dev5_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
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
            'persentase_total' => $dev1['persentase'] + $dev2['persentase'] + $dev3['persentase'] + $dev4['persentase'] + $dev5['persentase'],
            'satker_total' => $dev1['jumlah_satker'] + $dev2['jumlah_satker'] + $dev3['jumlah_satker'] + $dev4['jumlah_satker'] + $dev5['jumlah_satker'],
        ]);
    }

    public function chartProgressFisik()
    {
        $date = request("date");
        $deviasi_fisik = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%');
        $dev1_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi_fisik', '>', 10);
        $dev1_persentase = $deviasi_fisik->count() ? round(($dev1_query->count() / $deviasi_fisik->count() * 100)) : 0;
        $dev1 = [
            'persentase' => $dev1_persentase,
            'jumlah_satker' => $dev1_query->count()
        ];

        $dev2_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi_fisik', '>', 0)
            ->where('deviasi_fisik', '<=', 10);
        $dev2_persentase = $deviasi_fisik->count() ? round(($dev2_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev2 = [
            'persentase' => $dev2_persentase,
            'jumlah_satker' => $dev2_query->count()
        ];

        $dev3_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi_fisik', '>', -10)
            ->where('deviasi_fisik', '<=', 0);
        $dev3_persentase = $deviasi_fisik->count() ? round(($dev3_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev3 = [
            'persentase' => $dev3_persentase,
            'jumlah_satker' => $dev3_query->count()
        ];

        $dev4_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
            ->where('deviasi_fisik', '>', -30)
            ->where('deviasi_fisik', '<=', -10);
        $dev4_persentase = $deviasi_fisik->count() ? round(($dev4_query->count() / $deviasi_fisik->count() * 100)) : 0;;
        $dev4 = [
            'persentase' => $dev4_persentase,
            'jumlah_satker' => $dev4_query->count()
        ];

        $dev5_query = DB::table("tbl_api_profiles")
            ->where("tanggal_backup", 'like', $date.'%')
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
            'persentase_total' => $dev1['persentase'] + $dev2['persentase'] + $dev3['persentase'] + $dev4['persentase'] + $dev5['persentase'],
            'satker_total' => $dev1['jumlah_satker'] + $dev2['jumlah_satker'] + $dev3['jumlah_satker'] + $dev4['jumlah_satker'] + $dev5['jumlah_satker'],
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
            $data[$df->level]['status_'.$df->mr_status] = $df->jumlah;
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
        if($date_diff < 1) {
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
                    if($df->waktu == $lb && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1])." ".$labex[0];
        }
            
        return response()->json([
            'labels'=> $label,
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
        if($date_diff < 1) {
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
                    if($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1])." ".$labex[0];
        }
            
        return response()->json([
            'labels'=> $label,
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
        if($date_diff < 1) {
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
                    if($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1])." ".$labex[0];
        }
            
        return response()->json([
            'labels'=> $label,
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
        if($date_diff < 1) {
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
                    if($df->waktu == $lb  && $df->level == $lvl) {
                        $data[$lvl][$key] = $df->jumlah;
                    }
                }
            }
        }

        foreach ($label as $key => $lb) {
            $labex = explode("-", $lb);
            $label[$key] = AppHelper::getMonthIndo($labex[1])." ".$labex[0];
        }
            
        return response()->json([
            'labels'=> $label,
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

        if($upt) {
            $data_all->where("nama_balai", $upt);
        }

        $data_all = $data_all->select("nama_balai", 'jenis_permohonan_edit', DB::raw("COUNT(*) as total"))
            ->groupBy("nama_balai")
            ->groupBy("jenis_permohonan_edit")
            ->get()
            ->toArray();

        $bws = array_column($data_all, 'nama_balai');
        $bws = array_unique($bws);
        
        $jenis = array_column($data_all, 'jenis_permohonan_edit');
        $jenis = array_unique($jenis);

        $data_new[0]['label'] = "Pengusahaan";
        $data_new[0]['data'] = [];
        $data_new[1]['label'] = "Penggunaan";
        $data_new[1]['data'] = [];
        $data_new[2]['label'] = "Pengusahaan SDA Belum Berizin";
        $data_new[2]['data'] = [];
        $data_new[3]['label'] = "Penggunaan SDA Belum Berizin";
        $data_new[3]['data'] = [];
        
        foreach ($bws as $bkey => $b) {
            $data_new[0]['data'][$bkey] = 0;
            $data_new[1]['data'][$bkey] = 0;
            $data_new[3]['data'][$bkey] = 0;
            $data_new[4]['data'][$bkey] = 0;
            foreach ($data_all as $dall) {
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Pengusahaan"){
                    $data_new[0]['data'][$bkey] = $dall->total;
                }
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Penggunaan"){
                    $data_new[1]['data'][$bkey] = $dall->total;
                }
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Pengusahaan SDA Belum Berizin"){
                    $data_new[2]['data'][$bkey] = $dall->total;
                }
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "Penggunaan SDA Belum Berizin"){
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

        if($upt) {
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
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "semua"){
                    $data_new[0]['data'][$bkey] = $dall->total;
                }
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "kegiatan"){
                    $data_new[1]['data'][$bkey] = $dall->total;
                }
                if($dall->nama_balai == $b && $dall->jenis_permohonan_edit == "umum"){
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
        if($upt) {
            $data_sudah_monev->where("nama_balai", $upt);
        }
        $data_sudah_monev = $data_sudah_monev->count() ?? 0;

        $data_belum_monev = DB::table("tbl_api_daftar_perizinan")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(function($query) {
                return $query->where("status_monev", "BELUM")
                    ->orWhereNull("status_monev");
            });
            
        if($upt) {
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
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat)"), "=", 0);
        if($upt) {
            $sk1->where("nama_balai", $upt);
        }
        $sk1 = $sk1->count();

        $sk2 = DB::table("tbl_api_permohonan_izin")
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(DB::raw("DATEDIFF(NOW(), tanggal_surat)"), ">", 7);
        if($upt) {
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

    public function chartStatusPaketBelumLelang()
    {
        // $date_start = request('date_start');
        // $date_end = request("date_end");
        $tgl_backup = request("date");

        $total_paket = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_tender","Belum Lelang")
            ->count();

        $total_myc = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("status_tender","Belum Lelang")
            ->count();

        $total_myc_phln = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("phln", ">", 0)
            ->where("status_tender","Belum Lelang")
            ->count();
            
        $total_myc_rmp = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", ">", 0)
            ->where("rmp", ">", 0)
            ->where("status_tender","Belum Lelang")
            ->count();

        $total_syc = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("status_tender","Belum Lelang")
            ->count();

        $total_syc_phln = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("phln", ">", 0)
            ->where("status_tender","Belum Lelang")
            ->count();
        
        $total_syc_rmp = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("kdjnskon", 0)
            ->where("rmp", ">", 0)
            ->where("status_tender","Belum Lelang")
            ->count();
        
        $table = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->select("kdkategori", DB::raw("count(case when kdjnskon = 0 THEN 1 END) as syc, count(case when kdjnskon>0 THEN 1 END) as myc, sum(pg) as pg, count(*) as jumlah_paket"))
            ->where("status_tender","Belum Lelang")
            ->groupBy("kdkategori")
            ->get();

        $total_pagu = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", $tgl_backup)
            // ->where(DB::raw("tanggal_backup"), ">", $date_start)
            // ->where(DB::raw("tanggal_backup"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where("status_tender","Belum Lelang")
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
            // 'satker' => $satker,
        ]);
    }

    public function tablePerijinan()
    {
        $date_start = request('date_start');
        $date_end = request('date_end');
        $upt = request('upt');

        $queryBuilder = DB::table('tbl_api_permohonan_izin')
            ->where(DB::raw("tanggal_surat"), ">", $date_start)
            ->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($date_end)->addDays(1)->format("Y-m-d"))
            ->where(function($query) {
                return $query->where(DB::raw("DATEDIFF(NOW(), tanggal_surat)"), ">", 7)
                    ->orWhere(DB::raw("DATEDIFF(NOW(), tanggal_surat)"), "=", 0);
            })
            // ->select('nama_perusahaan', 'nama_balai', DB::raw("DATEDIFF(now(), tanggal_surat) as VERIFIKASI"), DB::raw("DATEDIFF(now(), tanggal_surat) as SK_MENTERI"))
            ->select('nama_perusahaan', 'nama_balai', 'sumber_air', DB::raw("DATEDIFF(now(), tanggal_surat) as SK_MENTERI"), 'nomor_registrasi')
            ;
        if($upt) {
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
            ->editColumn("SK_MENTERI", function($data) {
                if($data->SK_MENTERI == 6) {
                    return "1 Hari Lagi";
                } else if($data->SK_MENTERI == 7) {
                    return "Hari ini Batas Akhir";
                } else if($data->SK_MENTERI > 7) {
                    return "Terlambat ".$data->SK_MENTERI." Hari";
                } else {
                    return "Belum Batas Akhir";
                }
            })
            ->toJson();
    }

    public function profile() {
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
        
        $response = array (
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

        if (! Hash::check($request->current_password, $data->password)) {
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
        
        $response = array (
            'status'    => true,
            'message'   => 'Password has been changed successfully.'
        );

        return json_encode($response);
    }
}