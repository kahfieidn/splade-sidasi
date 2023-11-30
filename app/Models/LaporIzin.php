<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function izin()
    {
        return $this->belongsTo(Izin::class, 'izin_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
