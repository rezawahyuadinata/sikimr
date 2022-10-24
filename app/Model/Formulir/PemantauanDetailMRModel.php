<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class PemantauanDetailMRModel extends Model
{
    protected $table = 'tbl_pemantauan_detail';
    protected $primaryKey = 'pemantauan_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pemantauan_detail_id',
        'pemantauan_id',
        'resiko_id',
        'inovasi_id',
        'pemantauan_penanggung_jawab',
        'pemantauan_indikator',
        'pemantauan_periode',
        'pemantauan_periode_realisasi',
        'pemantauan_tanggal_awal',
        'pemantauan_tanggal_akhir',
        'pemantauan_hasil',
        'pemantauan_hambatan',
        'pemantauan_tahun',
        'pemantauan_triwulan',
        'pemantauan_inovasi_file',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];
}
