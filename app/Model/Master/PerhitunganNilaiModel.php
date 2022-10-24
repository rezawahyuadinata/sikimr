<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PerhitunganNilaiModel extends Model
{
    protected $table = 'm_perhitungan_nilai';
    protected $primaryKey = 'id_nilai';
    public $timestamps = false;

    protected $fillable = [
        'id_nilai',
        'kemungkinan',
        'dampak',
        'nilai',
        'r',
        'g',
        'b'
    ];

}
