<?php

namespace App\Tables\Admin;

use App\Models\User;
use App\Models\LaporIzin;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class LaporIzins extends AbstractTable
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
        return LaporIzin::query();
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
            ->withGlobalSearch(columns: ['id', 'nama_perusahaan', 'alamat_perusahaan', 'tanggal_masuk', 'tanggal_izin', 'nomor_izin', 'izin.nama_izin', 'izin.sektor.nama_sektor'])
            ->searchInput(
                key: 'tanggal_masuk',
                label: 'Cari Tanggal Masuk (Y-m-d : 2023-04-28)',
                
            )        
            ->searchInput(
                key: 'tanggal_izin',
                label: 'Cari Tanggal Izin (Y-m-d : 2023-04-28)',
            )        
            ->defaultSortDesc('id')
            ->column(key: 'id', label: '#ID', sortable: true)
            ->column(key: 'nama_perusahaan', label: 'Nama Perusahaan/Perorangan', sortable: true)
            ->column(key: 'alamat_perusahaan', label: 'Alamat Perusahaan', sortable: true)
            ->column(key: 'tanggal_masuk', label: 'Tanggal Masuk', sortable: true)
            ->column(key: 'tanggal_izin', label: 'Tanggal Izin', sortable: true)
            ->column(key: 'nomor_izin', label: 'Nomor Izin', sortable: true)
            ->column(key: 'izin.nama_izin', label: 'Jenis Izin', sortable: true)
            ->column(key: 'izin.sektor.nama_sektor', label: 'Sektor', sortable: true)
            ->column(key: 'user.name', label: 'Operator', sortable: true)
            ->selectFilter(
                key: 'user.id',
                options: User::all()->pluck('name', 'id')->toArray(),
                label: 'Pengguna',
                noFilterOption: true,
                noFilterOptionLabel: 'Seluruh Kabupaten/Kota'
            )
            ->selectFilter(key: 'izin.jenis_izin_id', label: 'Jenis Izin', options: [
                '1' => 'Perizinan',
                '2' => 'Non Perizinan',
            ])
            ->selectFilter(key: 'izin.sektor_id', label: 'Sektor', options: [
                '1' => 'Sektor Penanaman Modal',
                '2' => 'Sektor Lingkungan Hidup',
                '3' => 'Sektor Kesehatan',
                '4' => 'Sektor Perhubungan',
                '5' => 'Sektor Tenaga Kerja',
                '6' => 'Sektor Kelautan dan Perikanan',
                '7' => 'Sektor ESDM',
                '8' => 'Sektor Perindustrian dan Perdagangan',
                '9' => 'Sektor Pariwisata',
                '10' => 'Sektor Kebudayaan',
                '11' => 'Sektor Pertanian, Pangan dan Hewan',
                '12' => 'Sektor Pendidikan',
                '13' => 'Sektor Sosial',
                '14' => 'Sektor UKM',
                '15' => 'Sektor Kesatuan Bangsa dan Politik',
                '16' => 'Sektor Pekerjaan Umum, Penataan Ruang dan Pertanahan',
            ])->export()
            ->paginate(10);


        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
