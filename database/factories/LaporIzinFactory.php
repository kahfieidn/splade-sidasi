<?php

namespace Database\Factories;

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
            'tanggal_masuk' => now(),
            'tanggal_izin' => now(),
            'nomor_izin' => now(),
            'izin_id' => 1,
            'user_id' => 1,
        ];

    }
}
