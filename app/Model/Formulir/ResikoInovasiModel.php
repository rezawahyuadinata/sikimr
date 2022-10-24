<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\Model\Master\InovasiPengendalianModel;

class ResikoInovasiModel extends Model
{
    protected $table = 'tbl_resiko_inovasi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'resiko_id',
        'mr_id',
        'resiko_inovasi',
        'resiko_deskripsi',
        'resiko_alokasi',
        'resiko_kemungkinan',
        'resiko_dampak',
        'resiko_nilai',
        'resiko_penanggung_jawab',
        'resiko_tanggal_mulai',
        'resiko_tanggal_akhir',
        'resiko_tahun',
        'resiko_triwulan',
        'resiko_indikator',
        'resiko_prioritas',
    ];

    public function inovasi()
    {
        return $this->hasOne(InovasiPengendalianModel::class, 'id_inovasi_pengendalian', 'resiko_inovasi');
    }
}
