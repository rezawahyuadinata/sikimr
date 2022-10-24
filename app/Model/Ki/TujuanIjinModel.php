<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class TujuanIjinModel extends Model
{
    protected $table = 'm_tujuan_ijin';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
