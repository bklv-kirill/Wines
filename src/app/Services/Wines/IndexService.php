<?php

namespace App\Services\Wines;

use App\Http\Filters\Wine\WineFilter;

use App\Models\Wine;

class IndexService
{
    public function index(array $filters)
    {
        $filter = app()->make(WineFilter::class, ["queryParams" => array_filter($filters)]);
        $wines = Wine::filter($filter)->paginate(14);

        return $wines;
    }
}