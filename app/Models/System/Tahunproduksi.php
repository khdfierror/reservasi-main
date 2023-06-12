<?php

namespace App\Models\System;

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

}
