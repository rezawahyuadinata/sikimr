<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class TahapKegiatanModel extends Model
{
    protected $table = 'm_tahap_kegiatan';
    protected $primaryKey = 'id_tahap_kegiatan';
    public $timestamps = false;

    protected $fillable = [
        'id_tahap_kegiatan',
        'tahap'
    ];

}
