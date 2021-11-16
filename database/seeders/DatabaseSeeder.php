<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\OfferSeeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\Auth\RolesSeeder;
use Database\Seeders\Auth\UsersSeeder;
use Database\Seeders\Offer_statusSeeder;
use Database\Seeders\Property_typeSeeder;
use Database\Seeders\Auth\PermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);

        $this->call(Property_typeSeeder::class);
        $this->call(Offer_statusSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(OfferSeeder::class);
    }
}
