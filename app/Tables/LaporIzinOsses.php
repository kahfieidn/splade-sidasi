<?php

namespace App\Tables;

use App\Models\LaporIzinOss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class LaporIzinOsses extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return LaporIzinOss::query()->where('user_id', Auth::user()->id);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
        ->withGlobalSearch('Cari data berdasarkan...', ['id', 'jenis_oss', 'berkas', 'bulan', 'tahun'])
        ->selectFilter('bulan', [
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
            'Desember' => 'Desember'
        ])
        ->selectFilter('tahun', [
            '2023' => '2023',
            '2024' => '2024',
            '2025' => '2025',
            '2026' => '2026',
            '2027' => '2027',
            '2028' => '2028',
            '2029' => '2029',
            '2030' => '2030',
        ])
        ->column(key: 'id', label: '#ID', sortable: true)
        ->column(key: 'jenis_oss', label: 'Jenis OSS', sortable: true)
        ->column(key: 'bulan', label: 'Periode Bulan', sortable: true)
        ->column(key: 'tahun', label: 'Periode Tahun', sortable: true)
        ->column(key: 'jumlah_data', label: 'Jumlah Data', sortable: true)
        ->column(key: 'berkas', label: 'Berkas', sortable: true)
        ->column('actions')
        ->export()
        ->paginate(5);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
