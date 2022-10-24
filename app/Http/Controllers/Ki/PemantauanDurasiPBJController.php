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
use Schema;

class PemantauanDurasiPBJController extends MYController
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
        $data->tgl_backup = array_column($data->tgl_backup, "tgl_backup");
        $data->upt = DB::table('tbl_satker')
                    ->select('nama_upt')
                    ->groupBy("nama_upt")
                    ->get();
        $data->unit_kerja = DB::table('tbl_uker')
                    ->get();
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $satker = "satker";
        if(!Schema::hasTable($satker)) {
            $satker = "satkers";
        }
        
        $queryBuilder = DB::table('tbl_api_kontrak')
            ->leftJoin('tbl_satker as upt', 'upt.kode', '=', 'tbl_api_kontrak.kdsatker')
            ->leftJoin('tbl_uker as uker', 'uker.kode', '=', 'tbl_api_kontrak.kduker')
            ->select( 'tbl_api_kontrak.*', 'upt.nama_upt as nmupt', 'upt.nama_satker as nmsatkerjoin', 'uker.unit_kerja as nmuker',
                DB::raw("(CASE 
                        WHEN rmp > 0 THEN 'RMP'
                        WHEN phln > 0 THEN 'PHLN'
                        ELSE 'SBSN'
                        END
                    ) as sumber_dana"));
        foreach ($request['filters'] as $key => $value) {
            if(isset($value)) {
            // if(!empty($value) || $value == 0 || $value == "0" ) {
                if($key == "sumber_dana") {
                    if($value == "rmp") {
                        $queryBuilder->where("rmp", ">", 0);
                    } elseif($value == "phln") {
                        $queryBuilder->where("phln", ">", 0);
                    } else {
                        $queryBuilder->where("sbsn", ">", 0);
                    }
                } else if($key == "upt"){
                    $queryBuilder->where("upt.nama_upt", 'like', "%$value%");
                } else if($key == "unit_kerja"){
                    $queryBuilder->where("uker.kode", $value);
                } else if($key == "durasi"){
                    if($value == 1) {
                        $queryBuilder->where("durasi_lelang_hari", '<=', 60);
                    } else if($value == 2) {
                        $queryBuilder->where("durasi_lelang_hari", '>', 60)->where('durasi_lelang_hari', '<=', 90);
                    } else if($value == 3){
                        $queryBuilder->where("durasi_lelang_hari", '>', 90)->where('durasi_lelang_hari', '<=', 120);
                    } else {
                        $queryBuilder->where("durasi_lelang_hari", '>', 120);
                    }
                } else {
                    $queryBuilder->where($key, 'like', "%$value%");
                }
            }
        }

        return DataTables::queryBuilder($queryBuilder)
            ->editColumn("durasi_lelang_hari", function($data) {
                if($data->durasi_lelang_hari < 60) {
                    return "<button class='btn btn-block' style='background-color: rgba(224, 224, 224, 1);'>".$data->durasi_lelang_hari."</button>";
                } elseif($data->durasi_lelang_hari >= 60 && $data->durasi_lelang_hari < 90) {
                    return "<button class='btn btn-block' style='background-color: rgba(255, 255, 0, 1);'>".$data->durasi_lelang_hari."</button>";
                } elseif($data->durasi_lelang_hari >= 90 && $data->durasi_lelang_hari < 120) {
                    return "<button class='btn btn-block' style='background-color: rgba(255, 153, 51);'>".$data->durasi_lelang_hari."</button>";
                } else {
                    return "<button class='btn btn-block' style='background-color: rgba(255, 51, 51);'>".$data->durasi_lelang_hari."</button>";
                }
            })
            ->editColumn("kdkategori", function($data) {
                switch ($data->kdkategori) {
                    case '0':
                        return "AU";
                        break;
                    case '1':
                        return "Barang";
                        break;
                    case '2':
                        return "Pekerjaan Kontruksi";
                        break;
                    case '3':
                        return "Jasa Konsultansi (Badan Usaha)";
                        break;
                    case '4':
                        return "Jasa Konsultansi (Orang)";
                        break;
                    case '5':
                        return "Jasa Lainnya";
                        break;
                    default:
                        return "Cadangan";
                        break;
                }
            })
            ->editColumn("kdjnskon", function($data) {
                switch ($data->kdjnskon) {
                    case '1':
                        return "MYC Baru";
                        break;
                    case '2':
                        return "MYC Lanjutan";
                        break;
                    case '3':
                        return "MYC Usulan";
                        break;
                    default:
                        return "SYC";
                        break;
                }
            })
            ->editColumn("status_tender", function($data) {
                return ucfirst($data->status_tender);
            })
            ->editColumn('rmp', function($data) {
                return number_format(intval($data->rmp),0,",",".");
            })
            ->editColumn('phln', function($data) {
                return number_format(intval($data->phln),0,",",".");
            })
            ->editColumn('sbsn', function($data) {
                return number_format(intval($data->sbsn),0,",",".");
            })
            ->editColumn('sumber_dana_total', function($data) {
                return number_format(intval($data->sumber_dana_total),0,",",".");
            })
            ->filterColumn('sumber_dana', function($query, $keyword) use ($request) {
                return;
            })
            ->filterColumn('nmupt', function($query, $keyword) use ($request) {
                return $query->where('upt.nama_satker', 'like', '%'.$keyword.'%');
            })
            ->filterColumn('nmuker', function($query, $keyword) use ($request) {
                return $query->where('uker.unit_kerja', 'like', '%'.$keyword.'%');
            })
            ->filterColumn('nmsatkerjoin', function($query, $keyword) use ($request) {
                return $query->where('upt.nama_satker', 'like', '%'.$keyword.'%');
            })
            ->rawColumns(['durasi_lelang_hari'])
            ->toJson();
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