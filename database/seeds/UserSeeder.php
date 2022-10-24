<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'    => 'd931190d-ef0a-497d-bec0-6acd9e202f41',
            'name' => 'Developer',
            'username' => 'developer',
            'email' => 'info@detatekno.com',
            'active' => true,
            'password' => Hash::make('PSDA2021')
        ]);
    }
}
