<?php

namespace App\Imports;

use Exception;
use Carbon\Carbon;
use App\Models\Izin;
use App\Models\LaporIzin;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class LaporIzinsImport implements ToCollection, WithHeadingRow, SkipsEmptyRows, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable;
    protected $rules = [];
    protected $customMessages = [];

    public function collection(Collection $rows)
    {


        foreach ($rows as $key => $row) {
            $izin = Izin::where('nama_izin', $row['jenis_izin'])->where('user_id', Auth::id())->pluck('id')->first();
            $tanggalMasuk = is_numeric($row['tanggal_masuk']) ? Date::excelToDateTimeObject($row['tanggal_masuk']) : null;
            $tanggalIzin = is_numeric($row['tanggal_izin']) ? Date::excelToDateTimeObject($row['tanggal_izin']) : null;

            if ($izin === null) {
                $rules['izin'] = 'required';
                $customMessages['izin.required'] = 'Perhatikan "' . $row['jenis_izin'] . '" Pada baris ' . ($key + 2) . ' tidak terdaftar';
            }
            if ($tanggalMasuk === null) {
                $rules['tanggalMasuk'] = 'required';
                $customMessages['tanggalMasuk.required'] = 'Perhatikan "' . $row['tanggal_masuk'] . '" Pada baris ' . ($key + 2) . ' tidak sesuai dengan format tanggal!';
            }
            if ($tanggalIzin === null) {
                $rules['tanggalIzin'] = 'required';
                $customMessages['tanggalIzin.required'] = 'Perhatikan "' . $row['tanggal_izin'] . '" Pada baris ' . ($key + 2) . ' tidak sesuai dengan format tanggal!';
            }



            if (!empty($rules)) {
                $validator = Validator::make($rows->toArray(), $rules, $customMessages);
                if ($validator->fails()) {
                    throw new Exception($validator->errors()->first());
                }
            } else {
                LaporIzin::create([
                    'nama_perusahaan' => $row['nama_perusahaan_or_perorangan'],
                    'alamat_perusahaan' => $row['alamat_perusahaan_or_perorangan'],
                    'tanggal_masuk' => $tanggalMasuk,
                    'tanggal_izin' => $tanggalIzin,
                    'nomor_izin' => $row['nomor_izin'],
                    'izin_id' => $izin,
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }


    public function rules(): array
    {
        return [
            'nama_perusahaan_or_perorangan' => 'required',
            'nomor_izin' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [];
    }
}
