<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PpkModel extends Model
{
    protected $table = 'ppk';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'SATKER_ID',
        'NAMA',
        'KETUA',
        'NIP',
        'HP',
        'KODE'
    ];
}
