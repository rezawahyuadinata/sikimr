<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class PemantauanBPKModel extends Model
{
    protected $table = 'tbl_pemantauan_bpk';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
