<?php

namespace App\Http\Controllers\Formulir;

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
use App\Model\Master\KriteriaDampakModel;
use App\Model\Master\KriteriaKemungkinanModel;
use App\Model\Master\KriteriaModel;
use App\Model\Master\LevelResikoModel;
use App\Model\Master\LingkupResikoModel;
use App\Model\Master\MemadaiModel;
use App\Model\Master\TahapKegiatanModel;
use App\Model\Master\SumberResikoModel;
use App\Model\Master\KategoriResikoModel;
use App\Model\Master\InovasiPengendalianModel;
use App\Model\Master\AlokasiSumberDayaModel;
use App\Model\Master\ResponResikoModel;
use App\Model\Master\PerhitunganNilaiModel;
use App\Model\Master\BalaiTeknisModel;
use App\Model\Master\JadwalModel;

use App\Model\Formulir\PaketPekerjaanModel;
use App\Model\Formulir\PaketSasaranT3Model;
use App\Model\Formulir\PaketPemangkuKepentinganModel;
use App\Model\Formulir\PaketTujuanModel;
use App\Model\Formulir\ResikoModel;

class PaketPekerjaanController extends MYController
{
    public function index() {
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_paket_pekerjaan')->select('*');

        if ($request->tahun) {
            $queryBuilder->where('tahun', $request->tahun);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function create($id)
    {
        $this->data->paket_pekerjaan = PaketPekerjaanModel::findOrfail($id);
        $this->data->kriteria_dampak = KriteriaDampakModel::get();
        $this->data->kriteria_kemungkinan = KriteriaKemungkinanModel::get();
        $this->data->kriteria = KriteriaModel::get();
        $this->data->level = LevelResikoModel::get();
        $this->data->lingkup = LingkupResikoModel::get();
        $this->data->memadai = MemadaiModel::get();
        $this->data->tahap = TahapKegiatanModel::get();
        $this->data->sumber_risiko = SumberResikoModel::get();
        $this->data->kategori = KategoriResikoModel::get();
        $this->data->inovasi = InovasiPengendalianModel::get();
        $this->data->alokasi = AlokasiSumberDayaModel::get();
        $this->data->respon = ResponResikoModel::get();
        $this->data->balai = BalaiTeknisModel::get();
        $this->data->jadwal = JadwalModel::whereNull('parent_id')->get();

        foreach ($this->data->jadwal as $key => $value) {
            $value->child = JadwalModel::where('parent_id', $value->id)->get();
            $no = 0;
            for ($i=1; $i <= 12; $i++) { 
                for ($y=1; $y <= 4; $y++) { 
                    $text = 'minggu_'.$no;
                    $value->{$text} = DB::table('t_jadwal')->where('paket_id', $id)->where('jadwal_id', $value->id)->where('minggu', $no)->first();
                    $no++;
                }
            }

            $no = 0;
            foreach ($value->child as $idx => $row) {
                for ($i=1; $i <= 12; $i++) { 
                    for ($y=1; $y <= 4; $y++) { 
                        $text = 'minggu_'.$no;
                        $row->{$text} = DB::table('t_jadwal')->where('paket_id', $id)->where('jadwal_id', $row->id)->where('minggu', $no)->first();
                        $no++;
                    }
                }
            }
        }

        $this->data->peta = KriteriaKemungkinanModel::orderBy('id_kriteria_kemungkinan', 'desc')->get();

        foreach ($this->data->peta as $key => $value) {
            $value->dampak = KriteriaDampakModel::orderBy('id_kriteria_dampak', 'asc')->get();
            foreach ($value->dampak as $idx => $row) {
                $row->nilai = PerhitunganNilaiModel::where('kemungkinan', $value->id_kriteria_kemungkinan)
                                                    ->where('dampak', $row->id_kriteria_dampak)
                                                    ->first();
            }
        }

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->tipe == 'sasaran') {
            $this->_store_sasaran($request);
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $this->_store_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $this->_store_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $this->_store_resiko($request);
        } else if ($request->tipe == 'jadwal') {
            $this->_store_jadwal($request);
        }

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    private function _store_sasaran($request)
    {
        $data = new PaketSasaranT3Model;
        $data->fill($request->all());
        $data->paket_sasaran_id = Str::uuid();
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_pemangku_kepentingan($request)
    {
        $data = new PaketPemangkuKepentinganModel;
        $data->fill($request->all());
        $data->id = Str::uuid();
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_tujuan($request)
    {
        $data = new PaketTujuanModel;
        $data->fill($request->all());
        $data->id = Str::uuid();
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_resiko($request)
    {
        $data = new ResikoModel;
        $data->fill($request->all());
        $data->id = Str::uuid();
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_jadwal($request)
    {
        $data_exist = DB::table('t_jadwal')->where('paket_id', $request->paket_id)->where('jadwal_id', $request->m_jadwal_id)->delete();
        foreach ($request->minggu_id as $key => $value) {
            $data = array(
                'paket_id'  => $request->paket_id,
                'jadwal_id' => $request->m_jadwal_id,
                'minggu' => $key,
            );

            DB::table('t_jadwal')->insert($data);
        }
    }

    public function update(Request $request)
    {
        if ($request->tipe == 'sasaran') {
            $this->_update_sasaran($request);
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $this->_update_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $this->_update_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $this->_update_resiko($request);
        }

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_sasaran($request)
    {
        $data = PaketSasaranT3Model::findOrfail($request->paket_sasaran_id);
        $data->fill($request->all());
        $data->paket_sasaran_id = Str::uuid();
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_pemangku_kepentingan($request)
    {
        $data = PaketPemangkuKepentinganModel::findOrfail($request->pemangku_kepentingan_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_tujuan($request)
    {
        $data = PaketTujuanModel::findOrfail($request->tujuan_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_resiko($request)
    {
        $data = ResikoModel::findOrfail($request->resiko_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'sasaran') {
            $data = $this->_get_sasaran($request);
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $data = $this->_get_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $data = $this->_get_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $data = $this->_get_resiko($request);
        } else if ($request->tipe == 'jadwal') {
            $data = $this->_get_jadwal($request);
        }
        
        return $data;
    }

    public function _get_sasaran($request) {
        $queryBuilder = DB::table('tbl_paket_sasaran_t3')->select('paket_sasaran_id', 'sasaran_manual as sasaran', 'indikator_manual as indikator', 'kegiatan_manual as kegiatan', 'kegiatan_tujuan');

        if ($request->paket_id) {
            $queryBuilder->where('tbl_paket_sasaran_t3.paket_id', $request->paket_id);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_pemangku_kepentingan($request) {
        $queryBuilder = DB::table('tbl_paket_pemangku_kepentingan')->select('*');

        if ($request->paket_id) {
            $queryBuilder->where('tbl_paket_pemangku_kepentingan.paket_id', $request->paket_id);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_tujuan($request) {
        $queryBuilder = DB::table('tbl_paket_tujuan')->select('*');

        if ($request->paket_id) {
            $queryBuilder->where('tbl_paket_tujuan.paket_id', $request->paket_id);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_resiko($request) {
        $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'tbl_paket_sasaran_t3.kegiatan_tujuan');
        $queryBuilder->leftJoin('tbl_paket_sasaran_t3', 'tbl_paket_sasaran_t3.paket_sasaran_id', '=', 'tbl_resiko.paket_sasaran_id');

        if ($request->paket_id) {
            $queryBuilder->where('tbl_resiko.paket_id', $request->paket_id);
        }

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    private function _get_jadwal($request)
    {
        $this->data->jadwal = JadwalModel::whereNull('parent_id')->get();

        foreach ($this->data->jadwal as $key => $value) {
            $value->child = JadwalModel::where('parent_id', $value->id)->get();
            $no = 1;
            for ($i=1; $i <= 12; $i++) { 
                for ($y=1; $y <= 4; $y++) { 
                    $value->{$no} = DB::table('t_jadwal')->where('paket_id', $id)->where('jadwal_id', $value->id)->where('minggu', $no)->first();
                    $no++;
                }
            }

            $no = 1;
            foreach ($value->child as $idx => $row) {
                for ($i=1; $i <= 12; $i++) { 
                    for ($y=1; $y <= 4; $y++) { 
                        $row->{$no} = DB::table('t_jadwal')->where('paket_id', $id)->where('jadwal_id', $value->id)->where('minggu', $no)->first();
                        $no++;
                    }
                }
            }
        }
    }

    public function delete_data($tipe, $id) {
        if ($tipe == 'sasaran') {
            $data = $this->_delete_sasaran($id);
        } else if ($tipe == 'pemangku_kepentingan') {
            $data = $this->_delete_pemangku_kepentingan($id);
        } else if ($tipe == 'tujuan') {
            $data = $this->_delete_tujuan($id);
        } else if ($tipe == 'resiko') {
            $data = $this->_delete_resiko($id);
        } 

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_sasaran($id) {
        $data = PaketSasaranT3Model::findOrfail($id)->delete();

        return true;
    }

    private function _delete_pemangku_kepentingan($id) {
        $data = PaketPemangkuKepentinganModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_tujuan($id) {
        $data = PaketTujuanModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_resiko($id) {
        $data = ResikoModel::findOrfail($id)->delete();

        return true;
    }
}
