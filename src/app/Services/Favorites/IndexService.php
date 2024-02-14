<?php

namespace App\Services\Favorites;

use App\Http\Filters\Wine\WineFilter;
use App\Models\User;

class IndexService
{
    public function index(array $filters, User $user)
    {
        $filter = app()->make(WineFilter::class, ["queryParams" => array_filter($filters)]);
        $favorites = $user->favorites()->filter($filter)->paginate(14);

        return $favorites;
    }
}