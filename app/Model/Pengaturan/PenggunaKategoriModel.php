<?php

namespace App\Model\Pengaturan;

use Illuminate\Database\Eloquent\Model;

class PenggunaKategoriModel extends Model
{
    protected $table = 'app_pengguna_kategori';
    protected $primaryKey = 'pengguna_kategori_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pengguna_kategori_id',
        'pengguna_kategori_nama',
        'pengguna_kategori_spesial',
        'pengguna_kategori_akses',
        'pengguna_kategori_tampilkan',
        'pengguna_kategori_status',
        'dibuat_oleh', 'dibuat_pada', 'diubah_oleh', 'diubah_pada'
    ];

    public function scopegetActive() {
        return PenggunaKategoriModel::where('pengguna_kategori_status', true);
    }
}
