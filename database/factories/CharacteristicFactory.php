<?php

namespace Database\Factories;

use App\Models\Characteristic;
use App\Models\CharacteristicCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Characteristic>
 */
class CharacteristicFactory extends Factory
{
    protected $model = Characteristic::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['boolean', 'integer', 'string']);

        return [
            'name' => $this->faker->name(),
            'meta_data' => [
                'type' => $type,
                $type => match ($type) {
                    'boolean' => $this->faker->boolean(),
                    'integer' => $this->faker->randomDigit(),
                    'string' => $this->faker->word(),
                },
            ],
            'characteristic_category_id' => CharacteristicCategory::factory(),
        ];
    }
}
