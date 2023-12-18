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
            ->defaultSort('tanggal_izin')
            ->allowedSorts(['id','nama_perusahaan', 'alamat_perusahaan', 'tanggal_masuk','tanggal_izin', 'nomor_izin','izin.nama_izin','izin.jenis_izin.id', 'izin.sektor.nama_sektor'])
            ->allowedFilters(['izin.jenis_izin.id', 'izin.sektor.nama_sektor', $yearFilter, $monthFilter])
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
            ->column(key: 'nama_perusahaan', label: 'Nama Perusahaan/Perorangan', sortable: true)
            ->column(key: 'alamat_perusahaan', label: 'Alamat Perusahaan', sortable: true)
            ->column(key: 'tanggal_masuk', label: 'Tanggal Masuk', sortable: true)
            ->column(key: 'tanggal_izin', label: 'Tanggal Izin', sortable: true)
            ->column(key: 'nomor_izin', label: 'Nomor Izin', sortable: true)
            ->column(key: 'izin.nama_izin', label: 'Nama Izin', sortable: true)
            ->column(key: 'izin.jenis_izin.nama_izin', label: 'Jenis Izin', sortable: true)
            ->column(key: 'izin.sektor.nama_sektor', label: 'Sektor', sortable: true)
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
                    'Sektor Lingkungan Hidup' => 'Sektor Lingkungan Hidup',
                    'Sektor Kesehatan' => 'Sektor Kesehatan',
                    'Sektor Perhubungan' => 'Sektor Perhubungan',
                    'Sektor Tenaga Kerja' => 'Sektor Tenaga Kerja',
                    'Sektor Kelautan dan Perikanan' => 'Sektor Kelautan dan Perikanan',
                    'Sektor ESDM' => 'Sektor ESDM',
                    'Sektor Perindustrian dan Perdagangan' => 'Sektor Perindustrian dan Perdagangan',
                    'Sektor Pariwisata' => 'Sektor Pariwisata',
                    'Sektor Kebudayaan' => 'Sektor Kebudayaan',
                    'Sektor Pertanian, Pangan dan Hewan' => 'Sektor Pertanian, Pangan dan Hewan',
                    'Sektor Pendidikan' => 'Sektor Pendidikan',
                    'Sektor Sosial' => 'Sektor Sosial',
                    'Sektor UKM' => 'Sektor UKM',
                    'Sektor Kesatuan Bangsa dan Politik' => 'Sektor Kesatuan Bangsa dan Politik',
                    'Sektor Pekerjaan Umum, Penataan Ruang dan Pertanahan' => 'Sektor Pekerjaan Umum, Penataan Ruang dan Pertanahan',
                    'Sektor Pengawasan Obat dan Makanan' => 'Sektor Pengawasan Obat dan Makanan',
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
