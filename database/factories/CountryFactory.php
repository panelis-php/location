<?php

namespace Panelis\Location\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Panelis\Location\Models\Country;

#[UseModel(Country::class)]
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alpha2' => fake()->regexify('[A-Za-z0-9]{2}'),
            'alpha3' => fake()->countryISOAlpha3,
            'un_code' => fake()->countryCode,
            'name' => fake()->country,
            'is_active' => true,
        ];
    }
}
