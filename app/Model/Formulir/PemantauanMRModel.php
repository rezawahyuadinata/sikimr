<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class PemantauanMRModel extends Model
{
    protected $table = 'tbl_pemantauan_mr';
    protected $primaryKey = 'pemantauan_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pemantauan_id',
        'mr_id',
        'pemantauan_nomor',
        'pemantauan_tanggal',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
        'triwulan',
        'tahun',
        'level',
        'satker_id',
        'eselon1_id',
        'eselon2_id',
        'pemantauan_status',
        'verifikasi',
        'verifikasi_catatan',
    ];

    public function komitmen_mr() {
        return $this->hasOne(KomitmenMRModel::class, 'mr_id', 'mr_id');
    }
}