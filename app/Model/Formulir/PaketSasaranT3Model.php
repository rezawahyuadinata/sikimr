<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;

class PaketSasaranT3Model extends Model
{
    protected $table = 'tbl_paket_sasaran_t3';
    protected $primaryKey = 'paket_sasaran_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'paket_sasaran_id',
        'paket_id',
        'mr_id',
        'user_id',
        'sasaran_id',
        'sasaran_manual',
        'indikator_id',
        'indikator_manual',
        'kegiatan_id',
        'kegiatan_manual',
        'kegiatan_tujuan',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
    ];

}
