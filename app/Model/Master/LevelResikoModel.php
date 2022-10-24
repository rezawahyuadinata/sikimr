<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class LevelResikoModel extends Model
{
    protected $table = 'm_level_risiko';
    protected $primaryKey = 'id_level_risiko';
    public $timestamps = false;

    protected $fillable = [
        'id_level_risiko',
        'level_risiko',
        'keterangan',
        'besaran_risiko',
        'nilai_awal',
        'nilai_akhir',
    ];

}
