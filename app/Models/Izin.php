<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_izin',
        'masa_kerja',
        'biaya',
        'jenis_izin_id',
        'sektor_id',
        'user_id',
    ];

    public function jenis_izin()
    {
        return $this->belongsTo(JenisIzin::class, 'jenis_izin_id');
    }

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
