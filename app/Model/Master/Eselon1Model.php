<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Eselon1Model extends Model
{
    protected $table = 'eselon-1';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'ES0_ID',
        'NAMA',
        'PEJABAT',
        'JABATAN',
        'UPR',
        'POSISI'
    ];

}
