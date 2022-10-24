<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;

class PaketTujuanModel extends Model
{
    protected $table = 'tbl_paket_tujuan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'paket_id',
        'mr_id',
        'user_id',
        'tujuan_pelaksanaan',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];

}
