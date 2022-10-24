<?php

namespace App\Model\Pengaturan;

use Illuminate\Database\Eloquent\Model;

class PenggunaAksesModel extends Model
{
    protected $table = 'app_pengguna_akses';
    protected $primaryKey = 'pengguna_akses_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pengguna_akses_id',
        'pengguna_id',
        'pengguna_kategori_id',
        'pengguna_akses_aktif',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];

    public function scopegetActive() {
        return PenggunaAksesModel::select('app_pengguna_kategori.pengguna_kategori_id', 'app_pengguna_kategori.pengguna_kategori_nama', 'app_pengguna_kategori.pengguna_kategori_spesial', 'app_pengguna_akses.pengguna_akses_id')->leftJoin('app_pengguna_kategori', 'app_pengguna_kategori.pengguna_kategori_id', '=', 'app_pengguna_akses.pengguna_kategori_id')->where('pengguna_akses_aktif', true);
    }

    public function scopegetPenggunaAkses() {
        return PenggunaAksesModel::select('app_pengguna_kategori.pengguna_kategori_id', 'app_pengguna_kategori.pengguna_kategori_nama', 'app_pengguna_kategori.pengguna_kategori_spesial', 'app_pengguna_akses.pengguna_akses_id', 'app_pengguna_akses.pengguna_akses_aktif')->leftJoin('app_pengguna_kategori', 'app_pengguna_kategori.pengguna_kategori_id', '=', 'app_pengguna_akses.pengguna_kategori_id');
    }
}
