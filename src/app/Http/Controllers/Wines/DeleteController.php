<?php

namespace App\Http\Controllers\Wines;

use App\Http\Controllers\Controller;

use App\Models\Wine;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $type, Wine $wine)
    {
        $wine->delete();

        return redirect()->route("wines.index");
    }
}
