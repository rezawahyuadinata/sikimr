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
use App\Model\Formulir\PemantauanDetailMRModel;
use App\Model\Formulir\SasaranT3Model;
use App\Model\Formulir\PemantauanMRModel;
use App\Model\Formulir\PemantauanResikoDetailModel;
use App\Model\Formulir\TinjauanDetailMRModel;
use App\Model\Master\Eselon3Model;
use App\Model\Master\Eselon2Model;
use App\Model\Master\Eselon1Model;
use App\Model\Master\SatkerModel;

class VerifikasiController extends MYController
{
    public function index(Request $request)
    {
        $info = $this->data;
        $queryBuilder = DB::table('tbl_komitmen_mr')->select('tbl_komitmen_mr.*', 'satker.NAMA as satker_nama', 'eselon-2.NAMA as eselon2_nama', 'eselon-1.NAMA as eselon1_nama');
        $queryBuilder->leftJoin('satker', 'satker.ID', '=', 'tbl_komitmen_mr.satker_id');
        $queryBuilder->leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_komitmen_mr.eselon2_id');
        $queryBuilder->leftJoin('eselon-1', 'eselon-1.ID', '=', 'tbl_komitmen_mr.eselon1_id');
        if (!in_array($this->data->user->pengguna_kategori->pengguna_kategori_spesial, ['developer', 'superadmin'])) {
            if ($this->data->user->level == 'UPR-T2') {
                $queryBuilder->where(function ($query) use ($info) {
                    $query->where(DB::raw('substring(tbl_komitmen_mr.mr_nomor, 1, 6)'), '=', $this->data->user->kode)
                        ->orWhere('satker.ES2_ID', $info->user->satker->ID);
                });
                $queryBuilder->whereIn('tbl_komitmen_mr.verifikasi', ['1', '2', '3']);
            } else {
                $queryBuilder->whereIn('tbl_komitmen_mr.verifikasi', ['2', '3']);
                // $queryBuilder->whereIn('tbl_komitmen_mr.verifikasi', ['1', '2']);
            }
        } else {
            $queryBuilder->whereIn('tbl_komitmen_mr.verifikasi', ['1', '2', '3']);
        }

        $queryBuilder->orderBy('tbl_komitmen_mr.verifikasi', 'ASC');
        $this->data->komitmen_mr = $queryBuilder->paginate(10);
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function show($id)
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

        if ($this->data->komitmen_mr->level == 'UPR-T3') {
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
            $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'tbl_sasaran_t3.kegiatan_tujuan as nmpaket', 'tbl_sasaran_t3.tujuan_kegiatan as kegiatan_tujuan', 'kegiatan.NAMA', 'sk.SASARAN', 'ik.INDIKATOR', 'tbl_komitmen_mr.level');

            $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
            $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
            $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
            $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
            $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);

            $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();;
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
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;;
            $this->data->komitmen_mr->kode = str_pad($this->data->komitmen_mr->eselon2->DIPA, 6, 0, STR_PAD_LEFT);
        } else if ($this->data->komitmen_mr->level == 'UPR-T1') {
            $this->data->komitmen_mr->satker = Eselon1Model::where('ID', $this->data->komitmen_mr->eselon1_id)->first();
            $this->data->komitmen_mr->pemilik_resiko = $this->data->komitmen_mr->satker->PEJABAT;
            $this->data->komitmen_mr->pemilik_resiko_jabatan = $this->data->komitmen_mr->satker->JABATAN;
            $this->data->komitmen_mr->pemilik_resiko_nip = $this->data->komitmen_mr->satker->NIP;
            $this->data->komitmen_mr->pengelola = Eselon2Model::where('ES1_ID', $this->data->komitmen_mr->eselon1_id)->where('UPR1', 'Pengelola Risiko')->first();
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;;
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

            $data = array(
                'pernyataan' => 'R' . ($key + 1),
                'inherent'  => $value->resiko_penilaian_nilai,
                'controlled' => $value->resiko_pengendalian_nilai,
                'respon'    => $value->inovasi->resiko_nilai
            );

            array_push($this->data->pointing, $data);
        }

        $this->data->tahun = new \stdClass();
        $year = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $id)->get();

        foreach ($year as $index => $row) {
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

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function store(Request $request)
    {
        $mr = KomitmenMRModel::findOrfail($request->mr_id);

        if ($request->verifikasi == '1') {
            if ($mr->verifikasi == '1') {
                $mr->verifikasi = '2';
                $mr->mr_status = 1;
            } else {
                $mr->verifikasi = '3';
                $mr->mr_status = 1;
            }
        } else {
            $mr->verifikasi = '0';
            $mr->mr_status = 2;
        }

        $mr->verifikasi_catatan = $request->verifikasi_catatan;
        $mr->save();

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
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

        if ($this->data->komitmen_mr->level == 'UPR-T3') {
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
            $queryBuilder = DB::table('tbl_sasaran_t3')->select('tbl_sasaran_t3.*', 'tbl_sasaran_t3.kegiatan_tujuan as nmpaket', 'tbl_sasaran_t3.tujuan_kegiatan as kegiatan_tujuan', 'kegiatan.NAMA', 'sk.SASARAN', 'ik.INDIKATOR', 'tbl_komitmen_mr.level');

            $queryBuilder->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', '=', 'tbl_sasaran_t3.mr_id');
            $queryBuilder->leftJoin('kegiatan', 'kegiatan.ID', '=', 'tbl_sasaran_t3.kegiatan_id');
            $queryBuilder->leftJoin('ik', 'ik.ID', '=', 'tbl_sasaran_t3.indikator_sasaran_id');
            $queryBuilder->leftJoin('sk', 'sk.ID', '=', 'tbl_sasaran_t3.sasaran_id');
            $queryBuilder->leftJoin('tbl_paket_pekerjaan', 'tbl_paket_pekerjaan.id', '=', 'tbl_sasaran_t3.paket_id');

            $queryBuilder->where('tbl_sasaran_t3.mr_id', $id);

            $this->data->komitmen_mr->sasaran_t3 = $queryBuilder->get();;
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
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;;
            $this->data->komitmen_mr->kode = str_pad($this->data->komitmen_mr->eselon2->DIPA, 6, 0, STR_PAD_LEFT);
        } else if ($this->data->komitmen_mr->level == 'UPR-T1') {
            $this->data->komitmen_mr->satker = Eselon1Model::where('ID', $this->data->komitmen_mr->eselon1_id)->first();
            $this->data->komitmen_mr->pemilik_resiko = $this->data->komitmen_mr->satker->PEJABAT;
            $this->data->komitmen_mr->pemilik_resiko_jabatan = $this->data->komitmen_mr->satker->JABATAN;
            $this->data->komitmen_mr->pemilik_resiko_nip = $this->data->komitmen_mr->satker->NIP;
            $this->data->komitmen_mr->pengelola = Eselon2Model::where('ES1_ID', $this->data->komitmen_mr->eselon1_id)->where('UPR1', 'Pengelola Risiko')->first();
            $this->data->komitmen_mr->pengelola_resiko = $this->data->komitmen_mr->pengelola->PEJABAT;;
            $this->data->komitmen_mr->pengelola_resiko_jabatan = $this->data->komitmen_mr->pengelola->JABATAN;;
            $this->data->komitmen_mr->pengelola_resiko_nip = $this->data->komitmen_mr->pengelola->NIP;;
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
        $queryBuilder->orderBy('tbl_resiko.resiko_prioritas', 'ASC');

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

            $data = array(
                'pernyataan' => $value->resiko_kode,
                'inherent'  => $value->resiko_penilaian_nilai,
                'controlled' => $value->resiko_pengendalian_nilai,
                'respon'    => $value->inovasi->resiko_nilai
            );

            array_push($this->data->pointing, $data);
        }

        $this->data->tahun = new \stdClass();
        $year = ResikoInovasiModel::select(DB::raw('DISTINCT(resiko_tahun) as year'))->orderBy('resiko_tahun', 'ASC')->where('mr_id', $id)->get();

        foreach ($year as $index => $row) {
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

        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        $data = KomitmenMRModel::findOrfail($id);

        $data->verifikasi = '0';
        $data->verifikasi_catatan = 'Pembatalan verifikasi';

        $getPemantauanID = PemantauanMRModel::select('tbl_pemantauan_mr.pemantauan_id')->leftJoin('tbl_komitmen_mr', 'tbl_komitmen_mr.mr_id', 'tbl_pemantauan_mr.mr_id')->where('tbl_komitmen_mr.mr_id', $data['mr_id'])->first()->toArray();

        if ($getPemantauanID) {
            $dataPemantauanResikoDetail = PemantauanResikoDetailModel::where('pemantauan_id', $getPemantauanID['pemantauan_id'])->delete();

            $dataTinjauanDetail = TinjauanDetailMRModel::where('pemantauan_id', $getPemantauanID['pemantauan_id'])->delete();


            $dataPemantauanDetail = PemantauanDetailMRModel::where('pemantauan_id', $getPemantauanID['pemantauan_id'])->delete();

            $dataPemantauanMR = PemantauanMRModel::findOrfail($getPemantauanID['pemantauan_id'])->delete();
        }

        $data->save();

        DB::commit();

        return true;
    }
}
