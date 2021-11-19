<?php

namespace Database\Seeders;

use App\Models\OfferStatus;
use Illuminate\Database\Seeder;

class OfferStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfferStatus::factory()->count(50)->create();
    }
}
