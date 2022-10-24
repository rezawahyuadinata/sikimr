<?php

namespace App\Http\Controllers\Ki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;
use Artisan;
use DataTables;
use Validator;

class PemantauanPBJController extends MYController
{
    public function index() {
        $data = $this->data;
        $data->tgl_backup = DB::table("tbl_api_kontrak")
            ->select("tgl_backup")
            ->groupBy("tgl_backup")
            ->orderBy("id", "desc")
            ->limit(100)
            ->get()
            ->toArray();
        $data->nmsatker = DB::table('v_pbj')
            ->select('nmsatker')
            ->distinct()
            ->get();
        $data->tgl_backup = array_column($data->tgl_backup, "tgl_backup");

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('v_pbj');
        foreach ($request['filters'] as $key => $value) {
            if($value) {
                $queryBuilder->where($key, 'like', "%$value%");
            }
        }

        return DataTables::queryBuilder($queryBuilder)
            ->toJson();
    }

    public function total(Request $request) {
        $queryBuilder = DB::table('v_pbj');
        foreach ($request['filters'] as $key => $value) {
            if($value) {
                $queryBuilder->where($key, 'like', "%$value%");
            }
        }

        $queryBuilder->select(DB::raw("sum(jumlah_terkontrak) as total_terkontrak, sum(jumlah_persiapan_terkontrak) as total_persiapan_terkontrak, sum(jumlah_proses_lelang) as total_proses_lelang, sum(jumlah_belum_lelang) as total_belum_lelang, sum(jumlah_gagal_lelang) as total_gagal_lelang"));

        return response()->json([
            'status' => 1,
            'message' => "Sukses",
            'data' => $queryBuilder->first()
        ]);
    }

    public function job()
    {
        try {
            $response = Artisan::call("command:get-kontrak");
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
