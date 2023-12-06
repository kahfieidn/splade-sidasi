<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSektorOss extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_sektor_oss_id',
        'data_sektor_oss_type',
        'jumlah_data_sektor',
        'sektor_id',
        'user_id',
    ];

    public function data_sektor_ossable()
    {
        return $this->morphTo();
    }

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }
    
}
