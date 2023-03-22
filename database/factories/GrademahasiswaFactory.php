<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\grademahasiswa>
 */
class GrademahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nisn' => fake()->name(),
            'nama' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
