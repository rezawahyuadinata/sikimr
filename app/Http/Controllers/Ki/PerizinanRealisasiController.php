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
use App\Helpers\AppHelper;

//MODEL//
use App\Model\Ki\PerizinanRealisasiModel;

class PerizinanRealisasiController extends MYController
{
    public function index() {
        if(empty(request("perizinan_id"))) {
            return redirect(url('ki/perizinan'));
        }
        $data = $this->data;
        $data->perizinan = DB::table("tbl_api_daftar_perizinan")
            ->where("id", request('perizinan_id'));
        if($data->perizinan->count() == 0) {
            return abort(404);
        }

        $data->perizinan = $data->perizinan->first();
        
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_api_daftar_perizinan_realisasi')
            ->where("perizinan_id", request('perizinan_id'));

        return DataTables::queryBuilder($queryBuilder)
            // ->editColumn('bulan', function($data) {
            //     return AppHelper::getMonthIndo($data->bulan);
            // })
            ->editColumn("volume_realisasi", function($data) {
                return number_format($data->volume_realisasi,2,",",".");
            })
            ->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            "tahun" => 'required',
            "bulan" => 'required',
            "volume_realisasi" => 'required',
        ])->setAttributeNames([
            "tahun" => "Tahun",
            "bulan" => "Bulan",
            "volume_realisasi" => "Volume Realisasi",
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PerizinanRealisasiModel;
        $postdata = request()->all();

        $data->fill($postdata);
        // $data->created_by  = Auth::user()->id;
        // $data->created_at  = date('Y-m-d H:i:s');
        
        $data->save();

        $avg = DB::table("tbl_api_daftar_perizinan_realisasi")
            ->where("perizinan_id", $postdata["perizinan_id"])
            ->select(DB::raw("SUM(volume_realisasi) / count(volume_realisasi) avg"))
            ->first()
            ->avg;
        $dt = DB::table("tbl_api_daftar_perizinan")
            ->where("id", $postdata["perizinan_id"])
            ->update([
                'volume_realisasi' => $avg
            ]);

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

        $data = PerizinanRealisasiModel::findOrfail($request->id);

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
        DB::beginTransaction();

        $data = PerizinanRealisasiModel::findOrfail($id);
        $avg = DB::table("tbl_api_daftar_perizinan_realisasi")
            ->where("perizinan_id", $id)
            ->select(DB::raw("SUM(volume_realisasi) / count(volume_realisasi) avg"))
            ->first()
            ->avg;
        DB::table("tbl_api_daftar_perizinan")
            ->where("id", $data->first()->perizinan_id)
            ->update([
                'volume_realisasi' => $avg
            ]);
        $data->delete();

        DB::commit();

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

    public function rata()
    {
        $perizinan_id = request("perizinan_id");
        $avg = DB::table("tbl_api_daftar_perizinan_realisasi")
            ->where("perizinan_id", $perizinan_id)
            ->select(DB::raw("SUM(volume_realisasi) / count(volume_realisasi) avg"))
            ->first()
            ->avg;
        $avg = number_format($avg, 2);

        return response()->json([
            'status' => 1,
            'data' => $avg
        ]);
    }
}
