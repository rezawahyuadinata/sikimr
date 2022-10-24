<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class SatkerModel extends Model
{
    protected $table = 'satker';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'ES2_ID',
        'NAMA',
        'KEPALA',
        'NIP',
        'HP',
        'KODE'
    ];

}
