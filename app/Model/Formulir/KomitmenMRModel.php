<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;
use App\Model\Master\Eselon2Model;
use App\Model\Master\Eselon1Model;

class KomitmenMRModel extends Model
{
    protected $table = 'tbl_komitmen_mr';
    protected $primaryKey = 'mr_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'mr_id',
        'mr_nomor',
        'mr_tanggal',
        'mr_periode',
        'mr_status',
        'mr_aktif',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
        'level',
        'satker_id',
        'eselon1_id',
        'eselon2_id',
        'verifikasi',
        'verifikasi_catatan',
    ];

    public function creator() {
        return $this->hasOne(User::class, 'id', 'dibuat_oleh');
    }

    public function updater() {
        return $this->hasOne(User::class, 'id', 'diubah_oleh');
    }

    public function satker() {
        return $this->hasOne(SatkerModel::class, 'ID', 'satker_id');
    }

    public function eselon2() {
        return $this->hasOne(SatkerModel::class, 'ID', 'eselon2_id');
    }

    public function eselon1() {
        return $this->hasOne(SatkerModel::class, 'ID', 'eselon1_id');
    }

    public function pemangku_kepentingan() {
        return $this->hasMany(PaketPemangkuKepentinganModel::class, 'mr_id', 'mr_id');
    }

    public function paket_tujuan() {
        return $this->hasMany(PaketTujuanModel::class, 'mr_id', 'mr_id');
    }

}
