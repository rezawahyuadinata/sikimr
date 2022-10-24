<?php

namespace App\Http\Controllers\Formulir;

use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Auth;
use DB;
use Illuminate\Support\Facades\Http;

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

class VerifikasiPemantauanController extends MYController
{
    public function index(Request $request)
    {
        $info = $this->data;
        $queryBuilder = DB::table('tbl_pemantauan_mr')->select('tbl_pemantauan_mr.*', 'satker.NAMA as satker_nama', 'eselon-2.NAMA as eselon2_nama', 'eselon-1.NAMA as eselon1_nama');
        $queryBuilder->leftJoin('satker', 'satker.ID', '=', 'tbl_pemantauan_mr.satker_id');
        $queryBuilder->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_pemantauan_mr.eselon2_id');
        $queryBuilder->leftJoin('eselon-1', 'eselon-1.ID', '=', 'tbl_pemantauan_mr.eselon1_id');
        if (!in_array($this->data->user->pengguna_kategori->pengguna_kategori_spesial, ['developer', 'superadmin'])) {
            if ($this->data->user->level == 'UPR-T2') {
                $queryBuilder->where(function ($query) use ($info) {
                    $query->where(DB::raw('substring(tbl_pemantauan_mr.pemantauan_nomor, 1, 6)'), '=', $this->data->user->kode)
                        ->orWhere('satker.ES2_ID', $info->user->satker->ID);
                });
                $queryBuilder->whereIn('tbl_pemantauan_mr.verifikasi', ['1', '2', '3']);
            } else {
                $queryBuilder->whereIn('tbl_pemantauan_mr.verifikasi', ['2', '3']);
                // $queryBuilder->whereIn('tbl_pemantauan_mr.verifikasi', ['1', '2']);
            }
        } else {
            $queryBuilder->whereIn('tbl_pemantauan_mr.verifikasi', ['1', '2', '3']);
        }

        $queryBuilder->orderBy('tbl_pemantauan_mr.verifikasi', 'ASC');
        $this->data->pemantauan_mr = $queryBuilder->paginate(10);
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function show($id)
    {
        $this->data->pemantauan_mr = PemantauanMRModel::findOrfail($id);

        $queryBuilder = DB::table('tbl_pemantauan_detail')->select('tbl_pemantauan_detail.*', 'tbl_resiko.resiko_respon', 'tbl_resiko.resiko_pernyataan', 'tbl_resiko.resiko_kegiatan_penyebab', 'tbl_resiko_inovasi.resiko_deskripsi', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('tbl_resiko_inovasi', 'tbl_resiko_inovasi.id', '=', 'tbl_pemantauan_detail.inovasi_id');
        $queryBuilder->leftJoin('tbl_resiko', 'tbl_resiko.id', '=', 'tbl_pemantauan_detail.resiko_id');
        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_resiko.resiko_respon');
        $queryBuilder->where('tbl_pemantauan_detail.pemantauan_id', $id);

        $this->data->pemantauan_detail = $queryBuilder->get();
        foreach ($this->data->pemantauan_detail as $key => $value) {
            if ($value->pemantauan_hasil) {
                $hasil = json_decode($value->pemantauan_hasil);
                $value->hasil = $hasil;

                if (isset($hasil->terjadi)) {
                    $value->pemantauan_hasil = '';
                }

                if (isset($hasil->terjadi)) {
                    if ($hasil->terjadi == 'Ya') {
                        $value->pemantauan_hasil .= ' pernyataan risiko terjadi';
                    } else {
                        $value->pemantauan_hasil .= ' pernyataan risiko tidak terjadi';
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

        $queryBuilder = DB::table('tbl_tinjauan_detail')->select('tbl_tinjauan_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_tinjauan_detail.tinjauan_respon');
        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_tinjauan_detail.tinjauan_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_tinjauan_detail.tinjauan_kemungkinan');
        $queryBuilder->where('tbl_tinjauan_detail.pemantauan_id', $id);

        $this->data->tinjauan_detail = $queryBuilder->get();

        $queryBuilder = DB::table('tbl_pemantauan_resiko_detail')->select('tbl_pemantauan_resiko_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan');

        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_kemungkinan');
        $queryBuilder->where('tbl_pemantauan_resiko_detail.pemantauan_id', $id);

        $this->data->pemantauan_resiko_detail = $queryBuilder->get();

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        $pemantauan = PemantauanMRModel::findOrfail($request->pemantauan_id);

        if ($request->verifikasi == '1') {
            if ($pemantauan->verifikasi == '1') {
                $pemantauan->verifikasi = '2';
                $pemantauan->pemantauan_status = 0;
            } else {
                $pemantauan->verifikasi = '3';
                $pemantauan->pemantauan_status = 1;
            }
        } else {
            $pemantauan->verifikasi = '0';
            $pemantauan->pemantauan_status = 2;
        }

        $pemantauan->verifikasi_catatan = $request->verifikasi_catatan;
        $pemantauan->save();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function detail($id)
    {
        $this->data->pemantauan_mr = PemantauanMRModel::findOrfail($id);

        $queryBuilder = DB::table('tbl_pemantauan_detail')->select('tbl_pemantauan_detail.*', 'tbl_resiko.resiko_respon', 'tbl_resiko.resiko_pernyataan', 'tbl_resiko.resiko_kegiatan_penyebab', 'tbl_resiko_inovasi.resiko_deskripsi', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('tbl_resiko_inovasi', 'tbl_resiko_inovasi.id', '=', 'tbl_pemantauan_detail.inovasi_id');
        $queryBuilder->leftJoin('tbl_resiko', 'tbl_resiko.id', '=', 'tbl_pemantauan_detail.resiko_id');
        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_resiko.resiko_respon');
        $queryBuilder->where('tbl_pemantauan_detail.pemantauan_id', $id);

        $this->data->pemantauan_detail = $queryBuilder->get();
        foreach ($this->data->pemantauan_detail as $key => $value) {
            if ($value->pemantauan_hasil) {
                $hasil = json_decode($value->pemantauan_hasil);
                $value->hasil = $hasil;

                if (isset($hasil->terjadi)) {
                    $value->pemantauan_hasil = '';
                }

                if (isset($hasil->terjadi)) {
                    if ($hasil->terjadi == 'Ya') {
                        $value->pemantauan_hasil .= ' pernyataan risiko terjadi';
                    } else {
                        $value->pemantauan_hasil .= ' pernyataan risiko tidak terjadi';
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

        $queryBuilder = DB::table('tbl_tinjauan_detail')->select('tbl_tinjauan_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan', 'm_respon_risiko.respon_risiko');

        $queryBuilder->leftJoin('m_respon_risiko', 'm_respon_risiko.id_respon_risiko', '=', 'tbl_tinjauan_detail.tinjauan_respon');
        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_tinjauan_detail.tinjauan_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_tinjauan_detail.tinjauan_kemungkinan');
        $queryBuilder->where('tbl_tinjauan_detail.pemantauan_id', $id);

        $this->data->tinjauan_detail = $queryBuilder->get();

        $queryBuilder = DB::table('tbl_pemantauan_resiko_detail')->select('tbl_pemantauan_resiko_detail.*', 'm_kriteria_dampak.dampak', 'm_kriteria_kemungkinan.level_kemungkinan');

        $queryBuilder->leftJoin('m_kriteria_dampak', 'm_kriteria_dampak.id_kriteria_dampak', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_dampak');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan', 'm_kriteria_kemungkinan.id_kriteria_kemungkinan', '=', 'tbl_pemantauan_resiko_detail.pemantauan_resiko_kemungkinan');
        $queryBuilder->where('tbl_pemantauan_resiko_detail.pemantauan_id', $id);

        $this->data->pemantauan_resiko_detail = $queryBuilder->get();

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        $data = PemantauanMRModel::findOrfail($id);

        $data->verifikasi = '0';
        $data->verifikasi_catatan = 'Pembatalan verifikasi';

        $data->save();

        DB::commit();

        return true;
    }
}
