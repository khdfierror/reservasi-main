<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kilometer extends Model
{
    use HasFactory;

    protected $table = 'kilometer';

    protected $fillable = [
        'nama'
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
    
}
