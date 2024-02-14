<?php

namespace App\Http\Controllers\Wines;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Wine;

use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $type, Wine $wine): View
    {
        if (!Type::query()->where("name", $type)->exists() || $wine->type->name !== $type) abort(404);

        return view("wines.show", compact(["wine"]));
    }
}
