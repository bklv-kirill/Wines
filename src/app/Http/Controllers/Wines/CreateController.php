<?php

namespace App\Http\Controllers\Wines;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Gate;

use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        Gate::authorize("is_admin");

        $types = Type::query()->get();

        return view("wines.create", compact("types"));
    }
}
