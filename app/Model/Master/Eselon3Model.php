<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Eselon3Model extends Model
{
    protected $table = 'eselon-3';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'ES2_ID',
        'NAMA',
        'PEJABAT',
        'JABATAN',
        'NIP',
        'UPR2',
        'UKI1',
        'UKI2',
    ];

}
