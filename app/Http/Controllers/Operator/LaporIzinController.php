<?php

namespace App\Http\Controllers\Operator;

use App\Models\Izin;
use App\Models\LaporIzin;
use App\Tables\LaporIzins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class LaporIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('operator.lapor_izin.index', [
            'lapor_izins' => LaporIzins::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $izin = Izin::where('user_id', Auth::id())->get();
        return view('operator.lapor_izin.create', [
            'izin' => $izin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'tanggal_masuk' => 'date',
            'tanggal_izin' => 'date',
            'nomor_izin' => 'required',
            'izin_id' => 'required',
        ]);

        LaporIzin::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_izin' => $request->tanggal_izin,
            'nomor_izin' => $request->nomor_izin,
            'izin_id' => $request->izin_id,
            'user_id' => Auth::id()
        ]);

        Toast::title('Data berhasil di Simpan!')
        ->rightBottom()
        ->autoDismiss(10);
        return to_route('lapor-izin.index');
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
