<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class ResponResikoModel extends Model
{
    protected $table = 'm_respon_risiko';
    protected $primaryKey = 'id_respon_risiko';
    public $timestamps = false;

    protected $fillable = [
        'id_respon_risiko',
        'respon_risiko',
        'keterangan'
    ];

}
