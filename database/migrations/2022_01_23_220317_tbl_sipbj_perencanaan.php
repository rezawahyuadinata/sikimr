<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSipbjPerencanaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_sipbj_perencanaan', function (Blueprint $table) {
        $table->charset = 'utf8mb4';
        $table->collation = 'utf8mb4_general_ci';
        $table->id();
        $table->string('idrupp')->nullable();
        $table->string('namapaket')->nullable();
        $table->string('id_satker')->nullable();
        $table->string('jumlah_pagu')->nullable();
        $table->string('lokasi')->nullable();
        $table->string('stk_kode')->nullable();
        $table->string('tahun_anggaran')->nullable();
        $table->string('pkt_ppk')->nullable();
        $table->string('kak_kpa')->nullable();
        $table->string('idk_kpa')->nullable();
        $table->string('rab_kpa')->nullable();
        $table->string('jd_kpa')->nullable();
        $table->string('spt_kpa')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
