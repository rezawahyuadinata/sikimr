<?php

namespace App\Http\Controllers\Ki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

//MODEL//
use App\Model\Ki\PengadaanTanahModel;

class PengadaanTanahController extends MYController
{
    public function index() {
        $satker = DB::table("satker")
            ->where("id", Auth::user()->satker_id)
            ->first();
        
        $this->data->pakets = DB::table("tbl_paket_pekerjaan")
            ->where("kdsatker", $satker->KODE ?? null)
            ->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_pelaksanaan_pengadaan_tanah')
            ->leftJoin("tbl_paket_pekerjaan", 'tbl_pelaksanaan_pengadaan_tanah.kdpaket', '=', 'tbl_paket_pekerjaan.kdpaket')
            ->select('tbl_pelaksanaan_pengadaan_tanah.*', 'nmpaket');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'kdpaket' => 'required',
            'satker_ppk' => 'required',
            'satker_nama' => 'required',
            'kebutuhan_luas' => 'required',
            'kebutuhan_jumlah_bidang' => 'required',
            'kebutuhan_anggaran' => 'required',
            'realisasi_luas' => 'required',
            'realisasi_jumlah_bidang' => 'required',
            'realisasi_anggaran' => 'required',
            'sisa_luas' => 'required',
            'sisa_jumlah_bidang' => 'required',
            'sisa_anggaran' => 'required',
            'alokasi_anggaran' => 'required',
            'penetapan_lokasi_no' => 'required',
            'penetapan_lokasi_masa_laku_awal' => 'required',
            'penetapan_lokasi_masa_laku_akhir' => 'required',
            'penetapan_lokasi_perpanjangan_dari' => 'required',
            'penetapan_lokasi_perpanjangan_sampai' => 'required',
            'monev_status' => 'required',
            'monev_output' => 'required',
            'penyebab_terlambat' => 'required',
            'resiko_kemunduran_masa_konstruksi' => 'required',
            'resiko_output' => 'required',
            'resiko_outcome' => 'required',
            'resiko_penerima_manfaat' => 'required',
        ])->setAttributeNames([
            'kdpaket' => 'Nama Paket',
            'satker_ppk' => 'Satuan Kerja PPK',
            'satker_nama' => 'Nama Satuan Kerja',
            'kebutuhan_luas' => 'Kebutuhan Luas (Ha)',
            'kebutuhan_jumlah_bidang' => 'Kebutuhan Jumlah Bidang',
            'kebutuhan_anggaran' => 'Kebutuhan Anggaran',
            'realisasi_luas' => 'Realisasi Luas',
            'realisasi_jumlah_bidang' => 'Realisasi Jumlah Bidang',
            'realisasi_anggaran' => 'Realisasi Anggaran',
            'sisa_luas' => 'Sisa Luas',
            'sisa_jumlah_bidang' => 'Sisa Jumlah Bidang',
            'sisa_anggaran' => 'Sisa Anggaran',
            'alokasi_anggaran' => 'Jumlah Alokasi Anggaran',
            'penetapan_lokasi_no' => 'Nomor Penetapan Lokasi',
            'penetapan_lokasi_masa_laku_awal' => 'Awal Masa Laku Penetapan Lokasi',
            'penetapan_lokasi_masa_laku_akhir' => 'Akhir Masa Laku Penetapan Lokasi',
            'penetapan_lokasi_perpanjangan_dari' => 'Penetapan Lokasi Perpanjangan Dari',
            'penetapan_lokasi_perpanjangan_sampai' => 'Penetapan Lokasi Perpanjangan Sampai',
            'monev_status' => 'Monitoring dan Evaluasi Status',
            'monev_output' => 'Monitoring dan Evaluasi Output',
            'penyebab_terlambat' => 'Penyebab Terlambat',
            'resiko_kemunduran_masa_konstruksi' => 'Potensi Resiko Kemunduran Masa Konstruksi',
            'resiko_output' => 'Potensi Resiko Kemunduran Output',
            'resiko_outcome' => 'Potensi Resiko Kemunduran Outcome',
            'resiko_penerima_manfaat' => 'Potensi Resiko Kemunduran Penerima Manfaat',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new PengadaantanahModel;
        $saveData = request()->all();
        if($saveData['penyebab_terlambat']) {
            $penyebab_terlambat = '';
            foreach($saveData['penyebab_terlambat'] as $penyebab){
                $penyebab_terlambat .= $penyebab.',';
            }
            $saveData['penyebab_terlambat'] = rtrim($penyebab_terlambat, ',');
        }

        $data->fill($saveData);
        $data->created_by  = Auth::user()->id;
        $data->created_at  = date('Y-m-d H:i:s');
        
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
            'kdpaket' => 'required',
            'satker_ppk' => 'required',
            'satker_nama' => 'required',
            'kebutuhan_luas' => 'required',
            'kebutuhan_jumlah_bidang' => 'required',
            'kebutuhan_anggaran' => 'required',
            'realisasi_luas' => 'required',
            'realisasi_jumlah_bidang' => 'required',
            'realisasi_anggaran' => 'required',
            'sisa_luas' => 'required',
            'sisa_jumlah_bidang' => 'required',
            'sisa_anggaran' => 'required',
            'alokasi_anggaran' => 'required',
            'penetapan_lokasi_no' => 'required',
            'penetapan_lokasi_masa_laku_awal' => 'required',
            'penetapan_lokasi_masa_laku_akhir' => 'required',
            'penetapan_lokasi_perpanjangan_dari' => 'required',
            'penetapan_lokasi_perpanjangan_sampai' => 'required',
            'monev_status' => 'required',
            'monev_output' => 'required',
            'penyebab_terlambat' => 'required',
            'resiko_kemunduran_masa_konstruksi' => 'required',
            'resiko_output' => 'required',
            'resiko_outcome' => 'required',
            'resiko_penerima_manfaat' => 'required',
        ])->setAttributeNames([
            'kdpaket' => 'Nama Paket',
            'satker_ppk' => 'Satuan Kerja PPK',
            'satker_nama' => 'Nama Satuan Kerja',
            'kebutuhan_luas' => 'Kebutuhan Luas (Ha)',
            'kebutuhan_jumlah_bidang' => 'Kebutuhan Jumlah Bidang',
            'kebutuhan_anggaran' => 'Kebutuhan Anggaran',
            'realisasi_luas' => 'Realisasi Luas',
            'realisasi_jumlah_bidang' => 'Realisasi Jumlah Bidang',
            'realisasi_anggaran' => 'Realisasi Anggaran',
            'sisa_luas' => 'Sisa Luas',
            'sisa_jumlah_bidang' => 'Sisa Jumlah Bidang',
            'sisa_anggaran' => 'Sisa Anggaran',
            'alokasi_anggaran' => 'Jumlah Alokasi Anggaran',
            'penetapan_lokasi_no' => 'Nomor Penetapan Lokasi',
            'penetapan_lokasi_masa_laku_awal' => 'Awal Masa Laku Penetapan Lokasi',
            'penetapan_lokasi_masa_laku_akhir' => 'Akhir Masa Laku Penetapan Lokasi',
            'penetapan_lokasi_perpanjangan_dari' => 'Penetapan Lokasi Perpanjangan Dari',
            'penetapan_lokasi_perpanjangan_sampai' => 'Penetapan Lokasi Perpanjangan Sampai',
            'monev_status' => 'Monitoring dan Evaluasi Status',
            'monev_output' => 'Monitoring dan Evaluasi Output',
            'penyebab_terlambat' => 'Penyebab Terlambat',
            'resiko_kemunduran_masa_konstruksi' => 'Potensi Resiko Kemunduran Masa Konstruksi',
            'resiko_output' => 'Potensi Resiko Kemunduran Output',
            'resiko_outcome' => 'Potensi Resiko Kemunduran Outcome',
            'resiko_penerima_manfaat' => 'Potensi Resiko Kemunduran Penerima Manfaat',
        ]);
        
        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = PengadaantanahModel::findOrfail($request->id);
        $saveData = request()->all();
        if($saveData['penyebab_terlambat']) {
            $penyebab_terlambat = '';
            foreach($saveData['penyebab_terlambat'] as $penyebab){
                $penyebab_terlambat .= $penyebab.',';
            }
            $saveData['penyebab_terlambat'] = rtrim($penyebab_terlambat, ',');
        }

        $data->fill($saveData);
        $data->updated_by  = Auth::user()->id;
        $data->updated_at  = date('Y-m-d H:i:s');
        
        $data->save();

        DB::commit();
        
        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id) {
        $data = PengadaantanahModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
