<?php

namespace App\Models;

use Carbon\Carbon;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporIzin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'tanggal_masuk',
        'tanggal_izin',
        'nomor_izin',
        'izin_id',
        'user_id',
    ];

    public function izin(): BelongsTo
    {
        return $this->belongsTo(Izin::class, 'izin_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTanggalMasukAttribute(){
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_masuk'])->format('d-m-Y');
    }
    public function setTanggalMasukAttribute($value)
    {
        $this->attributes['tanggal_masuk'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTanggalIzinAttribute(){
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_izin'])->format('d-m-Y');
    }
    public function setTanggalIzinAttribute($value)
    {
        $this->attributes['tanggal_izin'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }


}
