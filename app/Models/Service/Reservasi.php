<?php

namespace App\Models\Service;

use App\Models\User;
use App\Models\System\Merek;
use App\Models\Service\Mobil;
use App\Models\Service\Kilometer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'user_id',
        'no_handphone',
        'merek_id',
        'mobil_id',
        'kilometer_id',
        'tgl_service',
        'waktu',
    ];

    protected $cast = [
        'tgl_service' => 'date',
        'waktu' => 'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function kilometer()
    {
        return $this->belongsTo(Kilometer::class);
    }

}

