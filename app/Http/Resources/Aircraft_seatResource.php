<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Aircraft_seatResource extends JsonResource
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
            'seat_code' => $this->seat_code,
            'aircraft' => new AircraftResource($this->whenLoaded('aircraft')),
            'rate' => new RateResource($this->whenLoaded('rate'))
        ];
    }
}
