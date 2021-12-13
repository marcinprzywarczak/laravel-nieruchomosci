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
        return $user->can('property_types.store') && $user->id === $property_type->created_by
        && $property_type->deleted_at === null;
    }

    public function delete(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by
        && $property_type->deleted_at === null;
    }

    public function restore(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by
        && $property_type->deleted_at !== null;
    }

    public function forceDelete(User $user, PropertyType $property_type)
    {
        return $user->can('property_types.store') && $user->id === $property_type->created_by;
    }
}
