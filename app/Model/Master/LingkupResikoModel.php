<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class LingkupResikoModel extends Model
{
    protected $table = 'm_lingkup_risiko';
    protected $primaryKey = 'id_lingkup_risiko';
    public $timestamps = false;

    protected $fillable = [
        'id_lingkup_risiko',
        'lingkup_risiko',
    ];

}
