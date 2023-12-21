<?php

namespace App\Http\Controllers;

use App\Charts\ChartSample;
use App\Charts\UserChart;
use App\Models\User;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    public function index(ChartSample $chart)
    {
        return view('homepage.chart', ['chart' => $chart->build()]);    }
    //
}
