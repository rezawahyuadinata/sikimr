<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class KriteriaDampakModel extends Model
{
    protected $table = 'm_kriteria_dampak';
    protected $primaryKey = 'id_kriteria_dampak';
    public $timestamps = false;

    protected $fillable = [
        'id_kriteria_dampak',
        'dampak',
        'nilai',
        'keterangan'
    ];

}
