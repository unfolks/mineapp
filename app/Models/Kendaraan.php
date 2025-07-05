<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_polisi',
        'jenis',
        'status_kepemilikan',
        'perusahaan_sewa_id',
        'kantor_id',
        'merk',
        'tipe',
        'tahun'
    ];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }

    public function perusahaanSewa()
    {
        return $this->belongsTo(PerusahaanSewa::class);
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function bbms()
    {
        return $this->hasMany(Bbm::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function riwayatPemakaians()
    {
        return $this->hasMany(RiwayatPemakaian::class);
    }
}
