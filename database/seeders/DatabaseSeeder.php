<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(MerkSeeder::class);
        // $this->call(PegawaiSeeder::class);
        // $this->call(MobilSeeder::class);
        DB::table('users')->insert([
            'name' => 'aditya',
            'email' => 'aditya.alamat007@gmail.com',
            'password' => Hash::make('111'),
            'level' => 'admin',
        ]);
    }
}