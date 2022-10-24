<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPenggunaAkses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_pengguna_akses', function (Blueprint $table) {
            $table->string('pengguna_akses_id', 36);
            $table->string('pengguna_id', 36)->nullable();
            $table->string('pengguna_kategori_id', 36)->nullable();
            $table->boolean('pengguna_akses_aktif')->default(false);

            $table->string('dibuat_oleh', 36)->nullable();
            $table->timestamp('dibuat_pada')->nullable();
            $table->string('diubah_oleh', 36)->nullable();
            $table->timestamp('diubah_pada')->nullable();

            $table->primary('pengguna_akses_id');

            $table->foreign('pengguna_id')->references('id')->on('users');
            $table->foreign('pengguna_kategori_id')->references('pengguna_kategori_id')->on('app_pengguna_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_pengguna_akses');
    }
}
