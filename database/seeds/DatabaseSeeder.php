<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PenggunaKategoriSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserAksesSeeder::class);
    }
}
