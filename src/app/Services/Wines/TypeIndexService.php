<?php

namespace App\Services\Wines;

use App\Http\Filters\Wine\TypeWineFilter;

use App\Models\Wine;

class TypeIndexService
{
    public function index(array $filters, int $type_id)
    {
        $filter = app()->make(TypeWineFilter::class, ["queryParams" => array_filter($filters)]);
        $wines = Wine::filter($filter)->where("type_id", $type_id)->paginate(14);
        return $wines;
    }
}