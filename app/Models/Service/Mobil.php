<?php

namespace App\Models\Service;

use App\Models\System\Tahunproduksi;
use App\Models\System\Merek;
use App\Models\System\Brand;
use App\Models\System\Tipe;
use App\Models\System\Warna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';

    protected $fillable = [
        'merek_id',
        'brand_id',
        'tipe_id',
        'tahunproduksi_id',
        'warna_id',
        'no_polisi',
        'no_rangka',
        'expired_stnk'
    ];

    protected $cast = [
        'expired_stnk' => 'date',
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class) ;
    
    }
    
    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function tahunproduksi()
    {
        return $this->belongsTo(Tahunproduksi::class);
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }

}
