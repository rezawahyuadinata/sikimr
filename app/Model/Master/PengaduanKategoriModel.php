<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PengaduanKategoriModel extends Model
{
    protected $table        = 'tbl_pengaduan_kategori';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'id_surat',
        'kategori',
        'status',
        'keterangan',
        'pendampingan',
        'integritas',
        'perencanaan',
        'pembebasan',
        'tender',
        'pelaksanaan',
        'pemanfaatan',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
