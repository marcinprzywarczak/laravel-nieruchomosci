<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\Offer_status;
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
        $data_stara = $this->faker->date();
        $data_nowa = date('y-m-d', strtotime($data_stara . '+3 months'));
        return [
            'property_id' => Property::select('id')->orderByRaw("RAND()")->first()->id,
            'offer_status_id' => Offer_status::select('id')->orderByRaw("RAND()")->first()->id,
            'title' => $this->faker->text(100),
            'start_date' => $data_stara,
            'end_date' => $data_nowa,
            'price' => $this->faker->randomFloat(2, 10, 10000000),
            'comment' => $this->faker->optional->text(255)
        ];
    }
}
