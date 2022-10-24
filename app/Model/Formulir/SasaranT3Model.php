<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;

class SasaranT3Model extends Model
{
    protected $table = 'tbl_sasaran_t3';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'mr_id',
        'paket_id',
        'user_id',
        'program_id',
        'ip_id',
        'isp_text',
        'isp_target',
        'isp_satuan',
        'kegiatan_id',
        'sasaran_id',
        'indikator_kegiatan_id',
        'indikator_sasaran_id',
        'paket_id',
        'kegiatan_tujuan',
        'tujuan_kegiatan',
        'tujuan_kegiatan_satuan',
        // 'dibuat_oleh',
        // 'dibuat_pada',
        // 'diubah_oleh',
        // 'diubah_pada',
    ];

}
