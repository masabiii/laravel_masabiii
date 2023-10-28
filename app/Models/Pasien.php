<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_pasien',
        'alamat',
        'no_telepon',
        'id_rumahSakit'
    ];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumahSakit');
    }
}
