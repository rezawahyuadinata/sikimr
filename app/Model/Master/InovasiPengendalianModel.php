<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class InovasiPengendalianModel extends Model
{
    protected $table = 'm_inovasi_pengendalian';
    protected $primaryKey = 'id_inovasi_pengendalian';
    public $timestamps = false;

    protected $fillable = [
        'id_inovasi_pengendalian',
        'inovasi',
        'keterangan'
    ];

}
