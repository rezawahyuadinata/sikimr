<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class TelaahanModel extends Model
{
    protected $table        = 'tbl_telaahan';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'id_surat',
        'nomor',
        'tanggal',
        'distribusi',
        'indikasi_penyimpangan',
        'rekomendasi',
        'key_telaahan',
        'file_telaahan',
        'foto_telaahan',
        'batas_waktu_pemantauan',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
