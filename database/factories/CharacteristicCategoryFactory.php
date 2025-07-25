<?php

namespace Database\Factories;

use App\Models\CharacteristicCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacteristicCategory>
 */
class CharacteristicCategoryFactory extends Factory
{
    protected $model = CharacteristicCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
