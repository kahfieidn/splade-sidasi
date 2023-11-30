<?php

namespace App\Http\Controllers\Operator;

use Throwable;
use Illuminate\Http\Request;
use App\Imports\LaporIzinsImport;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;

class LaporIzinImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('operator.lapor_izin_import.index');
    }


    public function import(Request $request)
    {
        // $import = Excel::import(new LaporIzinsImport, $request->file('file'));
        $file = $request->file('file');
        $import = new LaporIzinsImport;

        try {
            $import->import($file);
            Toast::title('Data berhasil di Simpan!')
                ->rightBottom()
                ->autoDismiss(10);
            return to_route('lapor-izin.index');
        } catch (Throwable $e) {
            $failures = $e->getMessage();
            return to_route('lapor-izin-import.index')->withErrors($e->getMessage());
        }
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
