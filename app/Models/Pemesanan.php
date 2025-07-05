<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pemesanan',
        'tanggal_mulai',
        'tanggal_selesai',
        'keperluan',
        'kendaraan_id',
        'driver_id',
        'pemesan_id',
        'lokasi_awal',
        'lokasi_tujuan',
        'status'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function pemesan()
    {
        return $this->belongsTo(User::class, 'pemesan_id');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
