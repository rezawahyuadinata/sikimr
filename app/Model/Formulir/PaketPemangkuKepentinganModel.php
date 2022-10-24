<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;

class PaketPemangkuKepentinganModel extends Model
{
    protected $table = 'tbl_paket_pemangku_kepentingan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'paket_id',
        'mr_id',
        'user_id',
        'pemangku_kepentingan',
        'pemangku_kepentingan_keterangan',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];

}
