<?php

namespace Database\Seeders;

use App\Models\Property_type;
use Illuminate\Database\Seeder;

class Property_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property_type::factory()->count(50)->create();
    }
}
