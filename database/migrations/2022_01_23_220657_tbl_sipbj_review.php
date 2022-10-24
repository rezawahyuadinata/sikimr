<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSipbjReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_sipbj_review', function (Blueprint $table) {
        $table->charset = 'utf8mb4';
        $table->collation = 'utf8mb4_general_ci';
        $table->id();
        $table->string('idrupp')->nullable();
        $table->string('namapaket')->nullable();
        $table->string('id_satker')->nullable();
        $table->string('usulan_pkt')->nullable();
        $table->string('pnt')->nullable();
        $table->string('spektek_pkj')->nullable();
        $table->string('rancangan_kontrak_pkj')->nullable();
        $table->string('hps_pkj')->nullable();
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
