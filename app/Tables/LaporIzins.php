<?php

namespace App\Tables;

use App\Models\LaporIzin;
use App\Models\LaporIzinOss;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

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
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('nama_perusahaan', 'LIKE', "%{$value}%");
                });
            });
        });

        $yearFilter = AllowedFilter::callback('year', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereYear('tanggal_izin', $value);
                });
            });
        });

        $monthFilter = AllowedFilter::callback('month', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereMonth('tanggal_izin', $value);
                });
            });
        });


        return QueryBuilder::for(LaporIzin::class)
            ->allowedIncludes('izin')
            ->allowedSorts(['izin.nama_izin', 'id', 'nama_perusahaan', 'alamat_perusahaan', 'tanggal_masuk', 'tanggal_izin', 'nomor_izin', 'izin.jenis_izin.id', 'izin.sektor.nama_sektor'])
            ->allowedFilters(['izin.jenis_izin.id', 'izin.nama_izin', 'izin.sektor.nama_sektor', $globalSearch, $yearFilter, $monthFilter])
            ->where('user_id', Auth::user()->id);
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
            ->column(key: 'id', label: '#ID', sortable: true)
            ->column(key: 'nama_perusahaan', label: 'Nama Perusahaan/Perorangan', sortable: false)
            ->column(key: 'alamat_perusahaan', label: 'Alamat Perusahaan', sortable: false)
            ->column(key: 'tanggal_masuk', label: 'Tanggal Masuk', sortable: true)
            ->column(key: 'tanggal_izin', label: 'Tanggal Izin', sortable: true)
            ->column(key: 'nomor_izin', label: 'Nomor Izin', sortable: true)
            ->column(key: 'izin.nama_izin', label: 'Nama Izin', sortable: false)
            ->column(key: 'izin.jenis_izin.nama_izin', label: 'Jenis Izin', sortable: false)
            ->column(key: 'izin.sektor.nama_sektor', label: 'Sektor', sortable: false)
            ->selectFilter(
                key: 'izin.jenis_izin.id',
                label: 'Jenis Izin',
                options: [
                    '1' => 'Perizinan',
                    '2' => 'Non Perizinan',
                ],
            )
            ->selectFilter(
                key: 'izin.sektor.nama_sektor',
                label: 'Sektor',
                options: [
                    'Sektor Penanaman Modal' => 'Sektor Penanaman Modal',
                    'Sektor Lingkungan Hidup dan Kehutanan' => 'Sektor Lingkungan Hidup dan Kehutanan',
                    'Sektor Kesehatan' => 'Sektor Kesehatan',
                    'Sektor Perhubungan' => 'Sektor Perhubungan',
                    'Sektor Ketenagakerjaan' => 'Sektor Ketenagakerjaan',
                    'Sektor Kelautan dan Perikanan' => 'Sektor Kelautan dan Perikanan',
                    'Sektor Energi dan Sumber Daya Mineral' => 'Sektor Energi dan Sumber Daya Mineral',
                    'Sektor Perindustrian' => 'Sektor Perindustrian',
                    'Sektor Pariwisata' => 'Sektor Pariwisata',
                    'Sektor Komunikasi dan Informatika' => 'Sektor Komunikasi dan Informatika',
                    'Sektor Pertanian' => 'Sektor Pertanian',
                    'Sektor Pendidikan, Kebudayaan, Riset, dan Teknologi' => 'Sektor Pendidikan, Kebudayaan, Riset, dan Teknologi',
                    'Sektor Sosial' => 'Sektor Sosial',
                    'Sektor Koperasi dan Usaha Kecil dan Menengah' => 'Sektor Koperasi dan Usaha Kecil dan Menengah',
                    'Sektor Kesatuan Bangsa dan Politik' => 'Sektor Kesatuan Bangsa dan Politik',
                    'Sektor Pekerjaan Umum dan Perumahan Rakyat' => 'Sektor Pekerjaan Umum dan Perumahan Rakyat',
                    'Sektor Badan Pengawas Obat dan Makanan' => 'Sektor Badan Pengawas Obat dan Makanan',
                    'Sektor Perdagangan' => 'Sektor Perdagangan',
                    'Sektor Agraria dan Tata Ruang Badan Pertanahan Nasional' => 'Sektor Agraria dan Tata Ruang Badan Pertanahan Nasional',
                ],
            )
            ->selectFilter(key: 'year', options: ['2024' => '2024', '2023' => '2023', '2022' => '2022', '2021' => '2021'], label: 'Tahun Izin', noFilterOptionLabel: '-')
            ->selectFilter(key: 'month', options: ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'], label: 'Bulan Izin', noFilterOptionLabel: '-')
            ->bulkAction(
                label: 'Hapus Data',
                each: fn (LaporIzin $lapor_izin) => $lapor_izin->delete(),
                confirm: 'Apakah kamu yakin ingin menghapus data berikut yang di seleksi?',
                confirmButton: 'Ya, Hapus!',
                cancelButton: 'Tidak, Jangan!',
                after: fn () => Toast::info('Data Berhasil di Hapus!')->rightBottom()->autoDismiss(2)
            )->export()
            ->paginate(10);

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
