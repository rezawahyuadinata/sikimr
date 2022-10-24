<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    protected $table = 'm_jadwal';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'parent_id',
        'year',
        'nama'
    ];

}
