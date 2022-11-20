<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [
            [
                'name' => '1987051022',
                'email' => 'images/avatar.png',
                'password' => '',
                'jenis_kelamin' => '1',
                'jabatan' => 'Manager',
                'alamat' => 'Jl. Semangka, No. 17A',
                'telepon' => '081212515427'
            ]
            ];
        DB::table('users')->insert($akun);
    }
}