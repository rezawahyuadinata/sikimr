<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PenggunaKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_pengguna_kategori')->insert([
            'pengguna_kategori_id' => 'd3t4tekn0dev',
            'pengguna_kategori_nama' => 'Developer',
            'pengguna_kategori_spesial' => 'developer',
            'pengguna_kategori_akses' => '{"master":{"main":{"master":{"index":"true"}}},"pengaturan":{"main":{"pengaturan":{"index":"true"},"pengguna-kategori":{"index":"true","read":"true","store":"true","update":"true","destroy":"true"},"pengguna":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true","hak_akses":"true"}}}}',
            'pengguna_kategori_tampilkan' => 0,
            'pengguna_kategori_status' => 1,
            'dibuat_oleh'   => 'System',
            'dibuat_pada'   => date('Y-m-d H:i:s')
        ]);

        DB::table('app_pengguna_kategori')->insert([
            'pengguna_kategori_id' => 'd3t4tekn0admin',
            'pengguna_kategori_nama' => 'Superadmin',
            'pengguna_kategori_spesial' => 'superadmin',
            'pengguna_kategori_akses' => '{"master":{"main":{"master":{"index":"true"},"perusahaan":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}},"hr":{"karyawan-status":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"jabatan":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"karyawan":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"karyawan-divisi":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"karyawan-pendidikan":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}},"manajemen-proyek":{"kode-proyek":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"bendera":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"mitra-kerja":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"pajak":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}},"accounting":{"chart-of-account":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}}},"manajemen-proyek":{"main":{"manajemen-proyek":{"index":"true"},"proyek":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true","pembayaran":"true"},"proyek-pembayaran":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"},"proyek-pengeluaran":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}}},"accounting":{"main":{"accounting":{"index":"true"},"jurnal":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}}},"finance":{"main":{"finance":{"index":"true"}}},"pengaturan":{"main":{"pengaturan":{"index":"true"},"pengguna-kategori":{"index":"true","read":"true","store":"true","update":"true","destroy":"true"},"pengguna":{"index":"true","read":"true","create":"true","store":"true","show":"true","update":"true","destroy":"true"}}}}',
            'pengguna_kategori_tampilkan' => 0,
            'pengguna_kategori_status' => 1,
            'dibuat_oleh'   => 'System',
            'dibuat_pada'   => date('Y-m-d H:i:s')
        ]);
    }
}
