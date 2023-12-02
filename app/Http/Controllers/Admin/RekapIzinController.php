<?php

namespace App\Http\Controllers\Admin;

use App\Models\Izin;
use App\Models\User;
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
        $tahun = [
            '2023' => '2023',
            '2024' => '2024',
            '2025' => '2025',
            '2026' => '2026',
            '2027' => '2027',
            '2028' => '2028',
            '2029' => '2029',
            '2030' => '2030',
        ];
        $operator = User::whereHas("roles", function($q){ $q->where("name", "operator"); })->get();
        return view('admin.rekap_izin.index', [
            'operator' => $operator,
            'tahun' => $tahun,
        ]);
    }

    public function getRekap(Request $request, User $operator){

        // dd($request->input('operator'));

        $year_now = $request->input('tahun');

        $sektors = Sektor::all();

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
            $get_id_izins = Izin::all()->whereIn('sektor_id', $sektor->id)->where('user_id', $request->input('operator'))->pluck('id');

            $januaris[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 1)
                ->where('user_id', $request->input('operator'))
                ->count();
            $februaris[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 2)
                ->where('user_id', $request->input('operator'))
                ->count();
            $marets[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 3)
                ->where('user_id', $request->input('operator'))
                ->count();
            $aprils[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 4)
                ->where('user_id', $request->input('operator'))
                ->count();
            $meis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 5)
                ->where('user_id', $request->input('operator'))
                ->count();
            $junis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 6)
                ->where('user_id', $request->input('operator'))
                ->count();
            $julis[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 7)
                ->where('user_id', $request->input('operator'))
                ->count();
            $agustuss[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 8)
                ->where('user_id', $request->input('operator'))
                ->count();
            $septembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 9)
                ->where('user_id', $request->input('operator'))
                ->count();
            $oktobers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 10)
                ->where('user_id', $request->input('operator'))
                ->count();
            $novembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 11)
                ->where('user_id', $request->input('operator'))
                ->count();
            $desembers[] = LaporIzin::whereIn('izin_id', $get_id_izins)
                ->whereYear('tanggal_izin', $year_now)
                ->whereMonth('tanggal_izin', 12)
                ->where('user_id', $request->input('operator'))
                ->count();
        }

        return view('admin.rekap_izin.rekap', [
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
            'year_now' => $year_now,
            'operator' => $operator,
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
