<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacteristicCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function characteristics(): HasMany
    {
        return $this->hasMany(Characteristic::class);
    }
}
