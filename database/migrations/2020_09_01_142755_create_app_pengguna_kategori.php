<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPenggunaKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_pengguna_kategori', function (Blueprint $table) {
            $table->string('pengguna_kategori_id', 36);
            $table->string('pengguna_kategori_nama', 50);
            $table->string('pengguna_kategori_spesial', 50)->nullable()->unique();
            $table->longText('pengguna_kategori_akses');
            $table->char('pengguna_kategori_tampilkan', 1)->default(1);
            $table->char('pengguna_kategori_status', 1)->default(1);
            
            $table->string('dibuat_oleh', 36);
            $table->timestamp('dibuat_pada');
            $table->string('diubah_oleh', 36)->nullable();
            $table->timestamp('diubah_pada')->nullable();

            $table->primary('pengguna_kategori_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_pengguna_kategori');
    }
}
