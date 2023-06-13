<?php

namespace App\Models\System;

use App\Models\Service\Mobil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $table = 'merek';

    protected $fillable = [
        'nama'
    ];


    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

}
