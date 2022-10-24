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

//MODEL//
use App\Model\Ki\PerizinanModel;

class PerizinanController extends MYController
{
    public function index() {
        $data = $this->data;
        // $this->data->eselon = DB::table("eselon-2")
        //     ->where('level_user', 'balai')
        //     ->get();

        // $this->data->tujuan_ijin = DB::table("m_tujuan_ijin")
        //     ->get();
        $data->upt_perizinan = DB::table("tbl_api_daftar_perizinan")
            ->whereNotNull("nama_balai")
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_api_daftar_perizinan')
            ->select(
                'tbl_api_daftar_perizinan.*', 
                DB::raw("(CASE 
                    WHEN NOW() <= masa_berlaku THEN CONCAT('Berlaku Sampai Tanggal ', DATE_ADD(tanggal_surat, INTERVAL 5 YEAR))
                    ELSE 'SUDAH HABIS'
                END) as masa_berlaku")
            );
        foreach ($request['filters'] as $key => $value) {
            if($value) {
                if($key == "perizinan-start"){
                    $queryBuilder->where(DB::raw("tanggal_surat"), ">", $value);
                }else if($key == "perizinan-end"){
                    $queryBuilder->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($value)->addDays(1)->format("Y-m-d"));
                }else if($key == "nama_balai_fil"){
                    $queryBuilder->where("nama_balai", "like", "%$value%");
                }else {
                    $queryBuilder->where($key, 'like', "%$value%");
                }
            }
        }

        return DataTables::queryBuilder($queryBuilder)
            // ->editColumn("verifikasi", function($data) {
            //     if($data->verifikasi == 3) {
            //         return "1 Hari Lagi";
            //     } else if($data->verifikasi == 4) {
            //         return "Hari ini Batas Akhir";
            //     } else if($data->verifikasi > 4) {
            //         return "Terlambat ".$data->verifikasi." Hari";
            //     } else {
            //         return "Belum Batas Akhir";
            //     }
            // })->editColumn("sk_menteri", function($data) {
            //     if($data->sk_menteri == 6) {
            //         return "1 Hari Lagi";
            //     } else if($data->sk_menteri == 7) {
            //         return "Hari ini Batas Akhir";
            //     } else if($data->sk_menteri > 7) {
            //         return "Terlambat ".$data->sk_menteri." Hari";
            //     } else {
            //         return "Belum Batas Akhir";
            //     }
            // })
            // ->editColumn("REKOMTEK", function($data) {
            //     if($data->REKOMTEK <= 60) {
            //         return "Masih Berlaku";
            //     } else {
            //         return "Sudah Tidak Berlaku";
            //     }
            // })
            ->editColumn("pengaduan", function($data) {
                if($data->pengaduan == "ADA") {
                    return "<a href='".url('ki/surat')."'>ADA</a>";
                }
            })
            ->editColumn("volume_yang_diizinkan", function($data) {
                return number_format($data->volume_yang_diizinkan,2,",",".");
            })
            ->editColumn("volume_realisasi", function($data) {
                return number_format($data->volume_realisasi,2,",",".");
            })
            ->editColumn("dokumen_hasil_monev", function($data) {
                if($data->dokumen_hasil_monev) {
                    return  "<a target='_blank' href='".url($data->dokumen_hasil_monev)."'>Download</a>";
                } else {
                    return '';
                }
            })
            ->filterColumn('masa_berlaku', function($query, $keyword) {})
            // ->editColumn("jenis_permohonan", function($data){
            //     if(strpos($data->jenis_permohonan, "usaha") !== false || strpos($data->jenis_permohonan, "laksana") !== false) {
            //         return "Pengusahaan";
            //     } elseif(strpos($data->jenis_permohonan, "guna") !== false) {
            //         return "Penggunaan";
            //     } else {
            //         return $data->jenis_permohonan;
            //     }
            // })
            ->rawColumns(['dokumen_hasil_monev', 'pengaduan'])
            ->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            "status_monev" => 'required',
        ])->setAttributeNames([
            "status_monev" => "Status Monev",
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PerizinanModel;
        $postdata = request()->all();

        $file = $request->file('dokumen_hasil_monev');
        if($file) {
            if($file->getClientOriginalExtension() != "pdf") {
                $response = [
                    'status'    => false,
                    'message'   => "File hanya dapat berupa pdf"
                ];
                return json_encode($response);
            }
    
            if($file->getSize() > 1000000 )  {
                $response = [
                    'status'    => false,
                    'message'   => "File lebih dari 1 MB"
                ];
                return json_encode($response);
            }
    
            $filename = time().$file->getClientOriginalName();

            if (!file_exists(public_path("dokumen_hasil_monev"))) {
                mkdir(public_path("dokumen_hasil_monev"));
            }

            $file->move(public_path("dokumen_hasil_monev"), $filename);
            // $request->file("dokumen_hasil_monev")->storeAs(public_path("dokumen_hasil_monev"),$filename);
            $postdata['dokumen_hasil_monev'] = "dokumen_hasil_monev/".$filename;
        }


        $data->fill($postdata);
        // $data->created_by  = Auth::user()->id;
        // $data->created_at  = date('Y-m-d H:i:s');
        
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
            "status_monev" => 'required',
        ])->setAttributeNames([
            "status_monev" => "Status Monev",
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PerizinanModel::findOrfail($request->id);

        $postdata = request()->all();

        $file = $request->file('dokumen_hasil_monev');
        if($file) {
            if($file->getClientOriginalExtension() != "pdf") {
                $response = [
                    'status'    => false,
                    'message'   => "File hanya dapat berupa pdf"
                ];
                return json_encode($response);
            }
    
            if($file->getSize() > 1000000 )  {
                $response = [
                    'status'    => false,
                    'message'   => "File lebih dari 1 MB"
                ];
                return json_encode($response);
            }
    
            $filename = time().$file->getClientOriginalName();

            if (!file_exists(public_path("dokumen_hasil_monev"))) {
                mkdir(public_path("dokumen_hasil_monev"));
            }

            $file->move(public_path("dokumen_hasil_monev"), $filename);
            // $request->file("dokumen_hasil_monev")->storeAs(public_path("dokumen_hasil_monev"),$filename);
            $postdata['dokumen_hasil_monev'] = "dokumen_hasil_monev/".$filename;
        }

        $data->fill($postdata);
        // $data->updated_by  = Auth::user()->ID;
        // $data->updated_at  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id) {
        $data = PerizinanModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    public function job()
    {
        try {
            $response = Artisan::call("command:get-perizinan");
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
