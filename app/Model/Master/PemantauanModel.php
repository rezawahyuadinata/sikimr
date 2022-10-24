<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PemantauanModel extends Model
{
    protected $table        = 'tbl_pemantauan';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'id_surat',
        'tanggal',
        'progres',
        'rekomendasi_harus_tl',
        'rekomendasi_sudah_tl',
        'tgl_batas_waktu',
        'uraian_pemantauan',
        'file_pemantauan',
        'foto_pemantauan',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
