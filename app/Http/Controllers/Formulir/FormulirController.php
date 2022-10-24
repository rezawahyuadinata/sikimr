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
use App\Model\Formulir\ResikoInovasiModel;
use App\Model\Formulir\KomitmenMRModel;
use App\Model\Formulir\SasaranT3Model;
use App\Model\Formulir\PemantauanMRModel;
use App\Model\Master\Eselon3Model;
use App\Model\Master\Eselon2Model;
use App\Model\Master\Eselon1Model;
use App\Model\Master\PpkModel;
use App\Model\Master\SatkerModel;

class FormulirController extends MYController
{
    public function index()
    {
        $info = $this->data;
        $this->data->tahun = isset($_GET['year']) ? $_GET['year'] : date('Y');

        if ($this->data->user->level == 'PPK') {
            $this->data->satker_list = PpkModel::select('*', DB::raw('"PPK" as level'))->where('ppk.SATKER_ID', $this->data->user->satker_id)->where('ppk.KODE', $this->data->user->kode_ppk)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'ppk.SATKER_ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->where('tbl_komitmen_mr.level', $this->data->user->level)->where('tbl_komitmen_mr.kode_ppk', $this->data->user->kode_ppk)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
        } else if ($this->data->user->level == 'UPR-T3') {
            $this->data->satker_list = SatkerModel::select('*', DB::raw('"UPR-T3" as level'))->where('satker.ID', $this->data->user->satker_id)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->where('tbl_komitmen_mr.level', $this->data->user->level)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
            // dd($this->data->satker_list);
            foreach ($this->data->satker_list as $key => $value) {
                $value->child = PpkModel::select('*', DB::raw('"PPK" as level'))->where('ppk.SATKER_ID', $value->satker_id)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', 'ppk.SATKER_ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->where('tbl_komitmen_mr.level', 'PPK')->where('tbl_komitmen_mr.kode_ppk', DB::raw('ppk.KODE'))->orderBy('tbl_komitmen_mr.kode_ppk', 'ASC')->get();
            }
        } else if ($this->data->user->level == 'UPR-T2') {
            $this->data->satker_list = Eselon2Model::select('*', DB::raw('"UPR-T2" as level'))->where('eselon-2.ID', $this->data->user->eselon2_id)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
            foreach ($this->data->satker_list as $key => $value) {
                $value->child = SatkerModel::select('*', DB::raw('"UPR-T3" as level'))->where('ES2_ID', $value->ID)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->where('tbl_komitmen_mr.level', 'UPR-T3')->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
                foreach ($value->child as $idx => $val) {
                    $val->child =
                        PpkModel::select('*', DB::raw('"PPK" as level'))->where('ppk.SATKER_ID', $val->satker_id)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', 'ppk.SATKER_ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->where('tbl_komitmen_mr.level', 'PPK')->where('tbl_komitmen_mr.kode_ppk', DB::raw('ppk.KODE'))->orderBy('tbl_komitmen_mr.kode_ppk', 'ASC')->get();
                }
            }
        } else {
            $queryBuilder = Eselon1Model::select('*', DB::raw('"UPR-T1" as level'))->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon1_id', '=', 'eselon-1.ID');

            if (!in_array($this->data->user->pengguna_kategori->pengguna_kategori_spesial, ['developer', 'superadmin'])) {
                $queryBuilder->where('eselon-1.ID', $this->data->user->eselon1_id);
            }

            $this->data->satker_list = $queryBuilder->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
            foreach ($this->data->satker_list as $key => $value) {
                $value->child = Eselon2Model::select('*', DB::raw('"UPR-T2" as level'))->where('ES1_ID', $value->ID)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.eselon2_id', '=', 'eselon-2.ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
                foreach ($value->child as $idx => $val) {
                    $val->child = SatkerModel::select('*', DB::raw('"UPR-T3" as level'))->where('ES2_ID', $value->ID)->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.satker_id', '=', 'satker.ID')->where('tbl_komitmen_mr.mr_periode', $this->data->tahun)->orderBy('tbl_komitmen_mr.verifikasi', 'ASC')->get();
                }
            }
        }


        // dd($this->data->user->satker);

        foreach ($this->data->satker_list as $key => $value) {
            for ($i = 1; $i <= 4; $i++) {
                $capt = 'triwulan_' . $i;
                $value->{$capt} = PemantauanMRModel::where('mr_id', $value->mr_id)->where('triwulan', $i)->first();
            }
        }

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $info = $this->data;
        $queryBuilder = DB::table('tbl_komitmen_mr')->select('tbl_komitmen_mr.*', 'satker.NAMA as satker_nama', 'eselon-2.NAMA as eselon2_nama', 'eselon-1.NAMA as eselon1_nama');

        // $queryBuilder->addSelect(DB::raw('(SELECT group_concat(tbl_paket_pekerjaan.nmpaket) as nmpaket FROM tbl_paket_pekerjaan LEFT JOIN tbl_sasaran_t3 on tbl_sasaran_t3.paket_id = tbl_paket_pekerjaan.id where tbl_sasaran_t3.mr_id=tbl_komitmen_mr.mr_id LIMIT 1) as paket'));
        // $queryBuilder->addSelect(DB::raw('(SELECT sk.SASARAN FROM sk LEFT JOIN tbl_sasaran_t3 on tbl_sasaran_t3.sasaran_id = sk.ID where tbl_sasaran_t3.mr_id=tbl_komitmen_mr.mr_id LIMIT 1) as sasaran'));
        $queryBuilder->leftJoin('satker', 'satker.ID', '=', 'tbl_komitmen_mr.satker_id');
        $queryBuilder->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_komitmen_mr.eselon2_id');
        $queryBuilder->leftJoin('eselon-1', 'eselon-1.ID', '=', 'tbl_komitmen_mr.eselon1_id');

        if (!in_array($this->data->user->pengguna_kategori->pengguna_kategori_spesial, ['developer', 'superadmin'])) {
            if ($this->data->user->level == 'PPK') {
                $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode);
            } else if ($this->data->user->level == 'UPR-T3') {
                $queryBuilder->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode);
            } elseif ($this->data->user->level == 'UPR-T2') {
                $queryBuilder->where(function ($query) use ($info) {
                    $query->where(DB::raw('substring(mr_nomor, 1, 6)'), '=', $this->data->user->kode)
                        ->orWhere('satker.ES2_ID', $info->user->satker->ID);
                });
            }
        }

        $response = $queryBuilder->get();
        foreach ($response as $key => $value) {
            $value->year = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $value->mr_id)->get();
            foreach ($value->year as $index => $val) {
                for ($i = 1; $i <= 4; $i++) {
                    $capt = 'triwulan_' . $i;
                    $val->{$capt} = PemantauanMRModel::where('tahun', $val->year)->where('triwulan', $i)->first();
                }
            }
        }
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($response)->make(true);
    }

    public function detail($id)
    {
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

        $this->data->komitmen_mr = KomitmenMRModel::with('creator', 'satker', 'pemangku_kepentingan', 'paket_tujuan')->findOrfail($id);

        if ($this->data->komitmen_mr->level == 'UPR-T3' || $this->data->komitmen_mr->level == 'PPK') {
            $this->data->komitmen_mr->pemilik_resiko = $this->data->komitmen_mr->satker->KEPALA;
            $this->data->komitmen_mr->pemilik_resiko_jabatan = 'Kepala ' . $this->data->komitmen_mr->satker->NAMA;
            $this->data->komitmen_mr->pemilik_resiko_nip = $this->data->komitmen_mr->satker->NIP;
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->satker->KEPALA;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = 'Kepala ' . $this->data->komitmen_mr->satker->NAMA;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->satker->NIP;
            $this->data->komitmen_mr->kode = str_pad($this->data->komitmen_mr->satker->KODE, 6, 0, STR_PAD_LEFT);

            $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'kegiatan.NAMA', 'sk.SASARAN', 'ik.INDIKATOR', 'tbl_paket_pekerjaan.nmpaket');

            $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', 'tbl_sasaran_t3.kegiatan_id');
            $queryBuilder->leftJoin('ik', 'ik.ID', 'tbl_sasaran_t3.indikator_sasaran_id');
            $queryBuilder->leftJoin('sk', 'sk.ID', 'tbl_sasaran_t3.sasaran_id');
            $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', 'tbl_sasaran_t3.paket_id');


            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);

            $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();
        } elseif ($this->data->komitmen_mr->level == 'UPR-T2' && $this->data->komitmen_mr->creator->unit != 'Balai') {
            $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'tbl_sasaran_t3.kegiatan_tujuan as nmpaket', 'tbl_sasaran_t3.*', 'kegiatan.kode_kegiatan', 'kegiatan.NAMA', 'sk.SASARAN', 'ik.INDIKATOR', 'tbl_komitmen_mr.level');

            $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
            $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
            $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
            $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
            $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);

            $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();
        } else {
            $queryBuilder = DB::table('tbl_sasaran_t3')->select(DB::raw('DISTINCT(tbl_sasaran_t3.program_id)'), 'program.SASARAN');
            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);
            $queryBuilder->leftJoin('program', 'program.ID', '=', 'tbl_sasaran_t3.program_id');
            $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();
            foreach ($this->data->komitmen_mr->sasaran_t3 as $ks => $vs) {
                $queryBuilder = DB::table('tbl_sasaran_t3')->select(DB::raw('DISTINCT(tbl_sasaran_t3.ip_id)'), 'ip.INDIKATOR', 'tbl_sasaran_t3.isp_text', 'tbl_sasaran_t3.isp_target', 'tbl_sasaran_t3.isp_satuan');
                $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);
                $queryBuilder->where('tbl_sasaran_t3.program_id', $vs->program_id);
                $queryBuilder->leftJoin('ip', 'ip.ID', '=', 'tbl_sasaran_t3.ip_id');
                $vs->sasaran_list = $queryBuilder->get();

                foreach ($vs->sasaran_list as $ki => $vi) {
                    $queryBuilder = DB::table('tbl_sasaran_t3')->select(DB::raw('DISTINCT(tbl_sasaran_t3.kegiatan_id)'), DB::raw('CONCAT(kegiatan.kode_kegiatan, " - ",kegiatan.NAMA) as nmpaket'));
                    $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);
                    $queryBuilder->where('tbl_sasaran_t3.program_id', $vs->program_id);
                    $queryBuilder->where('tbl_sasaran_t3.ip_id', $vi->ip_id);
                    $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
                    $vi->nmpaket = $queryBuilder->get();

                    foreach ($vi->nmpaket as $kp => $vp) {
                        $queryBuilder = DB::table('tbl_sasaran_t3')->select(DB::raw('DISTINCT(tbl_sasaran_t3.sasaran_id)'), 'sk.SASARAN');
                        $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);
                        $queryBuilder->where('tbl_sasaran_t3.program_id', $vs->program_id);
                        $queryBuilder->where('tbl_sasaran_t3.ip_id', $vi->ip_id);
                        $queryBuilder->where('tbl_sasaran_t3.kegiatan_id', $vp->kegiatan_id);
                        $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
                        $vp->tujuan_kegiatan_utama = $queryBuilder->get();

                        foreach ($vp->tujuan_kegiatan_utama as $ktku => $vtku) {
                            $queryBuilder = DB::table('tbl_sasaran_t3')->select('*');
                            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);
                            $queryBuilder->where('tbl_sasaran_t3.program_id', $vs->program_id);
                            $queryBuilder->where('tbl_sasaran_t3.ip_id', $vi->ip_id);
                            $queryBuilder->where('tbl_sasaran_t3.kegiatan_id', $vp->kegiatan_id);
                            $queryBuilder->where('tbl_sasaran_t3.sasaran_id', $vtku->sasaran_id);

                            $vtku->list = $queryBuilder->get();
                        }
                    }
                }
            }

            // $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'kegiatan.kode_kegiatan', 'tbl_komitmen_mr.level', 'program.SASARAN', 'ip.INDIKATOR', DB::raw('CONCAT(kegiatan.kode_kegiatan, " - ",kegiatan.NAMA) as nmpaket'));

            // $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
            // $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
            // $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
            // $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
            // $queryBuilder->leftJoin('program', 'program.ID', '=', 'tbl_sasaran_t3.program_id');
            // $queryBuilder->leftJoin('ip', 'ip.ID', '=', 'tbl_sasaran_t3.ip_id');
            // $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

            // $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);

            // $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();
        }

        if ($this->data->komitmen_mr->level == 'UPR-T2') {
            $this->data->komitmen_mr->eselon2 = Eselon2Model::where('ID', $this->data->komitmen_mr->eselon2_id)->where('UPR2', 'Pemilik Risiko')->first();
            $this->data->komitmen_mr->pemilik_resiko = $this->data->komitmen_mr->eselon2->PEJABAT;
            $this->data->komitmen_mr->pemilik_resiko_jabatan = $this->data->komitmen_mr->eselon2->JABATAN;
            $this->data->komitmen_mr->pemilik_resiko_nip = $this->data->komitmen_mr->eselon2->NIP;
            $this->data->komitmen_mr->pengelola = Eselon3Model::where('ES2_ID', $this->data->komitmen_mr->eselon2_id)->where('UPR2', 'Pengelola Risiko')->first();
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;
            $this->data->komitmen_mr->kode = str_pad($this->data->komitmen_mr->eselon2->DIPA, 6, 0, STR_PAD_LEFT);
        } else if ($this->data->komitmen_mr->level == 'UPR-T1') {
            $this->data->komitmen_mr->satker = Eselon1Model::where('ID', $this->data->komitmen_mr->eselon1_id)->first();
            $this->data->komitmen_mr->pemilik_resiko = $this->data->komitmen_mr->satker->PEJABAT;
            $this->data->komitmen_mr->pemilik_resiko_jabatan = $this->data->komitmen_mr->satker->JABATAN;
            $this->data->komitmen_mr->pemilik_resiko_nip = $this->data->komitmen_mr->satker->NIP;
            $this->data->komitmen_mr->pengelola = Eselon2Model::where('ES1_ID', $this->data->komitmen_mr->eselon1_id)->where('UPR1', 'Pengelola Risiko')->first();
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;
            $this->data->komitmen_mr->kode = str_pad($this->data->komitmen_mr->pengelola->DIPA, 6, 0, STR_PAD_LEFT);
        }

        $queryBuilder = DB::table('tbl_resiko')->select('tbl_resiko.*', 'm_tahap_kegiatan.tahap', 'm_balai_teknis.balai_teknik', 'm_lingkup_risiko.lingkup_risiko', 'm_kategori_risiko.kategori', 'm_sumber_risiko.sumber_risiko', 'kegiatan_dampak.dampak as caption_kegiatan_dampak', 'penilaian_kriteria.level_kemungkinan as caption_penilaian_level_kemungkinan', 'penilaian_dampak.dampak as caption_penilaian_dampak', 'm_memadai.memadai_belum', 'pengendalian_kriteria.level_kemungkinan as caption_pengendalian_level_kemungkinan', 'pengendalian_dampak.dampak as caption_pengendalian_dampak', 'm_respon_risiko.respon_risiko', 'm_dampak.dampak as nama_dampak', 'm_perhitungan_nilai.r', 'm_perhitungan_nilai.g', 'm_perhitungan_nilai.b', 'pengendalian_nilai.r as pr', 'pengendalian_nilai.g as pg', 'pengendalian_nilai.b as pb', 'eselon-2.NAMA as nama_pembina', DB::raw('(SELECT id FROM tbl_resiko_inovasi where resiko_id=tbl_resiko.id order by resiko_nilai desc limit 1) as inovasi_id'), 'tbl_resiko_inovasi.resiko_deskripsi', 'tbl_resiko_inovasi.resiko_alokasi', 'tbl_resiko_inovasi.resiko_kemungkinan', 'tbl_resiko_inovasi.resiko_dampak', 'tbl_resiko_inovasi.resiko_nilai', 'tbl_resiko_inovasi.resiko_penanggung_jawab', 'tbl_resiko_inovasi.resiko_tanggal_mulai', 'tbl_resiko_inovasi.resiko_tanggal_akhir', 'tbl_resiko_inovasi.resiko_tahun', 'tbl_resiko_inovasi.resiko_triwulan', 'tbl_resiko_inovasi.resiko_indikator', 'inovasi_kriteria.level_kemungkinan as caption_inovasi_level_kemungkinan', 'inovasi_dampak.dampak as caption_inovasi_dampak', DB::raw('(SELECT group_concat(alokasi) FROM m_alokasi_sumber_daya where id_alokasi in (2, 4)) as alokasi '));

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
        $queryBuilder->leftJoin('m_perhitungan_nilai', 'm_perhitungan_nilai.nilai', '=', 'tbl_resiko.resiko_penilaian_nilai');
        $queryBuilder->leftJoin('m_perhitungan_nilai as pengendalian_nilai', 'pengendalian_nilai.nilai', '=', 'tbl_resiko.resiko_pengendalian_nilai');
        $queryBuilder->leftJoin('m_dampak', 'm_dampak.id_dampak', '=', 'tbl_resiko.resiko_list_dampak');
        $queryBuilder->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_resiko.resiko_kegiatan_pembina');
        $queryBuilder->leftJoin('tbl_resiko_inovasi', 'tbl_resiko_inovasi.resiko_id', '=', 'tbl_resiko.id');
        $queryBuilder->leftJoin('m_kriteria_kemungkinan as inovasi_kriteria', 'inovasi_kriteria.id_kriteria_kemungkinan', '=', 'tbl_resiko_inovasi.resiko_kemungkinan');
        $queryBuilder->leftJoin('m_kriteria_dampak as inovasi_dampak', 'inovasi_dampak.id_kriteria_dampak', '=', 'tbl_resiko_inovasi.resiko_dampak');

        $queryBuilder->where('tbl_resiko.mr_id', $id);
        $queryBuilder->orderBy('tbl_resiko.dibuat_pada', 'ASC');
        $queryBuilder->orderBy('tbl_resiko.resiko_prioritas', 'ASC');
        $queryBuilder->orderBy('tbl_resiko.resiko_pengendalian_nilai', 'DESC');

        $this->data->komitmen_mr->resiko = $queryBuilder->get();

        $this->data->pointing = array();
        foreach ($this->data->komitmen_mr->resiko as $key => $value) {
            $value->inovasi = ResikoInovasiModel::select('*')->leftJoin('m_perhitungan_nilai', 'm_perhitungan_nilai.nilai', '=', 'tbl_resiko_inovasi.resiko_nilai')->where('id', $value->inovasi_id)->first();

            $value->inovasi->resiko_alokasi = json_decode($value->inovasi->resiko_alokasi);

            if (is_array($value->inovasi->resiko_alokasi) == 1) {
                $value->alokasi = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->whereIn('id_alokasi', $value->inovasi->resiko_alokasi)->first();
            } else {
                $value->alokasi = AlokasiSumberDayaModel::select(DB::raw('group_concat(alokasi) as alokasi'))->where('id_alokasi', $value->inovasi->resiko_alokasi)->first();
            }


            $a = $value->inovasi->resiko_tahun . ' ';
            if ($value->inovasi->resiko_triwulan) {
                $value->inovasi->resiko_triwulan = json_decode($value->inovasi->resiko_triwulan);
                if (is_array($value->resiko_triwulan)) {
                    foreach ($value->resiko_triwulan as $k => $v) {
                        $a .= 'Triwulan ' . $v;
                        if (count($value->resiko_triwulan) != ($k + 1)) {
                            $a .= ', ';
                        }
                    }
                }
            }

            $value->inovasi->resiko_triwulan = $a;
            // $value->inovasi->resiko_triwulan = 'asu';

            $data = array(
                'pernyataan' => $value->resiko_kode,
                'inherent'  => $value->resiko_penilaian_nilai,
                'controlled' => $value->resiko_pengendalian_nilai,
                'respon'    => $value->inovasi->resiko_nilai
            );

            array_push($this->data->pointing, $data);
        }

        // dd($value->inovasi);

        $this->data->tahun = new \stdClass();
        $year = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $id)->get();

        foreach ($year as $index => $row) {
            if ($row->year) {
                $this->data->tahun->{$row->year} = JadwalModel::select('*', DB::raw('"jadwal" as jenis'))->whereNull('parent_id')->get();

                $tahun_filter = $row->year;
                foreach ($this->data->tahun->{$row->year} as $key => $value) {
                    if ($value->id == 3) {
                        DB::statement(DB::raw('set @urutan=0'));
                        $value->child = ResikoInovasiModel::select('id', 'resiko_id', 'resiko_deskripsi as nama', DB::raw('"inovasi" as jenis'), DB::raw('@urutan:=@urutan+1 AS urutan'), 'resiko_triwulan')->where('mr_id', $id)->where('resiko_tahun', $tahun_filter)->get();

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
                            $value->{$text} = DB::table('t_jadwal')->where('mr_id', $id)->where('year', $tahun_filter)->where('jadwal_id', $value->id)->where('minggu', $no)->first();
                            $no++;
                        }
                    }

                    foreach ($value->child as $idx => $r) {
                        $no = 1;
                        for ($i = 1; $i <= 12; $i++) {
                            for ($y = 1; $y <= 4; $y++) {
                                $text = 'minggu_' . $no;
                                if ($value->id == 3) {
                                    $r->{$text} = DB::table('t_jadwal')->where('mr_id', $id)->where('inovasi_id', $r->id)->where('minggu', $no)->first();
                                } else {
                                    $r->{$text} = DB::table('t_jadwal')->where('mr_id', $id)->where('year', $tahun_filter)->where('jadwal_id', $r->id)->where('minggu', $no)->first();
                                }
                                $no++;
                            }
                        }
                    }
                }
            }
        }

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function pemantauan($id)
    {
        $this->data->pemantauan_mr = PemantauanMRModel::findOrfail($id);

        $queryBuilder = DB::table('tbl_pemantauan_detail')->select('tbl_pemantauan_detail.*', 'tbl_resiko.resiko_respon', 'tbl_resiko.resiko_pernyataan', 'tbl_resiko.resiko_kegiatan_penyebab', 'tbl_resiko_inovasi.resiko_deskripsi', 'm_respon_risiko.respon_risiko', 'tbl_resiko.resiko_penilaian_keterangan');

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
        DB::table('tbl_pemantauan_mr')->where('mr_id', $id)->delete();
        DB::table('tbl_pemantauan_resiko')->where('mr_id', $id)->delete();
        DB::table('tbl_tinjauan_mr')->where('mr_id', $id)->delete();
        $data = KomitmenMRModel::findOrfail($id)->delete();
        DB::commit();
        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
