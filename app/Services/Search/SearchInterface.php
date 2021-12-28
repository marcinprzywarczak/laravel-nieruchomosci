<?php

namespace App\Services\Search;

use Illuminate\Database\Eloquent\Collection;

interface SearchInterface
{
    public function search(?string $value, int $limit = 5): Collection;
}