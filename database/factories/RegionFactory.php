<?php

namespace Panelis\Location\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Panelis\Location\Models\Country;
use Panelis\Location\Models\Region;

#[UseModel(Region::class)]
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::factory(),
            'name' => fake()->word,
            'is_active' => true,
        ];
    }
}
