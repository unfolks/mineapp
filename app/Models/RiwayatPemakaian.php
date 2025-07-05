<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class RiwayatPemakaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'pemesan_id',
        'driver_id',
        'tanggal',
        'lokasi_awal',
        'lokasi_tujuan',
        'km_awal',
        'km_akhir'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function pemesan()
    {
        return $this->belongsTo(User::class, 'pemesan_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
