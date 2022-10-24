<?php

use Illuminate\Database\Seeder;

class UserAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_pengguna_akses')->insert([
            'pengguna_akses_id'    => '4e1790ae-d921-4e00-a095-27e622acb4c0',
            'pengguna_id' => 'd931190d-ef0a-497d-bec0-6acd9e202f41',
            'pengguna_kategori_id' => 'd3t4tekn0dev',
            'pengguna_akses_aktif' => true
        ]);
    }
}
