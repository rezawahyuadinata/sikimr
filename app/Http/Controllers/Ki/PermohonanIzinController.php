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
use App\Model\Ki\PermohonanIzinModel;

class PermohonanIzinController extends MYController
{
    public function index()
    {
        $data = $this->data;
        // $this->data->eselon = DB::table("eselon-2")
        //     ->where('level_user', 'balai')
        //     ->get();

        // $this->data->tujuan_ijin = DB::table("m_tujuan_ijin")
        //     ->get();
        $data->upt_perizinan = DB::table("tbl_api_permohonan_izin")
            ->whereNotNull("nama_balai")
            ->select("nama_balai")
            ->groupBy("nama_balai")
            ->get();
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_api_permohonan_izin')
            ->select(
                'tbl_api_permohonan_izin.*',
                // DB::raw("DATEDIFF(now(), tanggal_surat) as verifikasi"),
                DB::raw("DATEDIFF(now(), tanggal_surat_edit) as kategori_status"),
                DB::raw("DATEDIFF(now(), tanggal_surat_edit) as sk_menteri"),
                // DB::raw("DATEDIFF(now(), tanggal_surat) as REKOMTEK"),
            );
        foreach ($request['filters'] as $key => $value) {
            if ($value) {
                if ($key == "perizinan-start") {
                    $queryBuilder->where(DB::raw("tanggal_surat"), ">", $value);
                } else if ($key == "perizinan-end") {
                    $queryBuilder->where(DB::raw("tanggal_surat"), "<", \Carbon\Carbon::parse($value)->addDays(1)->format("Y-m-d"));
                } else {
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
            // })
            ->editColumn('kategori_status', function ($data) {
                if ($data->status == "Sudah Dikirim") {
                    return "Selesai";
                } elseif ($data->kategori_status == 6) {
                    return "1 Hari Lagi";
                } else if ($data->kategori_status == 7) {
                    return "Hari ini Batas Akhir";
                } else if ($data->kategori_status > 7) {
                    return "Terlambat " . $data->kategori_status . " Hari";
                } else {
                    return "Proses";
                }
            })
            ->editColumn("sk_menteri", function ($data) {
                // if($data->status == "Sudah Dikirim") {
                //     return "Sudah Dikirim";
                // }

                if ($data->sk_menteri == 6) {
                    return "1 Hari Lagi";
                } else if ($data->sk_menteri == 7) {
                    return "Hari ini Batas Akhir";
                } else if ($data->sk_menteri > 7) {
                    return "Terlambat " . ($data->sk_menteri - 8) . " Hari Kalender";
                } else {
                    return "Belum Batas Akhir";
                }
            })
            ->editColumn('tujuan_penggunaan_sumberair', function ($data) {
                if ($data->jenis_permohonan == "Pengusahaan Sumber Daya Air") {
                    return $data->tujuan_penggunaan_sumberair;
                }
                return "";
            })
            // ->editColumn("REKOMTEK", function($data) {
            //     if($data->REKOMTEK <= 60) {
            //         return "Masih Berlaku";
            //     } else {
            //         return "Sudah Tidak Berlaku";
            //     }
            // })
            ->setRowClass(function ($data) {
                if ($data->sk_menteri > 7 && $data->status != "Sudah Dikirim") {
                    return "bg-danger";
                }
            })
            ->toJson();

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request)
    {
        // $validate = Validator::make($request->all(), [
        //     "tanggal_backup" => 'required',
        //     "nomor_surat" => 'required',
        //     "tanggal_surat" => 'required',
        //     "perihal" => 'required',
        //     "lama_izin" => 'required',
        //     "volume_yang_diizinkan" => 'required',
        //     "nama_pemohon" => 'required',
        //     "nama_perusahaan" => 'required',
        //     "jenis_permohonan" => 'required',
        //     "sumber_air" => 'required',
        //     "nama_balai" => 'required',
        //     "tujuan_penggunaan_airdayaair" => 'required',
        //     "tujuan_penggunaan_sumberair" => 'required',
        // ])->setAttributeNames([
        //     "tanggal_backup" => "Tanggal Backup",
        //     "nomor_surat" => "Nomor Surat",
        //     "tanggal_surat" => "Tanggal Surat",
        //     "perihal" => "Perihal",
        //     "lama_izin" => "Lama Izin",
        //     "volume_yang_diizinkan" => "Volume Yang Diizinkan",
        //     "nama_pemohon" => "Nama Pemohon",
        //     "nama_perusahaan" => "Nama Perusahaan",
        //     "jenis_permohonan" => "Jenis Permohonan",
        //     "sumber_air" => "SUmber Air",
        //     "nama_balai" => "Nama Balai",
        //     "tujuan_penggunaan_airdayaair" => "Penggunanan Airdaya Air",
        //     "tujuan_penggunaan_sumberair" => "Penggunaan Sumber Air"
        // ]);

        // if ($validate->fails()) {

        //     $response = [
        //         'status'    => false,
        //         'message'   => $validate->errors()
        //     ];
        //     return json_encode($response);
        // }

        DB::beginTransaction();

        $data = new PermohonanIzinModel;

        $data->fill($request->all());
        $data->created_by  = Auth::user()->id;
        $data->created_at  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function update(Request $request)
    {
        // $validate = Validator::make($request->all(), [
        //     'NAMA_PERUSAHAAN_PERORANGAN' => 'required',
        //     'PROVINSI' => 'required',
        //     'KAB_KOTA' => 'required',
        //     'KECAMATAN' => 'required',
        //     'DESA_KEL' => 'required',
        //     'BBWS_BWS' => 'required',
        //     'TGL_PENGAJUAN' => 'required',
        //     'TGL_REKOMTEK' => 'required',
        //     'TGL_TERBIT' => 'required',
        //     'JNS_IJIN' => 'required',
        //     'TUJUAN_IJIN_ID' => 'required',
        //     'TGL_MONEV' => 'required',
        //     'STATUS' => 'required',
        //     'PENGADUAN' => 'required',
        // ])->setAttributeNames([
        //     'NAMA_PERUSAHAAN_PERORANGAN' => 'Nama PT',
        //     'PROVINSI' => 'Provinsi',
        //     'KAB_KOTA' => 'Kab / Kota',
        //     'KECAMATAN' => 'Kecamatan',
        //     'DESA_KEL' => 'Desa Kel',
        //     'WILAYAH_SUNGAI' => 'Wilayah Sungai',
        //     'TGL_PENGAJUAN' => 'Tgl Pengajuan',
        //     'TGL_REKOMTEK' => 'Tgl Rekomtek',
        //     'TGL_TERBIT' => 'Tgl Terbit',
        //     'JNS_IJIN' => 'Jenis Ijin',
        //     'TUJUAN_IJIN_ID' => 'Tujuan Ijin',
        //     'TGL_MONEV' => 'Tgl Monev',
        //     'STATUS' => 'Status',
        //     'PENGADUAN' => 'Pengaduan',
        // ]);

        // if ($validate->fails()) {

        //     $response = [
        //         'status'    => false,
        //         'message'   => $validate->errors()
        //     ];
        //     return json_encode($response);
        // }

        DB::beginTransaction();

        $data = PermohonanIzinModel::findOrfail($request->id);

        $data->fill($request->all());
        // $data->updated_by  = Auth::user()->ID;
        // $data->updated_at  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id)
    {
        $data = PermohonanIzinModel::findOrfail($id)->delete();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    public function job()
    {
        try {
            $response = Artisan::call("command:get-permohonan-izin");
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
