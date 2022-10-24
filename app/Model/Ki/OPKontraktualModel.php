<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class OPKontraktualModel extends Model
{
    protected $table = 'tbl_pelaksanaan_op_kontraktual';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
