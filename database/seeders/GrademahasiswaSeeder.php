<?php

namespace Database\Seeders;

use Apps\Models\grademahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class GrademahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        grademahasiswa::create([
            'nisn'      =>  '123',
            'nama'      =>  'RAHMAN',
            'quiz'      =>  '87',
            'tugas'     =>  '98',
            'absen'     =>  '67',
            'praktek'   =>  '90',
            'uas'       =>  '90',
            'grade'     =>  'A'

        ]);
    }
}
