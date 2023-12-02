<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaporIzin>
 */
class LaporIzinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_perusahaan' => fake()->name(),
            'alamat_perusahaan' => fake()->unique()->safeEmail(),
            'tanggal_masuk' => now()->format('d-m-Y'),
            'tanggal_izin' => now()->format('d-m-Y'),
            'nomor_izin' => Str::random(10),
            'izin_id' => 3,
            'user_id' => 7,
        ];
    }
}
