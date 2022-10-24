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
use App\Model\Formulir\KomitmenMRModel;
use App\Model\Formulir\TinjauanMRModel;
use App\Model\Formulir\TinjauanDetailMRModel;
use App\Model\Formulir\ResikoInovasiModel;
use App\Model\Formulir\ResikoModel;
use App\Model\Master\KriteriaDampakModel;
use App\Model\Master\KriteriaKemungkinanModel;
use App\Model\Master\LevelResikoModel;
use App\Model\Master\ResponResikoModel;
use App\Model\Master\PerhitunganNilaiModel;

class TinjauanMRController extends MYController
{
    public function index(Request $request)
    {
        $this->data->tinjauan_nomor = $this->_generate_number($this->data->user->kode);
        if ($request->tinjauan_id) {
            $this->data->tinjauan_mr = TinjauanMRModel::with('komitmen_mr')->findOrfail($request->tinjauan_id);
        }

        $queryBuilder = KomitmenMRModel::with('creator');

        if ($this->data->user->level == 'UPR-T3') {
            $queryBuilder->where('satker_id', $this->data->user->satker_id);
        }

        $this->data->komitmen_mr = $queryBuilder->get();

        $this->data->kriteria_dampak = KriteriaDampakModel::get();
        $this->data->kriteria_kemungkinan = KriteriaKemungkinanModel::get();
        $this->data->level = LevelResikoModel::get();
        // $this->data->respon = ResponResikoModel::get();
        $this->data->respon = ResponResikoModel::take(3)->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->tipe == 'tinjauan') {
            $tinjauan_id = $this->_store_tinjauan($request);
        } elseif ($request->tipe == 'tinjauan_detail') {
            $this->_store_tinjauan_detail($request);
        }

        if ($request->tipe == 'tinjauan') {
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan.',
                'data'      => $tinjauan_id
            );

            return json_encode($response);
        } else {
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan.'
            );

            return json_encode($response);
        }
    }

    private function _store_tinjauan($request)
    {
        $tinjauan_id = Str::uuid();
        $tinjauan_nomor = $this->_cek_nomor($request->tinjauan_nomor, $this->data->user->kode);

        $data = new TinjauanMRModel;
        $data->fill($request->all());
        $data->tinjauan_id = $tinjauan_id;
        $data->tinjauan_nomor = $tinjauan_nomor;
        $data->level = $this->data->user->level;
        $data->satker_id = $this->data->user->satker_id;
        $data->eselon1_id = $this->data->user->eselon1_id;
        $data->eselon2_id = $this->data->user->eselon2_id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        return $tinjauan_id;
    }

    private function _store_tinjauan_detail($request)
    {
        $data = new TinjauanDetailMRModel;
        $data->fill($request->all());
        $data->tinjauan_detail_id = Str::uuid();
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function update(Request $request)
    {
        if ($request->tipe == 'tinjauan_detail') {
            $this->_update_tinjauan_detail($request);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_tinjauan_detail($request)
    {
        $data = TinjauanDetailMRModel::findOrfail($request->tinjauan_detail_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'tinjauan_detail') {
            $data = $this->_get_tinjauan_detail($request);
        } else if ($request->tipe == 'nilai') {
            $data = PerhitunganNilaiModel::where('kemungkinan', $request->id_kriteria_kemungkinan)
                ->where('dampak', $request->id_kriteria_dampak)
                ->first();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        } else if ($request->tipe == 'tinjauan') {
            $data = LevelResikoModel::where('nilai_awal', '<=', $request->number)
                ->where('nilai_akhir', '>=', $request->number)
                // ->get();
                ->first();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        }

        return $data;
    }


    public function _get_tinjauan_detail($request)
    {
        $queryBuilder = DB::table('tbl_tinjauan_detail')->select('tbl_tinjauan_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_tinjauan_detail.tinjauan_respon');
        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_tinjauan_detail.tinjauan_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_tinjauan_detail.tinjauan_kemungkinan');
        $queryBuilder->where('tbl_tinjauan_detail.tinjauan_id', $request->tinjauan_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function delete_data($tipe, $id)
    {
        if ($tipe == 'tinjauan_detail') {
            $data = $this->_delete_tinjauan_detail($id);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_tinjauan_detail($id)
    {
        $data = TinjauanDetailMRModel::findOrfail($id)->delete();

        return true;
    }

    private function _cek_nomor($nomor, $kode)
    {
        $nomor_exist = TinjauanMRModel::where('tinjauan_nomor', $nomor)->first();
        if ($nomor_exist) {
            $nomor_baru = $this->_generate_number($kode);
            $this->_cek_nomor($nomor_baru, $kode);
        } else {
            $nomor_baru = $nomor;
        }

        return $nomor_baru;
    }

    private function _generate_number($kode)
    {
        $periode = date('mY');

        $queryBuilder = TinjauanMRModel::selectRaw('max(right(tinjauan_nomor, 4)) as kode');
        $queryBuilder->where(DB::raw('substring(tinjauan_nomor, 11, 6)'), '=', $periode);

        $number_exist = $queryBuilder->first();

        if (!$number_exist->kode) {
            $sequence = '0001';
        } else {
            $sequence = (int) $number_exist->kode + 1;
            $sequence = str_pad($sequence, 4, "0", STR_PAD_LEFT);
        }

        $nomor = $kode . '/TR/' . $periode . '/' . $sequence;

        return $nomor;
    }
}
