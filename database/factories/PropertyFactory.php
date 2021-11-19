<?php

namespace Database\Factories;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_type_id' => PropertyType::select('id')->orderByRaw("RAND()")->first()->id,
            'address' => $this->faker->address,
            'area_square_meters' => $this->faker->numberBetween(1,1000),
            'rooms' => $this->faker->optional->numberBetween(1,100),
            'floor' => $this->faker->optional->numberBetween(1,50),
            'number_of_floor' => $this->faker->optional->numberBetween(1,100),
            'description' => $this->faker->optional->text(150)
        ];
    }
}
