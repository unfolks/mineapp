<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'kantor_id'];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function riwayatPemakaians()
    {
        return $this->hasMany(RiwayatPemakaian::class);
    }
}
