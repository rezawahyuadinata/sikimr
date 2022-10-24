<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PembahasanModel extends Model
{
    protected $table        = 'tbl_pembahasan';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'progres_penelaahan',
        'id_surat',
        'memo_dinas',
        'nomor_md',
        'bentuk_pembahasan',
        'tanggal',
        'catatan',
        'poin_pengaduan',
        'file_memo',
        'dokumentasi',
        'batas_waktu_peninjauan',
        'proses',
        'hambatan',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
