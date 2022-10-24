<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class PermohonanIzinModel extends Model
{
    protected $table = 'tbl_api_permohonan_izin';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
