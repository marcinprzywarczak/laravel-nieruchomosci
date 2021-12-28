<?php 

namespace App\Services\PropertyTypes;

use App\Models\PropertyType;
use App\Services\Search\SearchInterface;
use Illuminate\Database\Eloquent\Collection;

class PropertyTypeSearchService implements SearchInterface
{
    public function search(?string $value, int $limit = 5): Collection
    {
        if(strlen($value) !== 0 && $value !== null)
        {
            return PropertyType::where('name', 'like', '%' . $value . '%')
                ->get(['id', 'name']);
        }
            return PropertyType::limit($limit)
                ->get(['id', 'name']);
    }
    
}