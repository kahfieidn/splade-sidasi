<?php

namespace App\Http\Controllers\Operator;

use Carbon\Carbon;
use App\Models\Sektor;
use App\Models\LaporIzinOss;
use Illuminate\Http\Request;
use App\Tables\LaporIzinOsses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LaporIzinOSSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('operator.lapor_izin_oss.index', [
            'lapor_izin_oss' => LaporIzinOsses::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $sektor = Sektor::all();

        $jenis_oss = [
            'Perizinan' => 'Perizinan',
        ];

        $bulan = [
            'Januari' => 'Januari',
            'Februari' => 'Februari',
            'Maret' => 'Maret',
            'April' => 'April',
            'Mei' => 'Mei',
            'Juni' => 'Juni',
            'Juli' => 'Juli',
            'Agustus' => 'Agustus',
            'September' => 'September',
            'Oktober' => 'Oktober',
            'November' => 'November',
            'Desember' => 'Desember',
        ];

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

        return view('operator.lapor_izin_oss.create', [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'jenis_oss' => $jenis_oss,
            'sektor' => $sektor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'berkas' => 'required|mimes:xlsx,xls|max:20480',
            'jenis_oss'  => 'required',
            'bulan' => 'required',
            'tahun'  => 'required',
            'jumlah_data'   => 'required'
        ]);

        if ($validator->fails()) {
            return to_route('lapor-izin-oss.create');
        }

        $berkas = $request->file('berkas');
        $berkas->storeAs('public/lapor_izin_oss', $berkas->hashName());

        $lapor_izin_osses = LaporIzinOss::create([
            'berkas' => $berkas->hashName(),
            'jenis_oss' => $request->jenis_oss,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_data' => $request->jumlah_data,
            'user_id' => auth()->user()->id,
        ]);

        $user_id = Auth::id();

        $data_sektor = $request->data_sektor;

        foreach ($data_sektor as &$sektor) {
            $sektor['user_id'] = $user_id;
        }

        $lapor_izin_osses->save();
        $lapor_izin_osses->data_sektor_osses()->createMany($data_sektor);
        return to_route('lapor-izin-oss.index');
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
    public function destroy(LaporIzinOss $lapor_izin_oss)
    {
        //
        Storage::disk('local')->delete('public/lapor_izin_oss/' . basename($lapor_izin_oss->berkas));

        $lapor_izin_oss->delete();
        Toast::title('Whoops!')
            ->message('Data telah dihapus!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('lapor-izin-oss.index');
    }
}
