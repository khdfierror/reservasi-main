<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;

    protected $table = 'warna';

    protected $fillable = [
        'tipe_id',
        'nama',
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
