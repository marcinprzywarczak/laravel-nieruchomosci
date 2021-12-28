<?php 

namespace App\Services\OfferStatuses;

use App\Models\OfferStatus;
use App\Services\Search\SearchInterface;
use Illuminate\Database\Eloquent\Collection;

class OfferStatusSearchService implements SearchInterface
{
    public function search(?string $value, int $limit = 5): Collection
    {
        if(strlen($value) !== 0 && $value !== null)
        {
            return OfferStatus::where('name', 'like', '%' . $value . '%')
                ->get(['id', 'name']);
        }
            return OfferStatus::limit($limit)
                ->get(['id', 'name']);
    }
    
}