<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class DampakModel extends Model
{
    protected $table = 'm_dampak';
    protected $primaryKey = 'id_dampak';
    public $timestamps = false;

    protected $fillable = [
        'id_dampak',
        'dampak'
    ];
}
