<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->string('password')->default(Hash::make('SIPP2021'));
            $table->string('pengguna_foto')->nullable();
            $table->string('user_address')->nullable();
            $table->string('token')->nullable();
            
            $table->string('dibuat_oleh', 36)->nullable();
            $table->timestamp('dibuat_pada')->nullable();
            $table->string('diubah_oleh', 36)->nullable();
            $table->timestamp('diubah_pada')->nullable();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
