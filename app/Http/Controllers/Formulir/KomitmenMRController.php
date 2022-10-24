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
use App\Model\Master\DampakModel;
use App\Model\Master\Eselon2Model;
use App\Model\Master\PpkModel;
use App\Model\Master\SatkerModel;
use App\Model\Master\Eselon3Model;
use App\Model\Master\Eselon1Model;


use App\Model\Formulir\PaketPekerjaanModel;
use App\Model\Formulir\PaketSasaranT3Model;
use App\Model\Formulir\PaketPemangkuKepentinganModel;
use App\Model\Formulir\PaketTujuanModel;
use App\Model\Formulir\ResikoModel;
use App\Model\Formulir\ResikoInovasiModel;
use App\Model\Formulir\KomitmenMRModel;
use App\Model\Formulir\SasaranT3Model;
use App\Model\Formulir\PemantauanDetailMRModel;
use App\Model\Formulir\PemantauanResikoDetailModel;

use App\Helpers\AppHelper;

class KomitmenMRController extends MYController
{
    public function index(Request $request)
    {
        $this->data->mr_nomor = $this->_generate_number($this->data->user->kode);
        $this->data->risiko_lain = new \stdClass();
        if ($request->mr_id) {
            $this->data->komitmen_mr = KomitmenMRModel::with('creator')->findOrfail($request->mr_id);
            if ($this->data->user->level == 'PPK') {
                $this->data->user->satker = SatkerModel::findOrfail($this->data->user->satker_id);
                $this->data->user->pemilik_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pemilik_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pengelola_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pengelola_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->kode = str_pad($this->data->user->satker->KODE, 6, 0, STR_PAD_LEFT);
            } else if ($this->data->komitmen_mr->level == 'UPR-T3') {
                $this->data->user->satker = SatkerModel::findOrfail($this->data->komitmen_mr->satker_id);
                $this->data->user->pemilik_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pemilik_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pengelola_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pengelola_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->kode = str_pad($this->data->user->satker->KODE, 6, 0, STR_PAD_LEFT);
            } elseif ($this->data->komitmen_mr->level == 'UPR-T2') {
                $this->data->user->satker = Eselon2Model::where('ID', $this->data->komitmen_mr->eselon2_id)->where('UPR2', 'Pemilik Risiko')->first();
                $this->data->user->pemilik_resiko = $this->data->user->satker->PEJABAT;
                $this->data->user->pemilik_resiko_jabatan = $this->data->user->satker->JABATAN;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola = Eselon3Model::where('ES2_ID', $this->data->user->eselon2_id)->where('UPR2', 'Pengelola Risiko')->first();
                $this->data->user->pengelola_resiko = $this->data->user->pengelola->PEJABAT;;
                $this->data->user->pengelola_resiko_jabatan = $this->data->user->pengelola->JABATAN;;
                $this->data->user->pengelola_resiko_nip = $this->data->user->pengelola->NIP;;
                $this->data->user->kode = str_pad($this->data->user->satker->DIPA, 6, 0, STR_PAD_LEFT);
            } else if ($this->data->komitmen_mr->level == 'UPR-T1') {
                $this->data->user->satker = Eselon1Model::where('ID', $this->data->komitmen_mr->eselon1_id)->first();
                $this->data->user->pemilik_resiko = $this->data->user->satker->PEJABAT;
                $this->data->user->pemilik_resiko_jabatan = $this->data->user->satker->JABATAN;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola = Eselon2Model::where('ES1_ID', $this->data->komitmen_mr->eselon1_id)->where('UPR1', 'Pengelola Risiko')->first();
                $this->data->user->pengelola_resiko = $this->data->user->pengelola->PEJABAT;;
                $this->data->user->pengelola_resiko_jabatan = $this->data->user->pengelola->JABATAN;;
                $this->data->user->pengelola_resiko_nip = $this->data->user->pengelola->NIP;;
                $this->data->user->kode = str_pad($this->data->user->pengelola->DIPA, 6, 0, STR_PAD_LEFT);
                $this->data->user->pengelola2 = Eselon2Model::where('ES1_ID', $this->data->komitmen_mr->eselon1_id)->where('UPR1', 'Pengelola Risiko')->where('ID', '!=', $this->data->user->pengelola->ID)->first();
                $this->data->user->pengelola2_resiko = $this->data->user->pengelola2->PEJABAT;;
                $this->data->user->pengelola2_resiko_jabatan = $this->data->user->pengelola2->JABATAN;;
                $this->data->user->pengelola2_resiko_nip = $this->data->user->pengelola2->NIP;;
                $this->data->user->kode = str_pad($this->data->user->pengelola2->DIPA, 6, 0, STR_PAD_LEFT);
            }

            $info = $this->data;
            $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'tbl_komitmen_mr.level', 'm_tahap_kegiatan.tahap', 'm_balai_teknis.balai_teknik', 'm_lingkup_risiko.lingkup_risiko', 'm_kategori_risiko.kategori', 'm_sumber_risiko.sumber_risiko', 'kegiatan_dampak.dampak as caption_kegiatan_dampak', 'penilaian_kriteria.level_kemungkinan as caption_penilaian_level_kemungkinan', 'penilaian_dampak.dampak as caption_penilaian_dampak', 'm_memadai.memadai_belum', 'pengendalian_kriteria.level_kemungkinan as caption_pengendalian_level_kemungkinan', 'pengendalian_dampak.dampak as caption_pengendalian_dampak', 'm_respon_risiko.respon_risiko', 'm_dampak.dampak as nama_dampak', 'eselon-2.NAMA as nama_pembina', DB::raw('(SELECT id FROM tbl_resiko_inovasi where resiko_id=tbl_resiko.id order by resiko_nilai desc limit 1) as inovasi_id'), 'tbl_resiko_inovasi.resiko_deskripsi', 'tbl_resiko_inovasi.resiko_alokasi', 'tbl_resiko_inovasi.resiko_kemungkinan', 'tbl_resiko_inovasi.resiko_dampak', 'tbl_resiko_inovasi.resiko_nilai', 'tbl_resiko_inovasi.resiko_penanggung_jawab', 'tbl_resiko_inovasi.resiko_tanggal_mulai', 'tbl_resiko_inovasi.resiko_tanggal_akhir', 'tbl_resiko_inovasi.resiko_tahun', 'tbl_resiko_inovasi.resiko_triwulan', 'tbl_resiko_inovasi.resiko_indikator', 'inovasi_kriteria.level_kemungkinan as caption_inovasi_level_kemungkinan', 'inovasi_dampak.dampak as caption_inovasi_dampak', DB::raw('(SELECT group_concat(alokasi) FROM m_alokasi_sumber_daya where id_alokasi in (2, 4)) as alokasi'), 'satker.NAMA as NAMA_SATKER', 'eselon-1.NAMA AS NAMA_ES1');
            // SELECT regexp_replace(json_unquote(resiko_alokasi), """, "") as stringified from tbl_resiko_inovasi where id=inovasi_id)
            // $queryBuilder = ResikoModel::select('tbl_resiko.*');

            if ($this->data->user->level == 'PPK' || $this->data->user->level == 'UPR-T3') {
                $queryBuilder->addSelect('ppk.NAMA as NAMA_PPK');
            }

            $queryBuilder->addSelect('tbl_sasaran_t3.kegiatan_tujuan');
            $queryBuilder->leftJoin('tbl_sasaran_t3', 'tbl_sasaran_t3.id', '=', 'tbl_resiko.paket_sasaran_id');

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
            $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_resiko.mr_id');
            $queryBuilder->leftJoin('satker', 'satker.ID', '=', 'tbl_komitmen_mr.satker_id');
            $queryBuilder->leftJoin('eselon-1', 'eselon-1.ID', '=', 'tbl_komitmen_mr.eselon1_id');

            if ($this->data->user->level == 'PPK' || $this->data->user->level == 'UPR-T3') {
                $queryBuilder->leftJoin('ppk', 'ppk.SATKER_ID', '=', 'satker.ID');
                // $queryBuilder->leftJoin('ppk', 'tbl_komitmen_mr.kode_ppk', '=',  'ppk.KODE');
                // $queryBuilder->orWhere('tbl_komitmen_mr.kode_ppk', DB::raw('ppk.KODE'));
            }

            if (!in_array($this->data->user->pengguna_kategori->pengguna_kategori_spesial, ['developer', 'superadmin'])) {
                if ($this->data->user->level == 'PPK') {
                    $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode);
                } else if ($this->data->user->level == 'UPR-T3') {
                    $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode);
                    $queryBuilder->where('tbl_komitmen_mr.kode_ppk', DB::raw('ppk.KODE'));
                }
                // elseif ($this->data->user->level == 'UPR-T3') {
                //     $queryBuilder->where(function ($query) use ($info) {
                //         $query->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode)
                //             ->orWhere('ppk.SATKER_ID', $info->user->satker->ID);
                //     });
                // }
                else if ($this->data->user->level == 'UPR-T2') {
                    $queryBuilder->where(function ($query) use ($info) {
                        $query->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode)
                            ->orWhere('satker.ES2_ID', $info->user->satker->ID)
                            ->where('tbl_komitmen_mr.level', 'UPR-T3');
                    });
                }
            }

            if ($request->mr_id) {
                $queryBuilder->where('tbl_komitmen_mr.mr_id', '!=', $request->mr_id);
            }

            $queryBuilder->orderBy('tbl_resiko.resiko_prioritas', 'ASC');

            $data = $queryBuilder->get();

            // dd($data);

            foreach ($data as $key => $value) {
                $value->resiko_alokasi = json_decode($value->resiko_alokasi);

                if (is_array($value->resiko_alokasi)) {
                    $alokasi2 = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->whereIn('id_alokasi', $value->resiko_alokasi)->first();
                } else {
                    $alokasi2 = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->where('id_alokasi', $value->resiko_alokasi)->first();
                }

                $a = $value->resiko_tahun . ' ';
                if ($value->resiko_triwulan != null) {
                    $value->resiko_triwulan1 = json_decode($value->resiko_triwulan);
                    $value->resiko_triwulan = json_decode($value->resiko_triwulan);
                    if (is_array($value->resiko_triwulan)) {
                        foreach ($value->resiko_triwulan as $k => $v) {
                            $a .= 'Triwulan ' . $v;
                            if (count($value->resiko_triwulan) != ($k + 1)) {
                                $a .= ', ';
                            }
                        }
                    }
                }

                $value->resiko_triwulan = $a;

                $value->alokasi2 = $alokasi2 ? $alokasi2->alokasi : null;
            }

            $this->data->risiko_lain = $data;

            // dd($this->data->risiko_lain);
        }
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
        $this->data->dampak = DampakModel::get();
        $this->data->eselon2 = Eselon2Model::where('level_user', 'unit_kerja')->get();

        $this->data->ppk = new \stdClass();
        if ($this->data->user->satker) {
            $this->data->ppk = PpkModel::where('SATKER_ID', $this->data->user->satker->ID)->get();
        }

        if ($this->data->user->level == 'PPK') {
            $this->data->kegiatan = DB::table('kegiatan')->leftJoin('satker_kegiatan', 'satker_kegiatan.kegiatan_id', '=', 'kegiatan.ID')->where('satker_kegiatan.satker_id', $this->data->user->satker->ID)->where('unit', 'UPR-T3')->get();
        } else if ($this->data->user->level == 'UPR-T3') {
            $this->data->kegiatan = DB::table('kegiatan')->leftJoin('satker_kegiatan', 'satker_kegiatan.kegiatan_id', '=', 'kegiatan.ID')->where('satker_kegiatan.satker_id', $this->data->user->satker->ID)->where('unit', 'UPR-T3')->get();
        } else if ($this->data->user->level == 'UPR-T2') {
            if ($this->data->user->unit == 'Balai') {
                $this->data->kegiatan = DB::table('kegiatan')->leftJoin('satker_kegiatan', 'satker_kegiatan.kegiatan_id', '=', 'kegiatan.ID')->where('satker_kegiatan.satker_id', $this->data->user->satker->ID)->where('unit', 'UPR-T2')->get();
            } else {
                $this->data->kegiatan = DB::table('kegiatan')->leftJoin('satker_kegiatan', 'satker_kegiatan.kegiatan_id', '=', 'kegiatan.ID')->where('satker_kegiatan.satker_id', $this->data->user->satker->ID)->where('unit', 'UPR-T2')->get();
                // $this->data->kegiatan = DB::table('kegiatan')->where('ES2_ID', $this->data->user->satker->ID)->get();
            }
        } else {
            $this->data->kegiatan = DB::table('kegiatan')->get();
        }
        $this->data->program = DB::table('program')->get();
        $this->data->paket_pekerjaan = PaketPekerjaanModel::where('kdsatker', $this->data->user->kode)->get();
        // dd($this->data->paket_pekerjaan);
        $this->data->sasaran = SasaranT3Model::where('mr_id', $request->mr_id)->get();
        $data = $this->data;
        // dd($data);

        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->tipe == 'mr') {
            $mr_id = $this->_store_mr($request);
            if ($mr_id == '0') {
                $response = array(
                    'status'    => false,
                    'message' => 'Data untuk periode tersebut telah ada.'
                );

                return json_encode($response);
            }
            $tujuan = $this->_store_tujuan_auto($mr_id);
        } else if ($request->tipe == 'sasaran') {
            if ($request->level == 'PPK') {
                $this->_store_sasaran_t3($request);
            } else if ($request->level == 'UPR-T3') {
                $this->_store_sasaran_t3($request);
            } else if ($request->level == 'UPR-T2' && $request->unit != 'Balai') {
                $this->_store_sasaran_t2($request);
            } else {
                $this->_store_sasaran($request);
            }
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $this->_store_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $this->_store_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $this->_store_resiko($request);
            $this->_prioritas_resiko($request->mr_id);
        } else if ($request->tipe == 'jadwal') {
            $this->_store_jadwal($request);
        } else if ($request->tipe == 'mr_form') {
            $mr = KomitmenMRModel::findOrfail($request->mr_id);

            if ($request->mr_status == 1) {
                $mr->mr_status = 0;
                if ($mr->level == 'UPR-T3') {
                    $mr->verifikasi = '1';
                } else {
                    $mr->verifikasi = '2';
                }
            }

            $mr->save();
        }

        if ($request->tipe == 'mr') {
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan.',
                'data'      => $mr_id
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

    private function _store_mr($request)
    {
        $queryBuilder = KomitmenMRModel::select('*');
        $queryBuilder->where(DB::raw('substring(mr_nomor, 13, 4)'), '=', $request->mr_periode);
        $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode);
        $queryBuilder->where('level', $this->data->user->level);
        if ($this->data->user->level == 'PPK') {
            $queryBuilder->where('kode_ppk', $this->data->user->kode_ppk);
        }

        $number_exist = $queryBuilder->first();

        if ($number_exist) {
            return '0';
        }

        $mr_id = Str::uuid();
        $mr_nomor = $this->_cek_nomor($request->mr_nomor, $this->data->user->kode);

        $data = new KomitmenMRModel;
        $data->fill($request->all());
        $data->mr_id = $mr_id;
        $data->mr_nomor = $mr_nomor;
        $data->level = $this->data->user->level;
        $data->satker_id = $this->data->user->satker_id;
        $data->eselon1_id = $this->data->user->eselon1_id;
        $data->eselon2_id = $this->data->user->eselon2_id;
        $data->kode_ppk = $this->data->user->kode_ppk;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        return $mr_id;
    }

    private function _store_sasaran($request)
    {
        $data = new SasaranT3Model;
        $data->fill($request->all());
        $data->isp_target = AppHelper::StrReplace($request->isp_target);
        $data->tujuan_kegiatan = AppHelper::StrReplace($request->tujuan_kegiatan);
        $data->user_id = Auth::user()->id;
        $data->save();
    }

    private function _store_sasaran_t3($request)
    {
        $data = new SasaranT3Model;
        $data->fill($request->all());
        $data->isp_target = AppHelper::StrReplace($request->isp_target);
        $data->tujuan_kegiatan = AppHelper::StrReplace($request->tujuan_kegiatan);
        $data->user_id = Auth::user()->id;
        $data->save();
    }

    private function _store_sasaran_t2($request)
    {
        $data = new SasaranT3Model;
        $data->fill($request->all());
        $data->isp_target = isset($request->isp_target) ? AppHelper::StrReplace($request->isp_target) : 0;
        $data->kegiatan_tujuan = $request->kegiatan_tujuan;
        $data->tujuan_kegiatan = AppHelper::StrReplace($request->tujuan_kegiatan);
        // $data->tujuan_kegiatan = $request->kegiatan_tujuan;
        $data->user_id = Auth::user()->id;
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

    private function _store_tujuan_auto($mr_id)
    {
        $data = new PaketTujuanModel;
        $data->mr_id = $mr_id;
        $data->tujuan_pelaksanaan = 'Tujuan pelaksanaan Manajemen Risiko adalah untuk menciptakan dan melindungi nilai agar UPR dapat meningkatkan kinerja mendorong inovasi dan mendukung pencapaian sasaran.';
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
        DB::beginTransaction();

        $resiko_id = Str::uuid();
        $data = new ResikoModel;
        $data->fill($request->all());
        $data->id = $resiko_id;
        $data->user_id = Auth::user()->id;
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        $data_inovasi = new ResikoInovasiModel;
        $data_inovasi->fill($request->all());
        $data_inovasi->resiko_id = $resiko_id;
        $data_inovasi->mr_id = $request->mr_id;
        $data_inovasi->resiko_inovasi = $request->resiko_inovasi;
        $data_inovasi->resiko_deskripsi = $request->resiko_deskripsi;
        $data_inovasi->resiko_alokasi = json_encode($request->resiko_alokasi);
        $data_inovasi->resiko_kemungkinan = $request->resiko_kemungkinan;
        $data_inovasi->resiko_dampak = $request->resiko_dampak;
        $data_inovasi->resiko_penanggung_jawab = $request->resiko_penanggung_jawab;
        if (isset($request->resiko_penilaian_periode1)) {
            $data_inovasi->resiko_tahun = $request->resiko_penilaian_periode1;
        } else {
            $getMR = KomitmenMRModel::where('mr_id', $request->mr_id)->first();

            $getTahunMR = substr($getMR['mr_nomor'], 12, 4);
            $data_inovasi->resiko_tahun = $getTahunMR;
        }
        if (isset($request->resiko_penilaian_periode2)) {
            $data_inovasi->resiko_triwulan = json_encode([substr($request->resiko_penilaian_periode2, 9)]);
        } else {
            $data_inovasi->resiko_triwulan = null;
        }
        $data_inovasi->resiko_indikator = $request->resiko_indikator;
        $data_inovasi->resiko_nilai = $request->resiko_nilai;
        $data_inovasi->save();

        // $data = new PemantauanDetailMRModel;
        // $data->pemantauan_detail_id = Str::uuid();
        // $data->resiko_id = $resiko_id;
        // $data->inovasi_id = $data_inovasi->id;
        // $data->pemantauan_penanggung_jawab = $request->resiko_penanggung_jawab;
        // $data->pemantauan_indikator = $request->resiko_indikator;
        // $data->pemantauan_periode = $request->resiko_penilaian_periode1 . ' Triwulan ' . implode(",",$request->resiko_penilaian_periode2);
        // $data->dibuat_oleh  = Auth::user()->id;
        // $data->dibuat_pada  = date('Y-m-d H:i:s');
        // $data->diubah_oleh  = Auth::user()->id;
        // $data->diubah_pada  = date('Y-m-d H:i:s');
        // $data->save();

        // $data = new PemantauanResikoDetailModel;
        // $data->pemantauan_resiko_detail_id = Str::uuid();
        // $data->pemantauan_resiko_id = $resiko_id;
        // $data->pemantauan_resiko_kemungkinan = $request->resiko_kemungkinan;
        // $data->pemantauan_resiko_dampak = $request->resiko_dampak;
        // $data->pemantauan_resiko_nilai = $request->resiko_nilai;
        // $data->dibuat_oleh  = Auth::user()->id;
        // $data->dibuat_pada  = date('Y-m-d H:i:s');
        // $data->diubah_oleh  = Auth::user()->id;
        // $data->diubah_pada  = date('Y-m-d H:i:s');
        // $data->save();

        DB::commit();
    }

    private function _store_jadwal($request)
    {
        $data_exist = DB::table('t_jadwal')->where('mr_id', $request->mr_id)->where('jadwal_id', $request->m_jadwal_id)->where('year', $request->year)->delete();
        if (isset($request->minggu_id)) {
            foreach ($request->minggu_id as $key => $value) {
                $data = array(
                    'mr_id'  => $request->mr_id,
                    'jadwal_id' => $request->m_jadwal_id,
                    'year' => $request->year,
                    'minggu' => $key,
                );

                DB::table('t_jadwal')->insert($data);
            }
        }
    }

    public function update(Request $request)
    {
        if ($request->tipe == 'sasaran') {
            if ($request->level == 'UPR-T3' || $request->level == 'PPK') {
                $this->_update_sasaran_t3($request);
            } else if ($request->level == 'UPR-T2' && $request->unit != 'Balai') {
                $this->_update_sasaran_t2($request);
            } else {
                $this->_update_sasaran($request);
            }
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $this->_update_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $this->_update_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $this->_update_resiko($request);
            $this->_prioritas_resiko($request->mr_id);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_sasaran($request)
    {
        $data = SasaranT3Model::findOrfail($request->paket_sasaran_id);
        $data->fill($request->all());
        $data->isp_target = AppHelper::StrReplace($request->isp_target);
        $data->tujuan_kegiatan = AppHelper::StrReplace($request->tujuan_kegiatan);
        $data->user_id = Auth::user()->id;
        $data->save();
    }

    private function _update_sasaran_t3($request)
    {
        $data = SasaranT3Model::findOrfail($request->paket_sasaran_id);
        $data->fill($request->all());
        $data->isp_target = AppHelper::StrReplace($request->isp_target);
        $data->user_id = Auth::user()->id;
        $data->save();
    }

    private function _update_sasaran_t2($request)
    {
        $data = SasaranT3Model::findOrfail($request->paket_sasaran_id);
        $data->fill($request->all());
        $data->isp_target = isset($request->isp_target) ? AppHelper::StrReplace($request->isp_target) : 0;
        $data->kegiatan_tujuan = $request->kegiatan_tujuan;
        $data->tujuan_kegiatan = AppHelper::StrReplace($request->tujuan_kegiatan);
        // $data->tujuan_kegiatan = $request->kegiatan_tujuan;
        $data->user_id = Auth::user()->id;
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
        // $data = ResikoModel::findOrfail($request->resiko_id);
        // $data->fill($request->all());
        // $data->diubah_oleh  = Auth::user()->id;
        // $data->diubah_pada  = date('Y-m-d H:i:s');
        // $data->save();

        DB::beginTransaction();

        try {
            $resiko_id = $request->resiko_id;
            $data = ResikoModel::findOrfail($request->resiko_id);
            $data->fill($request->all());
            $data->diubah_oleh  = Auth::user()->id;
            $data->diubah_pada  = date('Y-m-d H:i:s');
            $data->save();

            $data_inovasi_exist = ResikoInovasiModel::where('resiko_id', $resiko_id)->delete();

            $data_inovasi = new ResikoInovasiModel;
            $data_inovasi->fill($request->all());
            $data_inovasi->resiko_id = $resiko_id;
            $data_inovasi->mr_id = $request->mr_id;
            $data_inovasi->resiko_inovasi = $request->resiko_inovasi;
            $data_inovasi->resiko_deskripsi = $request->resiko_deskripsi;
            $data_inovasi->resiko_alokasi = json_encode($request->resiko_alokasi);
            $data_inovasi->resiko_kemungkinan = $request->resiko_kemungkinan;
            $data_inovasi->resiko_dampak = $request->resiko_dampak;
            $data_inovasi->resiko_penanggung_jawab = $request->resiko_penanggung_jawab;
            if (isset($request->resiko_penilaian_periode1)) {
                $data_inovasi->resiko_tahun = $request->resiko_penilaian_periode1;
            } else {
                $data_inovasi->resiko_tahun = $request->resiko_penilaian_periode1_1;
            }
            if (isset($request->resiko_penilaian_periode2)) {
                $data_inovasi->resiko_triwulan = json_encode([substr($request->resiko_penilaian_periode2, 9)]);
            } else {
                $data_inovasi->resiko_triwulan = null;
            }
            $data_inovasi->resiko_indikator = $request->resiko_indikator;
            $data_inovasi->resiko_nilai = $request->resiko_nilai;
            $data_inovasi->save();

            DB::commit();
        } catch (\Exception $e) {
            echo json_encode($e);
            DB::rollback();
        }
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'sasaran') {
            if ($request->level == 'UPR-T3' || $request->level == 'PPK') {
                $data = $this->_get_sasaran_t3($request);
            } else if ($request->level == 'UPR-T2' && $request->unit != 'Balai') {
                $data = $this->_get_sasaran_t3($request);
            } else {
                $data = $this->_get_sasaran($request);
            }
        } else if ($request->tipe == 'pemangku_kepentingan') {
            $data = $this->_get_pemangku_kepentingan($request);
        } else if ($request->tipe == 'tujuan') {
            $data = $this->_get_tujuan($request);
        } else if ($request->tipe == 'resiko') {
            $data = $this->_get_resiko($request);
        } else if ($request->tipe == 'peta_resiko') {
            $mr = KomitmenMRModel::find($request->mr_id);
            $this->data->kriteria_dampak = KriteriaDampakModel::get();
            $this->data->kriteria_kemungkinan = KriteriaKemungkinanModel::get();
            $this->data->peta = KriteriaKemungkinanModel::orderBy('id_kriteria_kemungkinan', 'desc')->get();

            foreach ($this->data->peta as $key => $value) {
                $value->dampak = KriteriaDampakModel::orderBy('id_kriteria_dampak', 'asc')->get();
                foreach ($value->dampak as $idx => $row) {
                    $row->nilai = PerhitunganNilaiModel::where('kemungkinan', $value->id_kriteria_kemungkinan)
                        ->where('dampak', $row->id_kriteria_dampak)
                        ->first();
                }
            }

            $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'm_tahap_kegiatan.tahap', 'm_balai_teknis.balai_teknik', 'm_lingkup_risiko.lingkup_risiko', 'm_kategori_risiko.kategori', 'm_sumber_risiko.sumber_risiko', 'kegiatan_dampak.dampak as caption_kegiatan_dampak', 'penilaian_kriteria.level_kemungkinan as caption_penilaian_level_kemungkinan', 'penilaian_dampak.dampak as caption_penilaian_dampak', 'm_memadai.memadai_belum', 'pengendalian_kriteria.level_kemungkinan as caption_pengendalian_level_kemungkinan', 'pengendalian_dampak.dampak as caption_pengendalian_dampak', 'm_respon_risiko.respon_risiko', 'm_perhitungan_nilai.r', 'm_perhitungan_nilai.g', 'm_perhitungan_nilai.b', 'pengendalian_nilai.r as pr', 'pengendalian_nilai.g as pg', 'pengendalian_nilai.b as pb', DB::raw('(SELECT id FROM tbl_resiko_inovasi where resiko_id=tbl_resiko.id order by resiko_nilai desc limit 1) as inovasi_id'));

            if ($mr->level == 'UPR-T3' || $mr->level == 'PPK') {
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
            $queryBuilder->leftJoin('m_perhitungan_nilai', 'm_perhitungan_nilai.nilai', '=', 'tbl_resiko.resiko_penilaian_nilai');
            $queryBuilder->leftJoin('m_perhitungan_nilai as pengendalian_nilai', 'pengendalian_nilai.nilai', '=', 'tbl_resiko.resiko_pengendalian_nilai');

            $queryBuilder->where('tbl_resiko.mr_id', $request->mr_id);
            $queryBuilder->orderBy('tbl_resiko.dibuat_pada', 'ASC');

            $this->data->resiko = $queryBuilder->get();
            $this->data->year = array();
            $this->data->pointing = array();
            foreach ($this->data->resiko as $key => $value) {
                $value->inovasi = ResikoInovasiModel::leftJoin('m_perhitungan_nilai', 'm_perhitungan_nilai.nilai', '=', 'tbl_resiko_inovasi.resiko_nilai')->where('id', $value->inovasi_id)->first();
                $data = array(
                    'pernyataan' => $value->resiko_kode,
                    'inherent'  => $value->resiko_penilaian_nilai,
                    'controlled' => $value->resiko_pengendalian_nilai,
                    'respon'    => $value->inovasi->resiko_nilai
                );

                if (!in_array($value->inovasi->resiko_tahun, $this->data->year)) {
                    array_push($this->data->year, $value->inovasi->resiko_tahun);
                }

                if (!isset($this->data->pointing[$value->inovasi->resiko_tahun])) {
                    $this->data->pointing[$value->inovasi->resiko_tahun] = array();
                }

                array_push($this->data->pointing[$value->inovasi->resiko_tahun], $data);
            }

            sort($this->data->year);

            $data = $this->data;

            $view = view('formulir.komitmen-mr.komitmen-mr-peta', compact('data'))->render();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => null,
                'view'      => $view
            );

            return json_encode($response);
            die;
        } else if ($request->tipe == 'jadwal') {
            $data = $this->_get_jadwal($request);
        } else if ($request->tipe == 'indikator_kegiatan') {
            $data = $this->_get_indikator_kegiatan($request);
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        } else if ($request->tipe == 'sasaran_kegiatan') {
            $data = $this->_get_sasaran_kegiatan($request);
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        } else if ($request->tipe == 'indikator_program') {
            $data = $this->_get_indikator_program($request);
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        } else if ($request->tipe == 'paket') {
            $data = DB::table('tbl_paket_pekerjaan')->where('kdgiat', $request->kdgiat)->where('kdsatker', $request->kdsatker)->get();
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        }
        // update
        else if ($request->tipe == 'paket_placeholder') {
            $data = DB::table('tbl_paket_pekerjaan')->where('id', $request->paket_id)->get();
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
        }
        // end update
        else if ($request->tipe == 'indikator_sasaran') {
            $data = $this->_get_indikator_sasaran($request);
            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil.',
                'data'      => $data
            );

            return json_encode($response);
            die;
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
        }

        return $data;
    }

    public function _get_sasaran($request)
    {
        $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'kegiatan.kode_kegiatan', 'kegiatan.NAMA', 'ik.INDIKATOR', 'tbl_paket_pekerjaan.nmpaket', 'tbl_komitmen_mr.level', 'program.PROGRAM', 'program.SASARAN', 'ip.INDIKATOR AS IP_INDIKATOR');

        $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
        $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
        $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
        $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
        $queryBuilder->leftJoin('program', 'program.ID', '=', 'tbl_sasaran_t3.program_id');
        $queryBuilder->leftJoin('ip', 'ip.ID', '=', 'tbl_sasaran_t3.ip_id');
        $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

        $queryBuilder->where('tbl_sasaran_t3.mr_id', $request->mr_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_sasaran_t3($request)
    {
        $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'kegiatan.kode_kegiatan',  'kegiatan.NAMA', 'sk.SASARAN', 'ik.INDIKATOR', 'tbl_paket_pekerjaan.nmpaket', 'tbl_komitmen_mr.level');

        $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
        $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
        $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
        $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
        $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

        $queryBuilder->where('tbl_sasaran_t3.mr_id', $request->mr_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_pemangku_kepentingan($request)
    {
        $queryBuilder = DB::table('tbl_paket_pemangku_kepentingan')->select('*');

        $queryBuilder->where('tbl_paket_pemangku_kepentingan.mr_id', $request->mr_id);

        $queryBuilder->orderBy('tbl_paket_pemangku_kepentingan.dibuat_pada', 'ASC');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_tujuan($request)
    {
        $queryBuilder = DB::table('tbl_paket_tujuan')->select('*');

        $queryBuilder->where('tbl_paket_tujuan.mr_id', $request->mr_id);

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function _get_resiko($request)
    {
        // sample
        $mr = KomitmenMRModel::find($request->mr_id);

        $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'm_tahap_kegiatan.tahap', 'm_balai_teknis.balai_teknik', 'm_lingkup_risiko.lingkup_risiko', 'm_kategori_risiko.kategori', 'm_sumber_risiko.sumber_risiko', 'kegiatan_dampak.dampak as caption_kegiatan_dampak', 'penilaian_kriteria.level_kemungkinan as caption_penilaian_level_kemungkinan', 'penilaian_dampak.dampak as caption_penilaian_dampak', 'm_memadai.memadai_belum', 'pengendalian_kriteria.level_kemungkinan as caption_pengendalian_level_kemungkinan', 'pengendalian_dampak.dampak as caption_pengendalian_dampak', 'm_respon_risiko.respon_risiko', 'm_dampak.dampak as nama_dampak', 'eselon-2.NAMA as nama_pembina', DB::raw('(SELECT id FROM tbl_resiko_inovasi where resiko_id=tbl_resiko.id order by resiko_nilai desc limit 1) as inovasi_id'), 'tbl_resiko_inovasi.resiko_deskripsi', 'tbl_resiko_inovasi.resiko_alokasi', 'tbl_resiko_inovasi.resiko_kemungkinan', 'tbl_resiko_inovasi.resiko_dampak', 'tbl_resiko_inovasi.resiko_nilai', 'tbl_resiko_inovasi.resiko_penanggung_jawab', 'tbl_resiko_inovasi.resiko_tanggal_mulai', 'tbl_resiko_inovasi.resiko_tanggal_akhir', 'tbl_resiko_inovasi.resiko_tahun', 'tbl_resiko_inovasi.resiko_triwulan', 'tbl_resiko_inovasi.resiko_indikator', 'inovasi_kriteria.level_kemungkinan as caption_inovasi_level_kemungkinan', 'inovasi_dampak.dampak as caption_inovasi_dampak', DB::raw('(SELECT group_concat(alokasi) FROM m_alokasi_sumber_daya where id_alokasi in (2, 4)) as alokasi '));
        // SELECT regexp_replace(json_unquote(resiko_alokasi), """, "") as stringified from tbl_resiko_inovasi where id=inovasi_id)
        // $queryBuilder = ResikoModel::select('tbl_resiko.*');

        $queryBuilder->addSelect('tbl_sasaran_t3.kegiatan_tujuan', 'tbl_sasaran_t3.tujuan_kegiatan');

        $queryBuilder->leftJoin('tbl_sasaran_t3', 'tbl_sasaran_t3.id', '=', 'tbl_resiko.paket_sasaran_id');

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

        $queryBuilder->where('tbl_resiko.mr_id', $request->mr_id);
        $queryBuilder->orderBy('tbl_resiko.resiko_prioritas', 'ASC');
        // $queryBuilder->orderBy('tbl_resiko.dibuat_pada', 'ASC');

        $data = $queryBuilder->get();

        foreach ($data as $key => $value) {
            $value->resiko_alokasi = json_decode($value->resiko_alokasi);

            if (is_array($value->resiko_alokasi)) {
                $alokasi2 = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->whereIn('id_alokasi', $value->resiko_alokasi)->first();
            } else {
                $alokasi2 = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->where('id_alokasi', $value->resiko_alokasi)->first();
            }

            $a = $value->resiko_tahun . ' ';
            if ($value->resiko_triwulan != null) {
                $value->resiko_triwulan1 = json_decode($value->resiko_triwulan);
                $value->resiko_triwulan = json_decode($value->resiko_triwulan);
                if (is_array($value->resiko_triwulan)) {
                    foreach ($value->resiko_triwulan as $k => $v) {
                        $a .= 'Triwulan ' . $v;
                        if (count($value->resiko_triwulan) != ($k + 1)) {
                            $a .= ', ';
                        }
                    }
                }
            }

            $value->resiko_triwulan = $a;

            $value->alokasi2 = $alokasi2 ? $alokasi2->alokasi : null;
        }

        return DataTables::of($data)->make(true);
        // return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    private function _get_jadwal($request)
    {
        $this->data->tahun = new \stdClass();
        $year = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $request->mr_id)->get();
        foreach ($year as $index => $row) {

            $this->data->tahun->{$row->year} = JadwalModel::select('*', DB::raw('"jadwal" as jenis'))->whereNull('parent_id')->get();

            $tahun_filter = $row->year;
            foreach ($this->data->tahun->{$row->year} as $key => $value) {
                if ($value->id == 3) {
                    DB::statement(DB::raw('set @urutan=0'));
                    $value->child = ResikoInovasiModel::select('id', 'resiko_id', 'resiko_deskripsi as nama', DB::raw('"inovasi" as jenis'), DB::raw('@urutan:=@urutan+1 AS urutan'), 'resiko_triwulan')->where('mr_id', $request->mr_id)->where('resiko_tahun', $tahun_filter)->get();

                    foreach ($value->child as $row) {

                        $resiko = ResikoModel::find($row->resiko_id);
                        $row->resiko_kode = $resiko ? $resiko->resiko_kode : '';
                        $row->keterangan = $resiko ? $resiko->resiko_penilaian_keterangan : '';
                        $row->resiko_triwulan = json_decode($row->resiko_triwulan);
                    }
                } else {
                    $value->child = JadwalModel::select('*', DB::raw('"jadwal" as jenis'))->where('parent_id', $value->id)->get();
                }
                $no = 1;
                for ($i = 1; $i <= 12; $i++) {
                    for ($y = 1; $y <= 4; $y++) {
                        $text = 'minggu_' . $no;
                        $value->{$text} = DB::table('t_jadwal')->where('mr_id', $request->mr_id)->where('year', $tahun_filter)->where('jadwal_id', $value->id)->where('minggu', $no)->first();
                        $no++;
                    }
                }

                foreach ($value->child as $idx => $r) {
                    $no = 1;
                    for ($i = 1; $i <= 12; $i++) {
                        for ($y = 1; $y <= 4; $y++) {
                            $text = 'minggu_' . $no;
                            if ($value->id == 3) {
                                $r->{$text} = DB::table('t_jadwal')->where('mr_id', $request->mr_id)->where('inovasi_id', $r->id)->where('minggu', $no)->first();
                            } else {
                                $r->{$text} = DB::table('t_jadwal')->where('mr_id', $request->mr_id)->where('year', $tahun_filter)->where('jadwal_id', $r->id)->where('minggu', $no)->first();
                            }
                            $no++;
                        }
                    }
                }
            }
        }

        $data = $this->data;

        $view = view('formulir.komitmen-mr.komitmen-mr-jadwal', compact('data'))->render();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil.',
            'data'      => null,
            'view'      => $view
        );

        return json_encode($response);
        die;
    }

    public function _get_indikator_kegiatan($request)
    {
        $queryBuilder = DB::table('ik')->select('*');

        if ($request->kegiatan_id) {
            $queryBuilder->where('ik.SK_ID', $request->kegiatan_id);
        }

        $data = $queryBuilder->get();

        return $data;
    }

    public function _get_sasaran_kegiatan($request)
    {
        $querycek = DB::table('sk')->select('*');

        $querycek->where('sk.KEG_ID', $request->kegiatan_id);

        $cek = $querycek->get();

        if (count($cek) >= 2) {
            $queryBuilder = DB::table('sk')->select('*');

            $queryBuilder->where('sk.KEG_ID', $request->kegiatan_id);
            $offset = 0;
            if ($this->data->user->level == 'UPR-T3' || $this->data->user->level == 'UPR-T2' || $this->data->user->level == 'PPK') {
                if (count($cek) == 2) {
                    if ($this->data->user->level == 'UPR-T3' || $this->data->user->level == 'PPK') {
                        $offset = 0;
                    } else {
                        $offset = 1;
                    }
                } else {
                    if ($this->data->user->unit == 'Balai') {
                        $offset = 0;
                    } elseif ($this->data->user->unit == 'Unit Kerja') {
                        $offset = 1;
                    } elseif ($this->data->user->unit == 'Balai Teknik') {
                        $offset = 2;
                    }
                }
                $queryBuilder->skip($offset)->take(1);
            }
            // $queryBuilder->skip($offset)->take(PHP_INT_MAX);
            $data = $queryBuilder->get();
        } else {
            $data = $cek;
        }

        return $data;
    }

    public function _get_indikator_program($request)
    {
        $queryBuilder = DB::table('ip')->select('*');

        $queryBuilder->where('ip.PRO_ID', $request->program_id);
        $data = $queryBuilder->get();

        return $data;
    }

    public function _get_indikator_sasaran($request)
    {
        $queryBuilder = DB::table('ik')->select('*');

        //
        if ($request->sasaran_id) {
            $queryBuilder->where('ik.SK_ID', $request->sasaran_id);
        } else {
            $queryBuilder->where('ik.ID', $request->indikator_sasaran_id);
        }

        $data = $queryBuilder->get();

        return $data;
    }

    public function delete_data($tipe, $id)
    {
        if ($tipe == 'sasaran') {
            if ($this->data->user->level == 'UPR-T3') {
                $data = $this->_delete_sasaran_t3($id);
            } else if ($this->data->user->level == 'UPR-T2' && $this->data->user->unit != 'Balai') {
                $data = $this->_delete_sasaran_t3($id);
            } else {
                $data = $this->_delete_sasaran($id);
            }
        } else if ($tipe == 'pemangku_kepentingan') {
            $data = $this->_delete_pemangku_kepentingan($id);
        } else if ($tipe == 'tujuan') {
            $data = $this->_delete_tujuan($id);
        } else if ($tipe == 'resiko') {
            $data = $this->_delete_resiko($id);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_sasaran($id)
    {
        $data = SasaranT3Model::findOrfail($id)->delete();

        return true;
    }

    private function _delete_sasaran_t3($id)
    {
        $data = SasaranT3Model::findOrfail($id)->delete();

        return true;
    }

    private function _delete_pemangku_kepentingan($id)
    {
        $data = PaketPemangkuKepentinganModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_tujuan($id)
    {
        $data = PaketTujuanModel::findOrfail($id)->delete();

        return true;
    }

    private function _delete_resiko($id)
    {
        DB::beginTransaction();

        $data = ResikoModel::findOrfail($id)->delete();
        $data_inovasi = ResikoInovasiModel::where('resiko_id', $id)->delete();

        DB::commit();

        return true;
    }

    public function detail($id)
    {
        $this->data->komitmen_mr = KomitmenMRModel::with('creator')->findOrfail($id);

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    private function _cek_nomor($nomor, $kode)
    {
        $nomor_exist = KomitmenMRModel::where('mr_nomor', $nomor)->first();
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

        $queryBuilder = KomitmenMRModel::selectRaw('max(right(mr_nomor, 4)) as kode');
        $queryBuilder->where(DB::raw('substring(mr_nomor, 11, 6)'), '=', $periode);
        $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $kode);

        $number_exist = $queryBuilder->first();

        if (!$number_exist->kode) {
            $sequence = '0001';
        } else {
            $sequence = (int) $number_exist->kode + 1;
            $sequence = str_pad($sequence, 4, "0", STR_PAD_LEFT);
        }

        $nomor = $kode . '/MR/' . $periode . '/' . $sequence;

        return $nomor;
    }

    public function _prioritas_resiko($mr_id)
    {
        $data = ResikoModel::where('mr_id', $mr_id)->orderBy('resiko_pengendalian_nilai', 'DESC')->orderBy('resiko_list_dampak', 'ASC')->orderBy('resiko_kegiatan_kategori', 'ASC')->get();

        DB::beginTransaction();
        foreach ($data as $key => $value) {
            $data_exist = ResikoModel::findOrfail($value->id);

            $data_exist->resiko_prioritas = ($key + 1);

            $data_exist->save();
        }

        $data = ResikoModel::where('mr_id', $mr_id)->where('resiko_jenis', 0)->orderBy('dibuat_pada', 'ASC')->get();

        foreach ($data as $key => $value) {
            $data_exist = ResikoModel::findOrfail($value->id);

            $data_exist->resiko_kode = 'R' . ($key + 1);

            $data_exist->save();
        }
        DB::commit();

        return 1;
    }
}
