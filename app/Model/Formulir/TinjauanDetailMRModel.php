<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class TinjauanDetailMRModel extends Model
{
    protected $table = 'tbl_tinjauan_detail';
    protected $primaryKey = 'tinjauan_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'tinjauan_detail_id',
        'pemantauan_id',
        'tinjauan_id',
        'tinjauan_nama',
        'tinjauan_pernyataan',
        'tinjauan_penyebab',
        'tinjauan_kemungkinan',
        'tinjauan_dampak',
        'tinjauan_nilai',
        'tinjauan_level',
        'tinjauan_respon',
        'tinjauan_tahun',
        'tinjauan_triwulan',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];
}
