<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LaporIzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lapor_izins')->insert([
            'nama_perusahaan' => Str::random(10),
            'alamat_perusahaan' => Str::random(10).'@gmail.com',
            'tanggal_masuk' => Carbon::create('2000', '01', '01'),
            'tanggal_izin' => Carbon::create('2000', '01', '01'),
            'nomor_izin' => Str::random(10).'@gmail.com',
            'izin_id' => 1,
            'user_id' => 1,
        ]);

    }
}
