<?php

namespace App\Http\Controllers\Operator;

use App\Models\Izin;
use App\Models\Sektor;
use App\Models\LaporIzin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekapIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $laporizins = LaporIzin::all()->where('user_id', Auth::id());
        $year_now = \Carbon\Carbon::now()->format('Y');

        $sektors = Sektor::all();
        $sektors_id = Sektor::all()->pluck('id');

        $januaris = []; // Initialize an empty array
        $februaris = []; // Initialize an empty array
        $marets = []; // Initialize an empty array
        $aprils = []; // Initialize an empty array
        $meis = []; // Initialize an empty array
        $junis = []; // Initialize an empty array
        $julis = []; // Initialize an empty array
        $agustuss = []; // Initialize an empty array
        $septembers = []; // Initialize an empty array
        $oktobers = []; // Initialize an empty array
        $novembers = []; // Initialize an empty array
        $desembers = []; // Initialize an empty array

        foreach ($sektors as $sektor) {
            $get_id_izins = Izin::all()->whereIn('sektor_id', $sektor->id)->where('user_id', Auth::id())->pluck('id');

            $januaris[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 1)
                ->where('user_id', Auth::id())
                ->count();
            $februaris[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 2)
                ->where('user_id', Auth::id())
                ->count();
            $marets[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 3)
                ->where('user_id', Auth::id())
                ->count();
            $aprils[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 4)
                ->where('user_id', Auth::id())
                ->count();
            $meis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 5)
                ->where('user_id', Auth::id())
                ->count();
            $junis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 6)
                ->where('user_id', Auth::id())
                ->count();
            $julis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 7)
                ->where('user_id', Auth::id())
                ->count();
            $agustuss[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 8)
                ->where('user_id', Auth::id())
                ->count();
            $septembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 9)
                ->where('user_id', Auth::id())
                ->count();
            $oktobers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 10)
                ->where('user_id', Auth::id())
                ->count();
            $novembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 11)
                ->where('user_id', Auth::id())
                ->count();
            $desembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 12)
                ->where('user_id', Auth::id())
                ->count();
        }

        return view('operator.rekap_izin.index', [
            'sektors' => $sektors,
            'januaris' => $januaris,
            'februaris' => $februaris,
            'marets' => $marets,
            'aprils' => $aprils,
            'meis' => $meis,
            'junis' => $junis,
            'julis' => $julis,
            'agustuss' => $agustuss,
            'septembers' => $septembers,
            'oktobers' => $oktobers,
            'novembers' => $novembers,
            'desembers' => $desembers,
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
