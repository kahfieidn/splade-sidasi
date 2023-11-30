<?php

namespace App\Tables;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Izins extends AbstractTable
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
        return Izin::query()->where('user_id', Auth::id());
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
            ->withGlobalSearch(columns: ['id', 'nama_izin', 'masa_kerja', 'biaya', 'jenis_izin.nama_izin', 'sektor.nama_sektor'])
            ->column(key: 'id', label: 'ID', sortable: true)
            ->column(key: 'nama_izin', label: 'Nama Izin', sortable: true)
            ->column(key: 'masa_kerja', label: 'Masa Kerja (Hari)', sortable: true)
            ->column(key: 'biaya', label: 'Biaya (Rp.)', sortable: true)
            ->column(key: 'jenis_izin.nama_izin', label: 'Jenis Izin', sortable: true)
            ->column(key: 'sektor.nama_sektor', label: 'Sektor', sortable: true)
            ->column('actions')
            ->paginate(5);
        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
