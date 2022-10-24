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

class ProfileController extends MYController
{
    public function index() {
        $data = $this->data;
        $data->tanggal_backup = DB::table("tbl_api_profiles")
            ->select("tanggal_backup")
            ->groupBy("tanggal_backup")
            ->orderBy("id", "desc")
            ->limit(100)
            ->get()
            ->toArray();
        $data->tanggal_backup = array_column($data->tanggal_backup, "tanggal_backup");

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_api_profiles')
            ->where("tanggal_backup", $request['filters']['tanggal_backup'])
            ->where("thang", $request['filters']['thang']);
        foreach ($request['filters'] as $key => $value) {
            if(in_array($key, ["real_keu", 'real_fisik'])) {
                if($value == "Tampil") {
                    $queryBuilder->where($key, 'like', "0%");
                }
            }

            if($key == "progresKeu"){
                if($value == 1) {
                    $queryBuilder->where("deviasi", '>', 10);
                } elseif($value == 2) {
                    $queryBuilder->where("deviasi", '>', 0)->where('deviasi', '<=', 10);
                }elseif($value == 3) {
                    $queryBuilder->where("deviasi", '>', -10)->where('deviasi', '<=', 0);
                }elseif($value == 4) {
                    $queryBuilder->where("deviasi", '>', -30)->where('deviasi', '<=', -10);
                } elseif($value == 5){
                    $queryBuilder->where("deviasi", '<=', -30);
                }
            }

            if($key == "progresFis"){
                if($value == 1) {
                    $queryBuilder->where("deviasi_fisik", '>', 10);
                } elseif($value == 2) {
                    $queryBuilder->where("deviasi_fisik", '>', 0)->where('deviasi_fisik', '<=', 10);
                }elseif($value == 3) {
                    $queryBuilder->where("deviasi_fisik", '>', -10)->where('deviasi_fisik', '<=', 0);
                }elseif($value == 4) {
                    $queryBuilder->where("deviasi_fisik", '>', -30)->where('deviasi_fisik', '<=', -10);
                } elseif($value == 5){
                    $queryBuilder->where("deviasi_fisik", '<=', -30);
                }
            }
        }

        return DataTables::queryBuilder($queryBuilder)
            ->editColumn("paguspan", function($data) {
                return number_format($data->paguspan,0,",",".");
            })
            ->editColumn("deviasi", function($data) {
                if($data->deviasi > 10) {
                    return "<button class='btn btn-block' style='background-color: #00cc00;color:white'>".$data->deviasi."%</button>";
                } elseif($data->deviasi > 0 && $data->deviasi <= 10) {
                    return "<button class='btn btn-block' style='background-color: #6666FF;color:white'>".$data->deviasi."%</button>";
                } elseif($data->deviasi > -10 && $data->deviasi <= 0) {
                    return "<button class='btn btn-block' style='background-color: #808080;color:white'>".$data->deviasi."%</button>";
                } elseif($data->deviasi > -30 && $data->deviasi <= -10) {
                    return "<button class='btn btn-block' style='background-color: #cccc00;color:white'>".$data->deviasi."%</button>";
                } else {
                    return "<button class='btn btn-block' style='background-color: #ff6666;color:white'>".$data->deviasi."%</button>";
                }
            })
            ->editColumn("deviasi_fisik", function($data) {
                if($data->deviasi_fisik > 10) {
                    return "<button class='btn btn-block' style='background-color: #00cc00;color:white'>".$data->deviasi_fisik."%</button>";
                } elseif($data->deviasi_fisik > 0 && $data->deviasi_fisik <= 10) {
                    return "<button class='btn btn-block' style='background-color: #6666FF;color:white'>".$data->deviasi_fisik."%</button>";
                } elseif($data->deviasi_fisik > -10 && $data->deviasi_fisik <= 0) {
                    return "<button class='btn btn-block' style='background-color: #808080;color:white'>".$data->deviasi_fisik."%</button>";
                } elseif($data->deviasi_fisik > -30 && $data->deviasi_fisik <= -10) {
                    return "<button class='btn btn-block' style='background-color: #cccc00;color:white'>".$data->deviasi_fisik."%</button>";
                } else {
                    return "<button class='btn btn-block' style='background-color: #ff6666;color:white'>".$data->deviasi_fisik."%</button>";
                }
            })
            ->editColumn("tglkirim", function($data) {
                $tglkirim = date_create($data->tglkirim);
                $tgl_skrg = date_create(date("Y-m-d H:i:s"));
                $date_diff = intval(date_diff($tglkirim, $tgl_skrg)->format("%R%a"));
                if($date_diff > 14) {
                    return "<button class='btn btn-block' style='background-color: red;color:white'>".$data->tglkirim."</button>";
                } else if($date_diff > 7) {
                    return "<button class='btn btn-block' style='background-color: orange;color:white'>".$data->tglkirim."</button>";
                } else {
                    return "<button class='btn btn-block' style='background-color: green;color:white'>".$data->tglkirim."</button>";
                }
            })
            ->rawColumns(['deviasi', 'deviasi_fisik', 'tglkirim'])
            ->toJson();
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
