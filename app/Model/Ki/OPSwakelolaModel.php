<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class OPSwakelolaModel extends Model
{
    protected $table = 'tbl_pelaksanaan_op_swakelola';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
