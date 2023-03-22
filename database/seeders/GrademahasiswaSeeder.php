<?php

namespace Database\Seeders;

use App\Models\grademahasiswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class GrademahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            grademahasiswa::create([
                'nisn' => 202301010000 + $i + 1,
                'nama' => $faker->name(),
                'quiz' => $faker->numberBetween(60, 100),
                'tugas' => $faker->numberBetween(60, 100),
                'absen' => $faker->numberBetween(60, 100),
                'praktek' => $faker->numberBetween(60, 100),
                'uas' => $faker->numberBetween(60, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}