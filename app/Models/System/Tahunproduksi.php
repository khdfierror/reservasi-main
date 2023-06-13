<?php

namespace App\Models\System;

use App\Models\Service\Mobil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunproduksi extends Model
{
    use HasFactory;

    protected $table = 'tahunproduksi';

    protected $fillable = [
        'tipe_id',
        'nama'
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
