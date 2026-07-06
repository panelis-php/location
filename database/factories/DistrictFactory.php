<?php

namespace Panelis\Location\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Panelis\Location\Models\District;
use Panelis\Location\Models\Region;

#[UseModel(District::class)]
class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'region_id' => Region::factory(),
            'name' => fake()->word,
            'is_active' => true,
        ];
    }
}
