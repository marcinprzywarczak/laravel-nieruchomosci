<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PropertyType;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('property_types.index');
    }

    
    public function view(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.index');
    }

    
    public function create(User $user)
    {
        return $user->can('property_types.store');
    }

    
    public function update(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by;
    }

    public function delete(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by;
    }

    public function restore(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by;
    }

    public function forceDelete(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by;
    }
}
