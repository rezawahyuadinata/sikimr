<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Master\ProdukModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProdukModel::class, function (Faker $faker) {
    return [
        'produk_id' => Str::uuid(),
        'bumdes_id' => 'e8f9080d-5692-4c38-a61e-b49d45bc56df',
        'merchant_id' => NULL,
        'produk_kategori_id' => null,
        'ukuran_id' => null,
        'satuan_id' => null,
        'produk_kode' => rand(100000000, 999999999),
        'produk_nama' => $faker->name,
        'produk_slug' => Str::slug($faker->name),
        'produk_barcode' => rand(100000000, 999999999),
        'produk_hscode' => rand(100000000, 999999999),
        'produk_berat' => 0,
        'produk_berat_paket' => 0,
        'produk_dimensi_panjang' => 0,
        'produk_dimensi_lebar' => 0,
        'produk_dimensi_tinggi' => 0,
        'produk_deskripsi' => '',
        'produk_label' => '',
        'produk_harga' => 50000,
        'produk_harga_diskon' => 50000,
    ];
});
