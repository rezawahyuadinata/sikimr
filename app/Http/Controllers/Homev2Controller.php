<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Formulir\KomitmenMRModel;
use App\Model\Pengaturan\BeritaCategoryModel;
use App\Model\Pengaturan\BeritaModel;
use App\Model\Pengaturan\GalleryModel;
use App\Model\Pengaturan\HukumModel;
use App\Model\Pengaturan\SiptlModel;
use App\Model\Pengaturan\SopCategoryModel;
use App\Model\Pengaturan\SopModel;
use App\Model\Pengaturan\TllhaModel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use DB;
use Illuminate\Support\Facades\Http;

class Homev2Controller extends Controller
{
    public function index()
    {
        $data = [];
        $pagu_gagal = 0;
        $pkt_gagal = 0;
        $pagu_belum = 0;
        $pkt_belum = 0;
        $pagu_proses = 0;
        $pkt_proses = 0;
        $pagu_persiapan = 0;
        $pkt_persiapan = 0;
        $pagu_terkontrak = 0;
        $pkt_terkontrak = 0;
        // $data['galleries'] = GalleryModel::all()->where('file_category', 'Gambar')->random(6);
        $data['news'] = BeritaModel::all()->sortByDesc('id')->take(4);

        $data['sop'] = SopModel::all();

        $data['siptl'] = SiptlModel::all();
        $data['tllha'] = TllhaModel::all();

        // $response = Http::withHeaders([
        //     'x-key' => 'vHUuNuslJsOZHGw5LWpHkJxR1Au2NGzI'
        // ])->get('http://gis.pusair-pu.go.id/api/v1/kontrak');

        // $array_response = json_decode($response, true);

        $client = new Client();
        $response = $client->request('GET', 'https://emonitoring.pu.go.id/api_ditkisda/kontrak');
        $result = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()), true);
        // dd($data['tllha']);
        // dd($result);
        // if (!$response) {
        //     $data['pag_pbj'] = array(0, 0, 0, 0, 0);
        //     $data['pak_pbj'] = array(0, 0, 0, 0, 0);
        // }

        if ($result != null) {
            foreach ($result as $value) {
                if ($value["status_tender"] == "Gagal Lelang") {
                    if (
                        $value["kdjnskon"] == "0" || $value["kdjnskon"] == "1" || $value["kdjnskon"] == "" ||
                        $value["kdjnskon"] == "3"
                    ) {
                        $pagu_gagal = $pagu_gagal + (intval($value["pfis"]) / 1000);
                        $pkt_gagal++;
                    }
                } elseif ($value["status_tender"] == "Belum Lelang") {
                    if ($value["kdjnskon"] == "0" || $value["kdjnskon"] == "1" || $value["kdjnskon"] == "" || $value["kdjnskon"] == "3") {
                        $pagu_belum = $pagu_belum + (intval($value["pfis"]) / 1000);
                        $pkt_belum++;
                    }
                } elseif ($value["status_tender"] == "Proses Lelang") {
                    if ($value["kdjnskon"] == "0" || $value["kdjnskon"] == "1" || $value["kdjnskon"] == "" || $value["kdjnskon"] == "3") {
                        $pagu_proses = $pagu_proses + (intval($value["pfis"]) / 1000);
                        $pkt_proses++;
                    }
                } elseif ($value["status_tender"] == "persiapan kontrak") {
                    if ($value["kdjnskon"] == "0" || $value["kdjnskon"] == "1" || $value["kdjnskon"] == "" || $value["kdjnskon"] == "3") {
                        $pagu_persiapan = $pagu_persiapan + (intval($value["pfis"]) / 1000);
                        $pkt_persiapan++;
                    }
                } elseif ($value["status_tender"] == "terkontrak") {
                    if ($value["kdjnskon"] == "0" || $value["kdjnskon"] == "1" || $value["kdjnskon"] == "" || $value["kdjnskon"] == "3") {
                        $pagu_terkontrak = $pagu_terkontrak + (intval($value["pfis"]) / 1000);
                        $pkt_terkontrak++;
                    }
                }
            }

            // dd($pagu);
            $data['pag_pbj'] = array($pagu_terkontrak, $pagu_persiapan, $pagu_proses, $pagu_belum, $pagu_gagal);
            $data['pak_pbj'] = array($pkt_terkontrak, $pkt_persiapan, $pkt_proses, $pkt_belum, $pkt_gagal);
        } else {
            $data['pag_pbj'] = array(0, 0, 0, 0, 0);
            $data['pak_pbj'] = array(0, 0, 0, 0, 0);
        }


        // dd($data);

        // $data['t_kom_mr_d'] = KomitmenMRModel::where('verifikasi', '<', '3')->count();
        // $data['t_kom_mr_v'] = KomitmenMRModel::where('verifikasi', '3')->count();

        // $data['t_t1_d'] = PemantauanMRModel::where('verifikasi', '<', '3')->where('triwulan', '=', '1')->count();
        // $data['t_t1_v'] = PemantauanMRModel::where('verifikasi', '=', '3')->where('triwulan', '=', '1')->count();

        // $data['t_t2_d'] = PemantauanMRModel::where('verifikasi', '<', '3')->where('triwulan', '=', '2')->count();
        // $data['t_t2_v'] = PemantauanMRModel::where('verifikasi', '=', '3')->where('triwulan', '=', '2')->count();

        // $data['t_t3_d'] = PemantauanMRModel::where('verifikasi', '<', '3')->where('triwulan', '=', '3')->count();
        // $data['t_t3_v'] = PemantauanMRModel::where('verifikasi', '=', '3')->where('triwulan', '=', '3')->count();

        // $data['t_t4_d'] = PemantauanMRModel::where('verifikasi', '<', '3')->where('triwulan', '=', '4')->count();
        // $data['t_t4_v'] = PemantauanMRModel::where('verifikasi', '=', '3')->where('triwulan', '=', '4')->count();

        $data_t1 = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), '2022')
            ->where("tbl_pemantauan_mr.level", 'UPR-T1')
            ->select(
                DB::raw("'UPR-T1' upr"),
                DB::raw("'UNOR' as level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                // DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                // DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
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
        $data_t2 = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), '2022')
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
                // DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                // DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
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
        $data_t3 = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), '2022')
            ->where("tbl_pemantauan_mr.level", 'UPR-T3')
            ->leftJoin("users", 'users.id', '=', 'tbl_pemantauan_mr.dibuat_oleh')
            ->leftJoin("eselon-2", 'eselon-2.id', '=', 'tbl_pemantauan_mr.eselon2_id')
            ->select(
                DB::raw("'UPR-T3' upr"),
                db::raw("(CASE
                    WHEN `eselon-2`.`level_user` ='balai' THEN 'BALAI (BBWS/BWS)'
                    WHEN `eselon-2`.`level_user` ='balai_teknik' THEN 'BALTEK'
                    ELSE 'UKER'
                END) level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                // DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                // DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
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
        $data_t3_op = DB::table("tbl_pemantauan_mr")
            ->where(DB::raw("tahun"), '2022')
            ->where("tbl_pemantauan_mr.level", 'UPR-T3')
            ->where("eselon2_id", 7)
            ->select(
                DB::raw("'UPR-T3' upr"),
                DB::raw("'SKPD TP-OP' level_user"),
                DB::raw("count(tbl_pemantauan_mr.level) jumlah"),
                // DB::raw("IFNULL(SUM(verifikasi = '3'),0) komitmen_v"),
                // DB::raw("IFNULL(SUM(verifikasi < 3),0) komitmen_d"),
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

        foreach ($data_t1 as $dt1) {
            $data[] = $dt1;
            $total_jumlah += $dt1->jumlah;
            // $total_komitmen_v += $dt1->komitmen_v;
            // $total_komitmen_d += $dt1->komitmen_d;
            $total_komitmen_t1_v += $dt1->komitmen_t1_v;
            $total_komitmen_t1_d += $dt1->komitmen_t1_d;
            $total_komitmen_t2_v += $dt1->komitmen_t2_v;
            $total_komitmen_t2_d += $dt1->komitmen_t2_d;
            $total_komitmen_t3_v += $dt1->komitmen_t3_v;
            $total_komitmen_t3_d += $dt1->komitmen_t3_d;
            $total_komitmen_t4_v += $dt1->komitmen_t4_v;
            $total_komitmen_t4_d += $dt1->komitmen_t4_d;
        }
        foreach ($data_t2 as $dt2) {
            $data[] = $dt2;
            $total_jumlah += $dt2->jumlah;
            // $total_komitmen_v += $dt2->komitmen_v;
            // $total_komitmen_d += $dt2->komitmen_d;
            $total_komitmen_t1_v += $dt2->komitmen_t1_v;
            $total_komitmen_t1_d += $dt2->komitmen_t1_d;
            $total_komitmen_t2_v += $dt2->komitmen_t2_v;
            $total_komitmen_t2_d += $dt2->komitmen_t2_d;
            $total_komitmen_t3_v += $dt2->komitmen_t3_v;
            $total_komitmen_t3_d += $dt2->komitmen_t3_d;
            $total_komitmen_t4_v += $dt2->komitmen_t4_v;
            $total_komitmen_t4_d += $dt2->komitmen_t4_d;
        }
        foreach ($data_t3 as $dt3) {
            $data[] = $dt3;
            $total_jumlah += $dt3->jumlah;
            // $total_komitmen_v += $dt3->komitmen_v;
            // $total_komitmen_d += $dt3->komitmen_d;
            $total_komitmen_t1_v += $dt3->komitmen_t1_v;
            $total_komitmen_t1_d += $dt3->komitmen_t1_d;
            $total_komitmen_t2_v += $dt3->komitmen_t2_v;
            $total_komitmen_t2_d += $dt3->komitmen_t2_d;
            $total_komitmen_t3_v += $dt3->komitmen_t3_v;
            $total_komitmen_t3_d += $dt3->komitmen_t3_d;
            $total_komitmen_t4_v += $dt3->komitmen_t4_v;
            $total_komitmen_t4_d += $dt3->komitmen_t4_d;
        }
        foreach ($data_t3_op as $dt3_op) {
            $data[] = $dt3_op;
            $total_jumlah += $dt3_op->jumlah;
            // $total_komitmen_v += $dt3_op->komitmen_v;
            // $total_komitmen_d += $dt3_op->komitmen_d;
            $total_komitmen_t1_v += $dt3_op->komitmen_t1_v;
            $total_komitmen_t1_d += $dt3_op->komitmen_t1_d;
            $total_komitmen_t2_v += $dt3_op->komitmen_t2_v;
            $total_komitmen_t2_d += $dt3_op->komitmen_t2_d;
            $total_komitmen_t3_v += $dt3_op->komitmen_t3_v;
            $total_komitmen_t3_d += $dt3_op->komitmen_t3_d;
            $total_komitmen_t4_v += $dt3_op->komitmen_t4_v;
            $total_komitmen_t4_d += $dt3_op->komitmen_t4_d;
        }


        $kom_verif =  KomitmenMRModel::where('verifikasi', '3')->where('mr_periode', date('Y'))->count();
        $kom_draft = KomitmenMRModel::where('mr_periode', date('Y'))->where('level', '!=', 'PPK')->where(DB::raw("verifikasi = '0' OR verifikasi = '1' OR verifikasi = '2' "))->count();

        $data['kom_v'] = $kom_verif;
        $data['kom_d'] = $kom_draft;
        $data['t1_v'] = $total_komitmen_t1_v;
        $data['t1_d'] = $total_komitmen_t1_d;
        $data['t2_v'] = $total_komitmen_t2_v;
        $data['t2_d'] = $total_komitmen_t2_d;
        $data['t3_v'] = $total_komitmen_t3_v;
        $data['t3_d'] = $total_komitmen_t3_d;
        $data['t4_v'] = $total_komitmen_t4_v;
        $data['t4_d'] = $total_komitmen_t4_d;

        $json = json_encode($data);

        // dd($response);
        return view('Home.pages.home', $data);
    }

    public function gallery()
    {
        $data['galleries'] = GalleryModel::paginate(6);

        return view('Home.pages.gallery', $data);
    }
    public function berita()
    {
        $data['news'] = BeritaModel::orderByDesc('created_at')->paginate(4);
        $data['latest_news'] = BeritaModel::orderByDesc('created_at')->take(5)->get();
        $data['news_categories'] = BeritaCategoryModel::all();

        return view('Home.pages.berita', $data);
    }
    public function beritadetail($slug)
    {
        $news = BeritaModel::join('tbl_berita_categories', 'tbl_berita_categories.id', 'tbl_beritas.category')->select('tbl_beritas.*', 'tbl_berita_categories.name')->where([
            'tbl_beritas.slug' => $slug
        ])->first();

        if (!$news) {
            $news = BeritaModel::where([
                'slug' => $slug
            ])->first();
        };

        $this->news['news'] = $news;
        $data['news_categories'] = BeritaCategoryModel::all();
        $data['berita'] = BeritaModel::orderByDesc('created_at')->take(5)->get();
        return view('Home.pages.beritadetail', $this->news, $data);
    }

    public function beritacategory($slug)
    {
        $data['cat'] = BeritaCategoryModel::join('tbl_beritas', 'tbl_beritas.category', 'tbl_berita_categories.id')
            ->select('tbl_beritas.*', 'tbl_berita_categories.name')
            ->where([
                'tbl_berita_categories.slug' => $slug
            ])->get();
        // dd($data['cat']);
        return view('Home.pages.berita-category', $data);
    }

    public function profil()
    {
        $data['news'] = BeritaModel::all();

        return view('Home.pages.profile', $data);
    }

    public function hukum()
    {
        $data['hukum'] = HukumModel::all();

        return view('Home.pages.hukum', $data);
    }

    public function sop()
    {
        $data['sopCat'] = SopCategoryModel::all();
        $data['sop'] = SopModel::all();
        return view('Home.pages.sop', $data);
    }

    public function tutorial()
    {
        return view('Home.pages.tutorial');
    }

    public function laporanmr()
    {
        return view('Home.pages.laporanmr');
    }

    public function laporanpbj()
    {
        return view('Home.pages.laporanpbj');
    }

    public function laporantender()
    {
        return view('Home.pages.laporanpbj');
    }

    public function laporanzi()
    {
        return view('Home.pages.laporanpbj');
    }

    public function laporansiptl()
    {
        return view('Home.pages.laporanpbj');
    }
}
