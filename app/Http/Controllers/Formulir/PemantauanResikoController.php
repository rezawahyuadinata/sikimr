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
use App\Model\Formulir\PemantauanResikoModel;
use App\Model\Formulir\PemantauanResikoDetailModel;
use App\Model\Formulir\ResikoInovasiModel;
use App\Model\Formulir\ResikoModel;
use App\Model\Master\KriteriaDampakModel;
use App\Model\Master\KriteriaKemungkinanModel;
use App\Model\Master\LevelResikoModel;
use App\Model\Master\ResponResikoModel;
use App\Model\Master\PerhitunganNilaiModel;

class PemantauanResikoController extends MYController
{
    public function index(Request $request) {
        $this->data->pemantauan_resiko_nomor = $this->_generate_number($this->data->user->kode);
        if ($request->pemantauan_resiko_id) {
            $this->data->pemantauan_resiko = PemantauanResikoModel::with('komitmen_mr')->findOrfail($request->pemantauan_resiko_id);

            $level = 'UPR-T3';

            $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'm_tahap_kegiatan.tahap', 'm_balai_teknis.balai_teknik', 'm_lingkup_risiko.lingkup_risiko', 'm_kategori_risiko.kategori', 'm_sumber_risiko.sumber_risiko', 'kegiatan_dampak.dampak as caption_kegiatan_dampak', 'penilaian_kriteria.level_kemungkinan as caption_penilaian_level_kemungkinan', 'penilaian_dampak.dampak as caption_penilaian_dampak', 'm_memadai.memadai_belum', 'pengendalian_kriteria.level_kemungkinan as caption_pengendalian_level_kemungkinan', 'pengendalian_dampak.dampak as caption_pengendalian_dampak', 'm_respon_risiko.respon_risiko', 'm_dampak.dampak as nama_dampak', 'eselon-2.NAMA as nama_pembina', DB::raw('(SELECT id FROM tbl_resiko_inovasi where resiko_id=tbl_resiko.id order by resiko_nilai desc limit 1) as inovasi_id'), 'tbl_resiko_inovasi.resiko_deskripsi', 'tbl_resiko_inovasi.resiko_alokasi', 'tbl_resiko_inovasi.resiko_kemungkinan', 'tbl_resiko_inovasi.resiko_dampak', 'tbl_resiko_inovasi.resiko_nilai', 'tbl_resiko_inovasi.resiko_penanggung_jawab', 'tbl_resiko_inovasi.resiko_tanggal_mulai', 'tbl_resiko_inovasi.resiko_tanggal_akhir', 'tbl_resiko_inovasi.resiko_tahun', 'tbl_resiko_inovasi.resiko_triwulan', 'tbl_resiko_inovasi.resiko_indikator', 'inovasi_kriteria.level_kemungkinan as caption_inovasi_level_kemungkinan', 'inovasi_dampak.dampak as caption_inovasi_dampak', DB::raw('(SELECT group_concat(alokasi) FROM m_alokasi_sumber_daya where id_alokasi in (SELECT regexp_replace(json_unquote(resiko_alokasi), \'"\', \'\') as stringified from tbl_resiko_inovasi where id=inovasi_id)) as alokasi '));
            // $queryBuilder = ResikoModel::select('tbl_resiko.*');

            if ($level == 'UPR-T3') {
                $queryBuilder->addSelect('tbl_sasaran_t3.kegiatan_tujuan');
                $queryBuilder->leftJoin('tbl_sasaran_t3', 'tbl_sasaran_t3.id', '=', 'tbl_resiko.paket_sasaran_id');
            }

            $queryBuilder->leftJoin('m_tahap_kegiatan', 'm_tahap_kegiatan.id_tahap_kegiatan', '=', 'tbl_resiko.resiko_kegiatan_tahap');
            $queryBuilder->leftJoin('m_lingkup_risiko', 'm_lingkup_risiko.id_lingkup_risiko', '=', 'tbl_resiko.resiko_kegiatan_lingkup');
            $queryBuilder->leftJoin('m_balai_teknis', 'm_balai_teknis.id_balai_teknik', '=', 'tbl_resiko.resiko_kegiatan_lingkup_balai');
            $queryBuilder->leftJoin('m_kategori_risiko', 'm_kategori_risiko.id_kategori_risiko', '=', 'tbl_resiko.resiko_kegiatan_kategori');
            $queryBuilder->leftJoin('m_sumber_risiko', 'm_sumber_risiko.id_sumber_risiko', '=', 'tbl_resiko.resiko_kegiatan_sumber');
            $queryBuilder->leftJoin('m_kriteria_dampak as kegiatan_dampak', 'kegiatan_dampak.id_kriteria_dampak', '=', 'tbl_resiko.resiko_kegiatan_kriteria_dampak');
            $queryBuilder->leftJoin('m_kriteria_kemungkinan as penilaian_kriteria', 'penilaian_kriteria.id_kriteria_kemungkinan', '=', 'tbl_resiko.resiko_penilaian_kemungkinan');
            $queryBuilder->leftJoin('m_kriteria_dampak as penilaian_dampak', 'penilaian_dampak.id_kriteria_dampak', '=', 'tbl_resiko.resiko_penilaian_dampak');
            $queryBuilder->leftJoin('m_memadai', 'm_memadai.id', '=', 'tbl_resiko.resiko_pengendalian_memadai');
            $queryBuilder->leftJoin('m_kriteria_kemungkinan as pengendalian_kriteria', 'pengendalian_kriteria.id_kriteria_kemungkinan', '=', 'tbl_resiko.resiko_pengendalian_kemungkinan');
            $queryBuilder->leftJoin('m_kriteria_dampak as pengendalian_dampak', 'pengendalian_dampak.id_kriteria_dampak', '=', 'tbl_resiko.resiko_pengendalian_dampak');
            $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_resiko.resiko_respon');
            $queryBuilder->leftJoin('m_dampak', 'm_dampak.id_dampak', '=', 'tbl_resiko.resiko_list_dampak');
            $queryBuilder->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_resiko.resiko_kegiatan_pembina');
            $queryBuilder->leftJoin('tbl_resiko_inovasi', 'tbl_resiko_inovasi.resiko_id', '=', 'tbl_resiko.id');
            $queryBuilder->leftJoin('m_kriteria_kemungkinan as inovasi_kriteria', 'inovasi_kriteria.id_kriteria_kemungkinan', '=', 'tbl_resiko_inovasi.resiko_kemungkinan');
            $queryBuilder->leftJoin('m_kriteria_dampak as inovasi_dampak', 'inovasi_dampak.id_kriteria_dampak', '=', 'tbl_resiko_inovasi.resiko_dampak');

            $queryBuilder->where('tbl_resiko.mr_id', $this->data->pemantauan_resiko->mr_id);
            $queryBuilder->orderBy('tbl_resiko.dibuat_pada', 'ASC');

            $this->data->pernyataan = $queryBuilder->get();
        } 

        $queryBuilder = KomitmenMRModel::with('creator');

        if ($this->data->user->level == 'UPR-T3') {
            $queryBuilder->where('satker_id', $this->data->user->satker_id);
        }

        if ($request->mr_id) {
            $queryBuilder->where('mr_id', $request->mr_id);
        }

        $this->data->komitmen_mr = $queryBuilder->get();

        $this->data->kriteria_dampak = KriteriaDampakModel::get();
        $this->data->kriteria_kemungkinan = KriteriaKemungkinanModel::get();
        $this->data->level = LevelResikoModel::get();

        $this->data->tahun = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $request->mr_id)->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->tipe == 'pemantauan_resiko') {
            $pemantauan_resiko_id = $this->_store_pemantauan_resiko($request);
        } elseif ($request->tipe == 'pemantauan_resiko_detail') {
            $this->_store_pemantauan_resiko_detail($request);
        }

        if ($request->tipe == 'pemantauan_resiko') {
            $response = array (
                'status'    => true,
                'message'   => 'Data berhasil disimpan.',
                'data'      => $pemantauan_resiko_id
            );
    
            return json_encode($response);
        } else {
            $response = array (
                'status'    => true,
                'message'   => 'Data berhasil disimpan.'
            );
    
            return json_encode($response);
        }
    }

    private function _store_pemantauan_resiko($request)
    {
        $pemantauan_resiko_id = Str::uuid();
        $pemantauan_resiko_nomor = $this->_cek_nomor($request->pemantauan_resiko_nomor, $this->data->user->kode);

        $data = new PemantauanResikoModel;
        $data->fill($request->all());
        $data->pemantauan_resiko_id = $pemantauan_resiko_id;
        $data->pemantauan_resiko_nomor = $pemantauan_resiko_nomor;
        $data->level = $this->data->user->level;
        $data->satker_id = $this->data->user->satker_id;
        $data->eselon1_id = $this->data->user->eselon1_id;
        $data->eselon2_id = $this->data->user->eselon2_id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
        
        return $pemantauan_resiko_id;
    }

    private function _store_pemantauan_resiko_detail($request)
    {
        $data = new PemantauanResikoDetailModel;
        $data->fill($request->all());
        $data->pemantauan_resiko_detail_id = Str::uuid();
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function update(Request $request)
    {
        if ($request->tipe == 'pemantauan_resiko_detail') {
            $this->_update_pemantauan_resiko_detail($request);
        } 

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_pemantauan_resiko_detail($request)
    {
        $data = PemantauanResikoDetailModel::findOrfail($request->pemantauan_resiko_detail_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'pemantauan_resiko_detail') {
            $data = $this->_get_pemantauan_resiko_detail($request);
        } else if ($request->tipe == 'nilai') {
            $data = PerhitunganNilaiModel::where('kemungkinan', $request->id_kriteria_kemungkinan)
            ->where('dampak', $request->id_kriteria_dampak)
            ->first();

            $response = array (
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );
    
            return json_encode($response);
            die;
        }
        
        return $data;
    }

    public function _get_pemantauan_resiko_detail($request) {
        $queryBuilder = DB::table('tbl_pemantauan_resiko_detail')->select('tbl_pemantauan_resiko_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan');

        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_kemungkinan');
        $queryBuilder->where('tbl_pemantauan_resiko_detail.pemantauan_resiko_id', $request->pemantauan_resiko_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function delete_data($tipe, $id) {
        if ($tipe == 'pemantauan_resiko_detail') {
            $data = $this->_delete_pemantauan_resiko_detail($id);
        }

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_pemantauan_resiko_detail($id) {
        $data = PemantauanResikoDetailModel::findOrfail($id)->delete();

        return true;
    }
    
    private function _cek_nomor($nomor, $kode) {
        $nomor_exist = PemantauanResikoModel::where('pemantauan_resiko_nomor', $nomor)->first();
        if ($nomor_exist) {
            $nomor_baru = $this->_generate_number($kode);
            $this->_cek_nomor($nomor_baru, $kode);
        } else {
            $nomor_baru = $nomor;
        }
        
        return $nomor_baru;
    }

    private function _generate_number($kode){
        $periode = date('mY');

        $queryBuilder = PemantauanResikoModel::selectRaw('max(right(pemantauan_resiko_nomor, 4)) as kode');
        $queryBuilder->where(DB::raw('substring(pemantauan_resiko_nomor, 11, 6)'), '=', $periode);

        $number_exist = $queryBuilder->first();

        if (! $number_exist->kode) {
            $sequence = '0001';
        } else {
            $sequence = (int) $number_exist->kode + 1;
            $sequence = str_pad($sequence, 4, "0", STR_PAD_LEFT);
        }

        $nomor = $kode . '/PR/'.$periode.'/'.$sequence;

        return $nomor;
    }
}