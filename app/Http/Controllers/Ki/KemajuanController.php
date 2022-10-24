<?php

namespace App\Http\Controllers\Ki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;
use App\Helpers\AppHelper;
use Artisan;


use DataTables;
use Validator;

class KemajuanController extends MYController
{
    public function index() {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $date1 = request('date1');
        $date2 = request('date2');
        $year = request("year");
        $datasets = [];
        // $date1 = \Carbon\Carbon::parse($date1);
        // $date1 = $date1->format('d') . ' ' .AppHelper::getMonthIndo( $date1->format('m') ) . ' ' . $date1->format("Y") ;
        // $date2 = \Carbon\Carbon::parse($date2);
        // $date2 = $date2->format('d') . ' ' .AppHelper::getMonthIndo( $date2->format('m') ) . ' ' . $date2->format("Y") ;

        $date1 = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", 'like', "%$date1%")
            ->where('tahun', $year)
            ->select("tgl_backup")
            ->orderBy("id")
            ->first()->tgl_backup ?? $date1;
        $date2 = DB::table("tbl_api_kontrak")
            ->where("tgl_backup", 'like', "%$date2%")
            ->where('tahun', $year)
            ->select("tgl_backup")
            ->orderBy("id")
            ->first()->tgl_backup ?? $date2;

        $kontrak1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("count(kdsatker) as paket, ROUND(sum(pg)/1000,0) pg"))
            ->where("tgl_backup", $date1)
            ->groupBy("kdsatker");
        $terkontrak1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as terkontrak, ROUND(sum(pg)/1000,0) terkontrak_pg"))
            ->where("tgl_backup", $date1)
            ->where("status_tender", "Terkontrak")
            ->groupBy("kdsatker");
        $persiapan_terkontrak1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as persiapan_terkontrak, ROUND(sum(pg)/1000,0) persiapan_terkontrak_pg"))
            ->where("tgl_backup", $date1)
            ->where("status_tender", "Persiapan Terkontrak")
            ->groupBy("kdsatker");
        $proses_lelang1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as proses_lelang, ROUND(sum(pg)/1000,0) proses_lelang_pg"))
            ->where("tgl_backup", $date1)
            ->where("status_tender", "Proses Lelang")
            ->groupBy("kdsatker");
        $belum_lelang1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as belum_lelang, ROUND(sum(pg)/1000,0) belum_lelang_pg"))
            ->where("tgl_backup", $date1)
            ->where("status_tender", "Belum Lelang")
            ->groupBy("kdsatker");
        $gagal_lelang1 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as gagal_lelang, ROUND(sum(pg)/1000,0) gagal_lelang_pg"))
            ->where("tgl_backup", $date1)
            ->where("status_tender", "Gagal Lelang")
            ->groupBy("kdsatker");

        $kontrak2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("count(kdsatker) as paket, ROUND(sum(pg)/1000,0) pg"))
            ->where("tgl_backup", $date2)
            ->groupBy("kdsatker");
        $terkontrak2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as terkontrak, ROUND(sum(pg)/1000,0) terkontrak_pg"))
            ->where("tgl_backup", $date2)
            ->where("status_tender", "Terkontrak")
            ->groupBy("kdsatker");
        $persiapan_terkontrak2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as persiapan_terkontrak, ROUND(sum(pg)/1000,0) persiapan_terkontrak_pg"))
            ->where("tgl_backup", $date2)
            ->where("status_tender", "Persiapan Terkontrak")
            ->groupBy("kdsatker");
        $proses_lelang2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as proses_lelang, ROUND(sum(pg)/1000,0) proses_lelang_pg"))
            ->where("tgl_backup", $date2)
            ->where("status_tender", "Proses Lelang")
            ->groupBy("kdsatker");
        $belum_lelang2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as belum_lelang, ROUND(sum(pg)/1000,0) belum_lelang_pg"))
            ->where("tgl_backup", $date2)
            ->where("status_tender", "Belum Lelang")
            ->groupBy("kdsatker");
        $gagal_lelang2 = DB::table('tbl_api_kontrak')
            ->select("kdsatker", DB::raw("COUNT(kdsatker) as gagal_lelang, ROUND(sum(pg)/1000,0) gagal_lelang_pg"))
            ->where("tgl_backup", $date2)
            ->where("status_tender", "Gagal Lelang")
            ->groupBy("kdsatker");


        $datasets = DB::table("tbl_satker")
            ->leftJoinSub($kontrak1, 'tbl_api_kontrak1', 'tbl_api_kontrak1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($terkontrak1, 'tbl_api_terkontrak1', 'tbl_api_terkontrak1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($persiapan_terkontrak1, 'tbl_api_persiapan_terkontrak1', 'tbl_api_persiapan_terkontrak1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($proses_lelang1, 'tbl_api_proses_lelang1', 'tbl_api_proses_lelang1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($belum_lelang1, 'tbl_api_belum_lelang1', 'tbl_api_belum_lelang1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($gagal_lelang1, 'tbl_api_gagal_lelang1', 'tbl_api_gagal_lelang1.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($kontrak2, 'tbl_api_kontrak2', 'tbl_api_kontrak2.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($terkontrak2, 'tbl_api_terkontrak2', 'tbl_api_terkontrak2.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($persiapan_terkontrak2, 'tbl_api_persiapan_terkontrak2', 'tbl_api_persiapan_terkontrak2.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($proses_lelang2, 'tbl_api_proses_lelang2', 'tbl_api_proses_lelang2.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($belum_lelang2, 'tbl_api_belum_lelang2', 'tbl_api_belum_lelang2.kdsatker', '=', 'tbl_satker.kode')
            ->leftJoinSub($gagal_lelang2, 'tbl_api_gagal_lelang2', 'tbl_api_gagal_lelang2.kdsatker', '=', 'tbl_satker.kode')
            ->select(
                "nama_satker", 
                DB::raw('IFNULL(tbl_api_kontrak1.paket, 0) paket1'), 
                DB::raw('IFNULL(tbl_api_kontrak1.pg, 0) pg1'),
                DB::raw('IFNULL(tbl_api_terkontrak1.terkontrak, 0) terkontrak1'),
                DB::raw('IFNULL(tbl_api_terkontrak1.terkontrak_pg, 0) terkontrak_pg1'),
                DB::raw('IFNULL(tbl_api_persiapan_terkontrak1.persiapan_terkontrak, 0) persiapan_terkontrak1'),
                DB::raw('IFNULL(tbl_api_persiapan_terkontrak1.persiapan_terkontrak_pg, 0) persiapan_terkontrak_pg1'),
                DB::raw('IFNULL(tbl_api_proses_lelang1.proses_lelang, 0) proses_lelang1'),
                DB::raw('IFNULL(tbl_api_proses_lelang1.proses_lelang_pg, 0) proses_lelang_pg1'),
                DB::raw('IFNULL(tbl_api_belum_lelang1.belum_lelang, 0) belum_lelang1'),
                DB::raw('IFNULL(tbl_api_belum_lelang1.belum_lelang_pg, 0) belum_lelang_pg1'),
                DB::raw('IFNULL(tbl_api_gagal_lelang1.gagal_lelang, 0) gagal_lelang1'),
                DB::raw('IFNULL(tbl_api_gagal_lelang1.gagal_lelang_pg, 0) gagal_lelang_pg1'),
                DB::raw('IFNULL(tbl_api_kontrak2.paket, 0) paket2'),
                DB::raw('IFNULL(tbl_api_kontrak2.pg, 0) pg2'),
                DB::raw('IFNULL(tbl_api_terkontrak2.terkontrak, 0) terkontrak2'),
                DB::raw('IFNULL(tbl_api_terkontrak2.terkontrak_pg, 0) terkontrak_pg2'),
                DB::raw('IFNULL(tbl_api_persiapan_terkontrak2.persiapan_terkontrak, 0) persiapan_terkontrak2'),
                DB::raw('IFNULL(tbl_api_persiapan_terkontrak2.persiapan_terkontrak_pg, 0) persiapan_terkontrak_pg2'),
                DB::raw('IFNULL(tbl_api_proses_lelang2.proses_lelang, 0) proses_lelang2'),
                DB::raw('IFNULL(tbl_api_proses_lelang2.proses_lelang_pg, 0) proses_lelang_pg2'),
                DB::raw('IFNULL(tbl_api_belum_lelang2.belum_lelang, 0) belum_lelang2'),
                DB::raw('IFNULL(tbl_api_belum_lelang2.belum_lelang_pg, 0) belum_lelang_pg2'),
                DB::raw('IFNULL(tbl_api_gagal_lelang2.gagal_lelang, 0) gagal_lelang2'),
                DB::raw('IFNULL(tbl_api_gagal_lelang2.gagal_lelang_pg, 0) gagal_lelang_pg2')
            )
            ->get()
            ->toArray();

        $new_datasets = [];
        foreach ($datasets as $dt) {
            $new_datasets[] = array_values((array)$dt);
        }

        $datasets = $new_datasets;
            

        // foreach ($nmsatker as $key => $satker) {
        //     $datasets[$key][] = $satker;
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Terkontrak')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Terkontrak')->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', "Persiapan Terkontrak")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', "Persiapan Terkontrak")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where("status_tender", "Proses Lelang")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where("status_tender", "Proses Lelang")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Belum Lelang')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Belum Lelang')->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Gagal Lelang')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date1%")->where('status_tender', 'Gagal Lelang')->sum('pg')/1000,0);
            
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Terkontrak')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Terkontrak')->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', "Persiapan Terkontrak")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', "Persiapan Terkontrak")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where("status_tender", "Proses Lelang")->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where("status_tender", "Proses Lelang")->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Belum Lelang')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Belum Lelang')->sum('pg')/1000,0);
        //     $datasets[$key][] = DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Gagal Lelang')->count();
        //     $datasets[$key][] = round(DB::table("tbl_api_kontrak")->where("nmsatker", $satker)->where('tanggal_backup', 'like', "%$date2%")->where('status_tender', 'Gagal Lelang')->sum('pg')/1000,0);
        // }
        
        $data =  [
            'tanggal1' => $date1,
            'tanggal2' => $date2,
            'datasets' => $datasets
        ];

        return response()->json($data);
    }

    public function job()
    {
        try {
            $response = Artisan::call("command:get-profile");
            return response()->json([
                'status' => 1,
                'message' => "Sukses",
                'data' => $response
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 0,
                'message' => $th->getMessage()
            ]);
        }
    }
}
