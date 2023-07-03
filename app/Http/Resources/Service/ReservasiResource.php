<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservasiResource extends JsonResource
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
            'no_handphone' => $this->no_handphone,
            'merek_id' => $this->merek_id,
            'mobil_id' => $this->mobil_id,
            'kilometer_id' => $this->kilometer_id,
            'tgl_service' => $this->tgl_service,
            'waktu' => $this->waktu,
        ];
    }
}
