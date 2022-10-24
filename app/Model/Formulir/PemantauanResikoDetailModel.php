<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class PemantauanResikoDetailModel extends Model
{
    protected $table = 'tbl_pemantauan_resiko_detail';
    protected $primaryKey = 'pemantauan_resiko_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pemantauan_resiko_detail_id',
        'pemantauan_id',
        'pemantauan_resiko_id',
        'pemantauan_resiko_pernyataan',
        'pemantauan_resiko_jumlah',
        'pemantauan_resiko_kemungkinan',
        'pemantauan_resiko_dampak',
        'pemantauan_resiko_nilai',
        'pemantauan_resiko_kemungkinan_act',
        'pemantauan_resiko_dampak_act',
        'pemantauan_resiko_nilai_act',
        'pemantauan_resiko_selisih',
        'pemantauan_resiko_rekomendasi',
        'pemantauan_resiko_tahun',
        'pemantauan_resiko_triwulan',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];
}
