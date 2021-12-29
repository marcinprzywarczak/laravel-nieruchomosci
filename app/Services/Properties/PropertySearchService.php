<?php 

namespace App\Services\Properties;

use App\Models\Property;
use App\Services\Search\SearchInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PropertySearchService implements SearchInterface
{
    public function search(?string $value, int $limit = 5): Collection
    {
        if(strlen($value) !== 0 && $value !== null)
        {
            return Property::with('property_type')->whereHas('property_type', function(Builder $query) use($value)
            {
                $query->where('name', 'like', '%' . $value . '%' )
                ->orWhere('address', 'like', '%' . $value . '%')
                ->orWhere('properties.id', 'like', '%' . $value . '%');
            })->get();

            // return Property::with('property_type')
            //     ->where('address', 'like', '%' . $value . '%')
            //     ->orWhere('id', 'like', '%' . $value . '%')
            //     ->orWhere('property_type.name', 'like', '%' . $value . '%')
                // ->get();
        }
            return Property::with('property_type')
                ->limit($limit)
                ->get();
    }
    
}