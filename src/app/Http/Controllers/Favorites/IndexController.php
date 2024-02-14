<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Requests\Favorites\IndexRequest;

use Illuminate\Support\Facades\Gate;

use Illuminate\View\View;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $indexRequest): View
    {
        $user = Auth::user();

        $filters = $indexRequest->validated();
        if (!isset($filters["type"])) $filters["type"] = 0;
        if (!isset($filters["order"])) $filters["order"] = "new";

        $favorites = $this->indexService->index($filters, $user);

        return view("favorites.index", compact(["favorites", "filters"]));
    }
}
