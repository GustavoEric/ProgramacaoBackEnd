<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'cep' => $this->cep,
            'address' => $this->address,
            'number' =>$this->number,
            'address_complement' =>$this->address_complement,
            'city' =>$this->city,
            'state' =>$this->state
        ];
    }
}
