<?php
namespace Database\Seeders\Auth;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'log-viewer']);
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.change_role']);
        Permission::create(['name' => 'property_types.index']);
        Permission::create(['name' => 'property_types.store']);
        Permission::create(['name' => 'offer_statuses.index']);
        Permission::create(['name' => 'offer_statuses.store']);
        Permission::create(['name' => 'properties.index']);
        Permission::create(['name' => 'properties.store']);
        Permission::create(['name' => 'offers.index']);
        Permission::create(['name' => 'offers.store']);

        $userRole = Role::findByName(config('app.admin_role'));
        $userRole->givePermissionTo('log-viewer');
        $userRole->givePermissionTo('users.index');
        $userRole->givePermissionTo('users.store');
        $userRole->givePermissionTo('users.destroy');
        $userRole->givePermissionTo('users.change_role');
        $userRole->givePermissionTo('property_types.index');
        $userRole->givePermissionTo('property_types.store');
        $userRole->givePermissionTo('offer_statuses.index');
        $userRole->givePermissionTo('offer_statuses.store');
        $userRole->givePermissionTo('properties.index');
        $userRole->givePermissionTo('properties.store');
        $userRole->givePermissionTo('offers.index');
        $userRole->givePermissionTo('offers.store');

        $userRole = Role::findByName(config('app.user_role'));
        $userRole->givePermissionTo('property_types.index');
        $userRole->givePermissionTo('offer_statuses.index');
        $userRole->givePermissionTo('properties.index');
        $userRole->givePermissionTo('offers.index');
    }
}