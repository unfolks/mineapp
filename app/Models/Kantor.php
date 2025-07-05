<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kantor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}
