<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class KategoriResikoModel extends Model
{
    protected $table = 'm_kategori_risiko';
    protected $primaryKey = 'id_kategori_risiko';
    public $timestamps = false;

    protected $fillable = [
        'id_kategori_risiko',
        'kategori',
        'keterangan'
    ];

}
