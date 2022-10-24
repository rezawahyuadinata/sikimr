<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class SumberResikoModel extends Model
{
    protected $table = 'm_sumber_risiko';
    protected $primaryKey = 'id_sumber_risiko';
    public $timestamps = false;

    protected $fillable = [
        'id_sumber_risiko',
        'sumber_risiko'
    ];

}
