<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class KriteriaKemungkinanModel extends Model
{
    protected $table = 'm_kriteria_kemungkinan';
    protected $primaryKey = 'id_kriteria_kemungkinan';
    public $timestamps = false;

    protected $fillable = [
        'id_kriteria_kemungkinan',
        'level_kemungkinan',
        'nilai',
        'persentase_risiko_ditoleransi',
        'frekuensi_risiko_ditoleransi',
        'risiko_toleransi_rendah',
    ];

}
