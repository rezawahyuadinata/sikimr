<?php

namespace App\Model\Pengaturan;

use Illuminate\Database\Eloquent\Model;

class TllhaModel extends Model
{
    protected $table = 'tbl_tllha';

    protected $casts = [
        'nilai' => 'array',
    ];
}
