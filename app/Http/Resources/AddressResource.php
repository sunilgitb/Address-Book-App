<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
            'id'            => $this->id,
            'title'         => $this->title,
            'contact_name' => $this->contact_name,
            'contact_number' => $this->contact_number,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'address_line_3' => $this->address_line_3,
            'pincode' => $this->pincode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'is_default_from' => $this->is_default_from,
            'is_default_to' => $this->is_default_to,
            'created_by'    => $this->created_by,
            'created_at'    => Carbon::parse($this->created_at)->toDayDateTimeString(),
            'updated_at'    => Carbon::parse($this->updated_at)->toDayDateTimeString(),
        ];
    }
}
