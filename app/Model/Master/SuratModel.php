<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    protected $table        = 'tbl_surat';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'tgl_surat',
        'tgl_terima',
        'unit_pengirim',
        'no_surat',
        'perihal',
        'identitas_pelapor', 
        'entitas_pelapor',
        'prosses',
        'tanggal_md',
        'tanggal_tl',
        'waktu',
        'status_tl_nota_dinas',
        'kata_kunci',  
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
