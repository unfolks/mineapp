<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerusahaanSewa extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_info'];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
