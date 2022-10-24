<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class PengadaanTanahModel extends Model
{
    protected $table = 'tbl_pelaksanaan_pengadaan_tanah';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
