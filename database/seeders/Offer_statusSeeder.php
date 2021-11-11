<?php

namespace Database\Seeders;

use App\Models\Offer_status;
use Illuminate\Database\Seeder;

class Offer_statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer_status::factory()->count(50)->create();
    }
}
