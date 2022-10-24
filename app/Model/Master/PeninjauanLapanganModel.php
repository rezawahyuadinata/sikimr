<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PeninjauanLapanganModel extends Model
{
    protected $table        = 'tbl_peninjauan_lapangan';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'id',
        'id_surat',
        'waktu_pelaksanaan',
        'lokasi',
        'pegawai_ditugaskan',
        'hasil_laporan',
        'file_laporan',
        'foto_laporan',
        'deleted_at',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];
}
