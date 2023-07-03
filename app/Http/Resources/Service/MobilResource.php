<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MobilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'merek_id' => $this->merek_id,
            'brand_id' => $this->brand_id,
            'tipe_id' => $this->tipe_id,
            'tahunproduksi_id' => $this->tahunproduksi_id,
            'warna_id' => $this->warna_id,
            'no_polisi' => $this->no_polisi,
            'no_rangka' => $this->no_rangka,
            'expired_stnk' => $this->expired_stnk,
         ];
    }
}
