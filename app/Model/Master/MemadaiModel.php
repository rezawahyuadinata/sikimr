<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MemadaiModel extends Model
{
    protected $table = 'm_memadai';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'memadai_belum'
    ];

}
