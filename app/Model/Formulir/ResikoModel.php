<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
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
use App\Model\Master\BalaiTeknisModel;

class ResikoModel extends Model
{
    protected $table = 'tbl_resiko';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'paket_id',
        'mr_id',
        'paket_sasaran_id',
        'user_id',
        'resiko_kode',
        'resiko_pernyataan',
        'resiko_kegiatan_tahap', // REL 
        'resiko_kegiatan_lingkup', // REL 
        'resiko_kegiatan_lingkup_jenis',
        'resiko_kegiatan_lingkup_balai', // REL 
        'resiko_kegiatan_kategori', // REL 
        'resiko_kegiatan_penyebab',
        'resiko_kegiatan_sumber', // REL 
        'resiko_kegiatan_kriteria_dampak', // REL 
        'resiko_list_dampak', // update
        'resiko_kegiatan_pembina', //update
        'resiko_kegiatan_dampak',
        'resiko_penilaian_kemungkinan', // REL 
        'resiko_penilaian_dampak', // REL 
        'resiko_penilaian_nilai',
        'resiko_pengendalian_uraian',
        'resiko_pengendalian_memadai', // REL 
        'resiko_pengendalian_kemungkinan', // REL 
        'resiko_pengendalian_dampak', // REL 
        'resiko_pengendalian_nilai',
        'resiko_penilaian_keterangan',
        'resiko_prioritas',
        'resiko_respon',
        'resiko_jenis',
        'tinjauan_detail_id',
        'pemantauan_id',
        'resiko_status',
        'resiko_verifikasi',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];

    public function resiko_inovasi()
    {
        return $this->hasOne(ResikoInovasiModel::class, 'resiko_id', 'id');
    }

    // update
    public function resiko_respon()
    {
        return $this->hasOne(ResponResikoModel::class, 'id_respon_risiko', 'resiko_respon');
    }
}
