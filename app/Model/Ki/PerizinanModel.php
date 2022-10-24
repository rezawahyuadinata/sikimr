<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class PerizinanModel extends Model
{
    protected $table = 'tbl_api_daftar_perizinan';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
