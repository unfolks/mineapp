<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Bbm extends Model
{
    use HasFactory;

    protected $fillable = ['kendaraan_id', 'tanggal', 'jumlah_liter', 'biaya', 'km_terakhir'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
