<?php

namespace App\Charts;

use App\Models\LaporIzin;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DataPerizinanNonOss
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): array
    {

        $year_now = \Carbon\Carbon::now()->format('Y') -1;

        $lapor_izin_bintan = [];
        $lapor_izin_karimun = [];
        $lapor_izin_anambas = [];
        $lapor_izin_lingga = [];
        $lapor_izin_natuna = [];
        $lapor_izin_batam = [];
        $lapor_izin_tanjungpinang = [];
        $lapor_izin_kepri = [];

        for ($month = 0; $month <= 11; $month++) {
            $lapor_izin_bintan[$month] = LaporIzin::where('user_id', 2)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_karimun[$month] = LaporIzin::where('user_id', 3)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_anambas[$month] = LaporIzin::where('user_id', 4)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_lingga[$month] = LaporIzin::where('user_id', 5)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_natuna[$month] = LaporIzin::where('user_id', 6)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_batam[$month] = LaporIzin::where('user_id', 7)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_tanjungpinang[$month] = LaporIzin::where('user_id', 8)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
            $lapor_izin_kepri[$month] = LaporIzin::where('user_id', 9)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', $month+1)
                ->count();
        }

        return $this->chart->barChart()
            ->setTitle('Data Perizinan Non OSS ' . $year_now)
            ->addData('DPMPTSP Bintan', $lapor_izin_bintan)
            ->addData('DPMPTSP Karimun', $lapor_izin_karimun)
            ->addData('DPMPTSP Anambas', $lapor_izin_anambas)
            ->addData('DPMPTSP Lingga', $lapor_izin_lingga)
            ->addData('DPMPTSP Natuna', $lapor_izin_natuna)
            ->addData('DPMPTSP Batam', $lapor_izin_batam)
            ->addData('DPMPTSP Tanjungpinang', $lapor_izin_tanjungpinang)
            ->addData('DPMPTSP Kepri', $lapor_izin_kepri)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
            ->setGrid()
            ->toVue();
    }
}
