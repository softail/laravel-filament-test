<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacteristicResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->meta_data['type'],
            'description' => $this->meta_data[$this->meta_data['type']],
            'category_name' => $this->characteristicCategory?->name,
            'created_at' => Carbon::make($this->created_at)->format('Y/m/d - H:i:s'),
        ];
    }
}
