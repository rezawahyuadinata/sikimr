<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Eselon2Model extends Model
{
    protected $table = 'eselon-2';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'ES1_ID',
        'NAMA',
        'PEJABAT',
        'JABATAN',
        'NIP',
        'UPR1',
        'UKI1',
        'UPR2',
        'TIPE',
        'DIPA'
    ];
}
