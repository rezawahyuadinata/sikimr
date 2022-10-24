<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PbjProvModel extends Model
{
    protected $table = 'pbj_per_prov';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'provinsi',
        'TOTAL_KONTRAK_PKT',
        'TOTAL_KONTRAK_PAGU_DIPA',
        'TOTAL_KONTRAK_PAGU_PENGADAAN',
        'TERKONTRAK_PKT',
        'TERKONTRAK_PAGU_DIPA',
        'TERKONTRAK_PAGU_PENGADAAN',
        'PERSIAPAN_PKT',
        'PERSIAPAN_PAGU_DIPA',
        'PERSIAPAN_PAGU_PENGADAAN',
        'PROSES_LELANG_PKT',
        'PROSES_LELANG_PAGU_DIPA',
        'PROSES_LELANG_PAGU_PENGADAAN',
        'BELUM_LELANG_PKT',
        'BELUM_LELANG_PAGU_DIPA',
        'BELUM_LELANG_PAGU_PENGADAAN',
    ];
}
