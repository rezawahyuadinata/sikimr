<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class AlokasiSumberDayaModel extends Model
{
    protected $table = 'm_alokasi_sumber_daya';
    protected $primaryKey = 'id_alokasi';
    public $timestamps = false;

    protected $fillable = [
        'id_alokasi',
        'alokasi'
    ];

}
