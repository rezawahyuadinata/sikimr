<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;
use File;

use DataTables;
use Validator;

//MODEL//
use App\Model\Formulir\KomitmenMRModel;
use App\Model\Formulir\PemantauanMRModel;
use App\Model\Formulir\PemantauanDetailMRModel;
use App\Model\Formulir\ResikoInovasiModel;
use App\Model\Formulir\ResikoModel;
use App\Model\Formulir\PemantauanResikoDetailModel;
use App\Model\Formulir\TinjauanDetailMRModel;
use App\Model\Master\KriteriaDampakModel;
use App\Model\Master\KriteriaKemungkinanModel;
use App\Model\Master\LevelResikoModel;
use App\Model\Master\ResponResikoModel;
use App\Model\Master\PerhitunganNilaiModel;

class PemantauanMRController extends MYController
{
    public function index(Request $request)
    {
        $this->data->pemantauan_nomor = $this->_generate_number($this->data->user->kode);
        if ($request->pemantauan_id) {
            $this->data->pemantauan_mr = PemantauanMRModel::with('komitmen_mr')->findOrfail($request->pemantauan_id);
            $this->data->resiko = ResikoModel::with('resiko_inovasi')->with('resiko_respon')->where('mr_id', $this->data->pemantauan_mr->mr_id)->get();

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

            $queryBuilder->where('tbl_resiko.mr_id', $this->data->pemantauan_mr->mr_id);
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

        $this->data->tahun = $request->tahun ? $request->tahun : date('Y');
        $this->data->triwulan = $request->triwulan ? $request->triwulan : 1;
        $this->data->kriteria_dampak = KriteriaDampakModel::get();
        $this->data->kriteria_kemungkinan = KriteriaKemungkinanModel::get();
        $this->data->level = LevelResikoModel::get();
        $this->data->respon = ResponResikoModel::take(3)->get();

        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->tipe == 'pemantauan') {
            $pemantauan_id = $this->_store_pemantauan($request);
        } elseif ($request->tipe == 'pemantauan_detail') {
            $this->_store_pemantauan_detail($request);
        } elseif ($request->tipe == 'pemantauan_resiko_detail') {
            $this->_store_pemantauan_resiko_detail($request);
        } elseif ($request->tipe == 'tinjauan_detail') {
            $this->_store_tinjauan_detail($request);
        } else if ($request->tipe == 'pemantauan_form') {
            $pemantauan = PemantauanMRModel::findOrfail($request->pemantauan_id);

            if ($request->pemantauan_status == 1) {
                $pemantauan->pemantauan_status = 0;
                if ($pemantauan->level == 'UPR-T3') {
                    $pemantauan->verifikasi = '1';
                } else {
                    $pemantauan->verifikasi = '2';
                }
            }

            $pemantauan->save();
        }

        if ($request->tipe == 'pemantauan') {
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan.',
                'data'      => $pemantauan_id
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

    private function _store_pemantauan($request)
    {
        $pemantauan_id = Str::uuid();
        $pemantauan_nomor = $this->_cek_nomor($request->pemantauan_nomor, $this->data->user->kode);

        $data = new PemantauanMRModel;
        $data->fill($request->all());
        $data->pemantauan_id = $pemantauan_id;
        $data->pemantauan_nomor = $pemantauan_nomor;
        $data->level = $this->data->user->level;
        $data->satker_id = $this->data->user->satker_id;
        $data->eselon1_id = $this->data->user->eselon1_id;
        $data->eselon2_id = $this->data->user->eselon2_id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        $resiko = ResikoModel::select('tbl_resiko_inovasi.*', 'tbl_resiko.resiko_pernyataan')->leftJoin('tbl_resiko_inovasi', 'tbl_resiko.id', '=', 'tbl_resiko_inovasi.resiko_id')->where('tbl_resiko.mr_id', $request->mr_id)->get();

        foreach ($resiko as $key => $value) {
            if ($value->resiko_triwulan) {
                if ($value->resiko_triwulan != 'null') {
                    $triwulan = implode(",", array($value->resiko_triwulan));
                } else {
                    $triwulan = '';
                }
            } else {
                $triwulan = '';
            }
            $data = new PemantauanDetailMRModel;
            $data->pemantauan_id = $pemantauan_id;
            $data->pemantauan_detail_id = Str::uuid();
            $data->resiko_id = $value->resiko_id;
            $data->inovasi_id = $value->id;
            $data->pemantauan_penanggung_jawab = $value->resiko_penanggung_jawab;
            $data->pemantauan_indikator = $value->resiko_indikator;
            $data->pemantauan_periode = $value->resiko_tahun . ' Triwulan ' . $triwulan; // bug //
            $data->dibuat_oleh  = Auth::user()->id;
            $data->dibuat_pada  = date('Y-m-d H:i:s');
            $data->diubah_oleh  = Auth::user()->id;
            $data->diubah_pada  = date('Y-m-d H:i:s');
            $data->save();
        }

        if ($request->triwulan == 1) {
            # code...

            foreach ($resiko as $key => $value) {
                // ini harus ada beberapa kondisi //
                $data = new PemantauanResikoDetailModel;
                $data->pemantauan_id = $pemantauan_id;
                $data->pemantauan_resiko_detail_id = Str::uuid();
                $data->pemantauan_resiko_id = $value->resiko_id;
                $data->pemantauan_resiko_pernyataan = $value->resiko_pernyataan;
                $data->pemantauan_resiko_kemungkinan = $value->resiko_kemungkinan;
                $data->pemantauan_resiko_dampak = $value->resiko_dampak;
                $data->pemantauan_resiko_nilai = $value->resiko_nilai;
                $data->dibuat_oleh  = Auth::user()->id;
                $data->dibuat_pada  = date('Y-m-d H:i:s');
                $data->diubah_oleh  = Auth::user()->id;
                $data->diubah_pada  = date('Y-m-d H:i:s');
                $data->save();
            }
        } else {
            $resiko = PemantauanResikoDetailModel::select('tbl_pemantauan_resiko_detail.*')->leftJoin('tbl_pemantauan_mr', 'tbl_pemantauan_mr.pemantauan_id', '=', 'tbl_pemantauan_resiko_detail.pemantauan_id')->where('tbl_pemantauan_mr.mr_id', $request->mr_id)->get();

            foreach ($resiko as $key => $value) {
                $data = new PemantauanResikoDetailModel;
                $data->pemantauan_id = $pemantauan_id;
                $data->pemantauan_resiko_detail_id = Str::uuid();
                $data->pemantauan_resiko_id = $value->pemantauan_resiko_id;
                $data->pemantauan_resiko_pernyataan = $value->pemantauan_resiko_pernyataan;
                $data->pemantauan_resiko_kemungkinan = $value->pemantauan_resiko_kemungkinan_act;
                $data->pemantauan_resiko_dampak = $value->pemantauan_resiko_dampak_act;
                $data->pemantauan_resiko_nilai = $value->pemantauan_resiko_nilai_act;
                $data->dibuat_oleh  = Auth::user()->id;
                $data->dibuat_pada  = date('Y-m-d H:i:s');
                $data->diubah_oleh  = Auth::user()->id;
                $data->diubah_pada  = date('Y-m-d H:i:s');
                $data->save();
            }
        }

        return $pemantauan_id;
    }

    private function _store_pemantauan_detail($request)
    {
        $data = new PemantauanDetailMRModel;
        $data->fill($request->all());
        $data->pemantauan_detail_id = Str::uuid();
        $data->pemantauan_hasil = json_encode($request->pemantauan_hasil);
        $today = date('YmdHis');
        if ($files = $request->file('pemantauan_inovasi_file')) {
            $filename = $today . '_' . uniqid() . '.' . $files->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/mr/');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $files->move($path, $filename);
        }

        if (isset($filename)) {
            $data->pemantauan_inovasi_file = $filename;
        }

        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
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

    private function _store_tinjauan_detail($request)
    {
        $pemantauan = PemantauanMRModel::find($request->pemantauan_id);
        $tinjauan_detail_id = Str::uuid();

        $data = new TinjauanDetailMRModel;
        $data->fill($request->all());
        $data->tinjauan_detail_id = $tinjauan_detail_id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        $resiko_id = Str::uuid();

        $data = new ResikoModel;
        $data->mr_id = $pemantauan ? $pemantauan->mr_id : null;
        $data->resiko_pernyataan = $request->tinjauan_pernyataan;
        $data->resiko_kegiatan_penyebab = $request->tinjauan_penyebab;
        $data->resiko_pengendalian_kemungkinan = $request->tinjauan_kemungkinan;
        $data->resiko_pengendalian_dampak = $request->tinjauan_dampak;
        $data->resiko_pengendalian_nilai = $request->tinjauan_nilai;
        $data->resiko_respon = $request->tinjauan_respon;
        $data->id = $resiko_id;
        $data->resiko_jenis = 1;
        $data->pemantauan_id = $pemantauan->pemantauan_id;
        $data->tinjauan_detail_id = $tinjauan_detail_id;
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        $data_inovasi = new ResikoInovasiModel;
        $data_inovasi->resiko_id = $resiko_id;
        $data_inovasi->mr_id = $request->mr_id;
        $data_inovasi->save();

        $this->_prioritas_resiko($pemantauan->mr_id, $pemantauan->pemantauan_id);
    }

    public function _prioritas_resiko($mr_id, $pemantauan_id)
    {
        $data = ResikoModel::where('mr_id', $mr_id)->orderBy('resiko_pengendalian_nilai', 'DESC')->orderBy('resiko_list_dampak', 'ASC')->orderBy('resiko_kegiatan_kategori', 'ASC')->get();

        DB::beginTransaction();

        foreach ($data as $key => $value) {
            $data_exist = ResikoModel::findOrfail($value->id);

            $data_exist->resiko_prioritas = ($key + 1);

            $data_exist->save();
        }

        $pemantauan = PemantauanMRModel::find($pemantauan_id);

        $data = ResikoModel::where('mr_id', $mr_id)->where('pemantauan_id', $pemantauan_id)->orderBy('dibuat_pada', 'ASC')->get();

        foreach ($data as $key => $value) {
            $data_exist = ResikoModel::findOrfail($value->id);

            $data_exist->resiko_kode = 'RB' . $pemantauan->triwulan . ($key + 1);

            $data_exist->save();
        }
        DB::commit();

        return 1;
    }

    public function update(Request $request)
    {
        if ($request->tipe == 'pemantauan_detail') {
            $this->_update_pemantauan_detail($request);
        } elseif ($request->tipe == 'pemantauan_resiko_detail') {
            $this->_update_pemantauan_resiko_detail($request);
        } elseif ($request->tipe == 'tinjauan_detail') {
            $this->_update_tinjauan_detail($request);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_pemantauan_detail($request)
    {
        $data = PemantauanDetailMRModel::findOrfail($request->pemantauan_detail_id);
        $data->fill($request->all());
        $data->pemantauan_hasil = json_encode($request->pemantauan_hasil);
        $today = date('YmdHis');
        if ($files = $request->file('pemantauan_inovasi_file')) {
            $filename = $today . '_' . uniqid() . '.' . $files->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/mr/');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $files->move($path, $filename);
        }

        if (isset($filename)) {
            $data->pemantauan_inovasi_file = $filename;
        }
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_pemantauan_resiko_detail($request)
    {
        $data = PemantauanResikoDetailModel::findOrfail($request->pemantauan_resiko_detail_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_tinjauan_detail($request)
    {
        $pemantauan = PemantauanMRModel::find($request->pemantauan_id);

        $data = TinjauanDetailMRModel::findOrfail($request->tinjauan_detail_id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'pemantauan_detail') {
            $data = $this->_get_pemantauan_detail($request);
        } elseif ($request->tipe == 'pemantauan_resiko_detail') {
            $data = $this->_get_pemantauan_resiko_detail($request);
        } elseif ($request->tipe == 'tinjauan_detail') {
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

    public function _get_pemantauan_detail($request)
    {
        $queryBuilder = DB::table('tbl_pemantauan_detail')->select('tbl_pemantauan_detail.*', 'tbl_resiko.resiko_respon', 'tbl_resiko.resiko_pernyataan', 'tbl_resiko.resiko_kegiatan_penyebab', 'tbl_resiko.resiko_penilaian_keterangan', 'tbl_resiko_inovasi.resiko_deskripsi', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('tbl_resiko_inovasi', 'tbl_resiko_inovasi.id', '=', 'tbl_pemantauan_detail.inovasi_id');
        $queryBuilder->leftJoin('tbl_resiko', 'tbl_resiko.id', '=', 'tbl_pemantauan_detail.resiko_id');
        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_resiko.resiko_respon');
        $queryBuilder->where('tbl_pemantauan_detail.pemantauan_id', $request->pemantauan_id);

        $data = $queryBuilder->get();
        foreach ($data as $key => $value) {
            if ($value->pemantauan_hasil) {
                $hasil = json_decode($value->pemantauan_hasil);
                $value->hasil = $hasil;

                if (isset($hasil->terjadi)) {
                    $value->pemantauan_hasil = '';
                }

                if (isset($hasil->terjadi)) {
                    if ($hasil->terjadi == 'Ya') {
                        $value->pemantauan_hasil .= ' <br> pernyataan risiko terjadi';
                    } else {
                        $value->pemantauan_hasil .= ' <br> pernyataan risiko tidak terjadi';
                    }
                }

                if (isset($hasil->penyebab)) {
                    if ($hasil->penyebab == 'Ya') {
                        $value->pemantauan_hasil .= ' <br> penyebab risiko terjadi';
                    } else {
                        $value->pemantauan_hasil .= ' <br> penyebab risiko tidak terjadi';
                    }
                }

                if (isset($hasil->inov)) {
                    if ($hasil->inov == 'Ya') {
                        $value->pemantauan_hasil .= ' <br> inovasi pengendalian dilakukan';
                    } else {
                        $value->pemantauan_hasil .= ' <br> inovasi pengendalian tidak dilakukan';
                    }
                }

                if (isset($hasil->memadai)) {
                    if ($hasil->memadai == 'Ya') {
                        $value->pemantauan_hasil .= ' <br> inovasi memadai';
                    } else {
                        $value->pemantauan_hasil .= ' <br> inovasi tidak memadai';
                    }
                }
            } else {
                $value->pemantauan_hasil = '';
            }
        }
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_tinjauan_detail($request)
    {
        $queryBuilder = DB::table('tbl_tinjauan_detail')->select('tbl_tinjauan_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_tinjauan_detail.tinjauan_respon');
        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_tinjauan_detail.tinjauan_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_tinjauan_detail.tinjauan_kemungkinan');
        $queryBuilder->where('tbl_tinjauan_detail.pemantauan_id', $request->pemantauan_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_pemantauan_resiko_detail($request)
    {
        $queryBuilder = DB::table('tbl_pemantauan_resiko_detail')->select('tbl_pemantauan_resiko_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan');

        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_kemungkinan');
        $queryBuilder->where('tbl_pemantauan_resiko_detail.pemantauan_id', $request->pemantauan_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function delete_data($tipe, $id)
    {
        if ($tipe == 'pemantauan_detail') {
            $data = $this->_delete_pemantauan_detail($id);
        } elseif ($tipe == 'pemantauan_resiko_detail') {
            $data = $this->_delete_pemantauan_resiko_detail($id);
        } elseif ($tipe == 'tinjauan_detail') {
            $data = $this->_delete_tinjauan_detail($id);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_pemantauan_detail($id)
    {
        $data = PemantauanDetailMRModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_pemantauan_resiko_detail($id)
    {
        $data = PemantauanResikoDetailModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_tinjauan_detail($id)
    {
        $data = TinjauanDetailMRModel::findOrfail($id)->delete();
        $data_resiko = ResikoModel::where('tinjauan_detail_id', $id)->delete();

        return true;
    }

    private function _cek_nomor($nomor, $kode)
    {
        $nomor_exist = PemantauanMRModel::where('pemantauan_nomor', $nomor)->first();
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

        $queryBuilder = PemantauanMRModel::selectRaw('max(right(pemantauan_nomor, 4)) as kode');
        $queryBuilder->where(DB::raw('substring(pemantauan_nomor, 11, 6)'), '=', $periode);

        $number_exist = $queryBuilder->first();

        if (!$number_exist->kode) {
            $sequence = '0001';
        } else {
            $sequence = (int) $number_exist->kode + 1;
            $sequence = str_pad($sequence, 4, "0", STR_PAD_LEFT);
        }

        $nomor = $kode . '/IP/' . $periode . '/' . $sequence;

        return $nomor;
    }
}
