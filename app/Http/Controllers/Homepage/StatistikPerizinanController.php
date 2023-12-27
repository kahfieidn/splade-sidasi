<?php

namespace App\Http\Controllers\Homepage;

use App\Charts\ChartSample;
use App\Charts\DataPerizinanNonOss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistikPerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataPerizinanNonOss $chart)
    {
        //
        return view('homepage.statistik_perizinan', [
            'chart' => $chart->build()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd("here");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
