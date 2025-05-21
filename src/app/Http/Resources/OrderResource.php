<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'orderTypeId' => $this->type_id,
            'partnershipId' => $this->partnership_id,
            'userId' => $this->user_id,
            'description' => $this->description,
            'date' => $this->date,
            'address' => $this->address,
            'amount' => $this->amount,
            'status' => $this->status
        ];
    }
}
