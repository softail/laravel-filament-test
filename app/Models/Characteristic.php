<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Characteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_data',
        'characteristic_category_id',
    ];

    public function characteristicCategory(): BelongsTo
    {
        return $this->belongsTo(CharacteristicCategory::class);
    }

    protected function metaData(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->handleGet($value),
            set: fn ($value) => $this->handleSet($value),
        );
    }

    private function handleGet($value): array
    {
        $value = json_decode($value, true);
        $value[$value['type']] = $value['description'];
        unset($value['description']);

        return $value;
    }

    private function handleSet($value): string
    {
        $value['description'] = $value[$value['type']];
        unset($value[$value['type']]);

        return json_encode($value);
    }
}
