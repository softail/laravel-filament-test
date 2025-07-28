<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CharacteristicCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($characteristic) {
            return [
                'id' => $characteristic->id,
                'name' => $characteristic->name,
                'type' => $characteristic->meta_data['type'],
                'description' => $characteristic->meta_data[$characteristic->meta_data['type']],
                'category_id' => $characteristic->characteristicCategory?->id,
                'category_name' => $characteristic->characteristicCategory?->name,
            ];
        })->toArray();
    }
}
