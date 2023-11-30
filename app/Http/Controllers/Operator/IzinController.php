<?php

namespace App\Http\Controllers\Operator;

use App\Models\Izin;
use App\Tables\Izins;
use App\Models\Sektor;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('operator.izin.index', [
            'izins' => Izins::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis_izin = \App\Models\JenisIzin::all();
        $sektor = Sektor::all();
        return view('operator.izin.create', [
            'jenis_izin' => $jenis_izin,
            'sektor' => $sektor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_izin' => 'required',
            'masa_kerja' => 'required',
            'biaya' => 'required',
            'jenis_izin_id' => 'required',
            'sektor_id' => 'required',
        ]);

        Izin::create([
            'nama_izin' => $request->nama_izin,
            'masa_kerja' => $request->masa_kerja,
            'biaya' => $request->biaya,
            'jenis_izin_id' => $request->jenis_izin_id,
            'sektor_id' => $request->sektor_id,
            'user_id' => auth()->user()->id
        ]);
        Toast::title('Permohonan anda berhasil di ajukan!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('izin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Izin $izin)
    {
        //
        $jenis_izin = \App\Models\JenisIzin::all();
        $sektor = Sektor::all();
        return view('operator.izin.show', [
            'izin' => $izin,
            'jenis_izin' => $jenis_izin,
            'sektor' => $sektor,
        ]);
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
    public function update(Request $request, Izin $izin)
    {
        //
        $izin->update([
            'nama_izin' => $request->nama_izin,
            'masa_kerja' => $request->masa_kerja,
            'biaya' => $request->biaya,
            'jenis_izin_id' => $request->jenis_izin_id,
            'sektor_id' => $request->sektor_id,
            'user_id' => Auth::id()
        ]);

        Toast::title('Data berhasil di update!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('izin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Izin $izin)
    {
        //
        $izin->delete();
        Toast::title('Whoops!')
            ->message('Data telah dihapus!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('izin.index');
    }
}
