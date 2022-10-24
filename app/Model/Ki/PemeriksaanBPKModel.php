<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanBPKModel extends Model
{
    protected $table = 'tbl_pemeriksaan_bpk';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
