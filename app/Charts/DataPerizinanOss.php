<?php

namespace App\Charts;

use App\Models\LaporIzin;
use App\Models\LaporIzinOss;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DataPerizinanOss
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): array
    {
        $year_now = \Carbon\Carbon::now()->format('Y') -1;

        $bulanNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $lapor_izin_bintan = [];
        $lapor_izin_karimun = [];
        $lapor_izin_anambas = [];
        $lapor_izin_lingga = [];
        $lapor_izin_natuna = [];
        $lapor_izin_batam = [];
        $lapor_izin_tanjungpinang = [];
        $lapor_izin_kepri = [];

        for ($month = 0; $month <= 11; $month++) {
            $namaBulan = $bulanNames[$month];

            $lapor_izin_bintan[$month] = LaporIzinOss::where('user_id', 2)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_karimun[$month] = LaporIzinOss::where('user_id', 3)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_anambas[$month] = LaporIzinOss::where('user_id', 4)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_lingga[$month] = LaporIzinOss::where('user_id', 5)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_natuna[$month] = LaporIzinOss::where('user_id', 6)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_batam[$month] = LaporIzinOss::where('user_id', 7)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_tanjungpinang[$month] = LaporIzinOss::where('user_id', 8)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;

            $lapor_izin_kepri[$month] = LaporIzinOss::where('user_id', 9)
                ->where('bulan', $namaBulan)
                ->where('tahun', $year_now)
                ->pluck('jumlah_data')
                ->first() ?? 0;
        }

        return $this->chart->barChart()
            ->setTitle('Data Perizinan OSS ' . $year_now)
            ->addData('DPMPTSP Bintan', $lapor_izin_bintan)
            ->addData('DPMPTSP Karimun', $lapor_izin_karimun)
            ->addData('DPMPTSP Anambas', $lapor_izin_anambas)
            ->addData('DPMPTSP Lingga', $lapor_izin_lingga)
            ->addData('DPMPTSP Natuna', $lapor_izin_natuna)
            ->addData('DPMPTSP Batam', $lapor_izin_batam)
            ->addData('DPMPTSP Tanjungpinang', $lapor_izin_tanjungpinang)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
            ->setGrid()
            ->toVue();
    }
}
