<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $fillable = [
        'merek_id',
        'nama',
    ];


    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function tipe()
    {
        return $this->hasMany(Tipe::class);
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
