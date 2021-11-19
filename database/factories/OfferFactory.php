<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\OfferStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $data_poczatkowa = $this->faker->date();
        $data_koncowa = date('y-m-d', strtotime($data_poczatkowa . '+3 months'));
        return [
            'property_id' => Property::select('id')->orderByRaw("RAND()")->first()->id,
            'offer_status_id' => OfferStatus::select('id')->orderByRaw("RAND()")->first()->id,
            'title' => $this->faker->text(100),
            'start_date' => $data_poczatkowa,
            'end_date' => $data_koncowa,
            'price' => $this->faker->randomFloat(2, 10, 10000000),
            'comment' => $this->faker->optional->text(255)
        ];
    }
}
