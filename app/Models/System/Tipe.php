<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $table = 'tipe';

    protected $fillable = [
        'brand_id',
        'nama'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tahunproduksi()
    {
        return $this->hasMany(Tahunproduksi::class);
    }

    public function warna()
    {
        return $this->hasMany(Warna::class);
    }
}
