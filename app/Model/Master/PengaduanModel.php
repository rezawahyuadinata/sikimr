<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    protected $table        = 'tbl_pengaduan';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'id_surat',
        'nama_pengadu',
        'jenis_pengaduan',
        'kegiatan',
        'pemilik_resiko_ppk',
        'pemilik_resiko_satker',
        'pemilik_resiko_bws',
        'terkait_aph',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
