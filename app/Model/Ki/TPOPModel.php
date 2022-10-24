<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class TPOPModel extends Model
{
    protected $table = 'tbl_pelaksanaan_tp_op';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
