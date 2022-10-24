<?php

namespace App\Model\Ki;

use Illuminate\Database\Eloquent\Model;

class SIDModel extends Model
{
    protected $table = 'tbl_sid';
    protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
