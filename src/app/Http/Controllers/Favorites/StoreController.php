<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

use App\Models\Favorite;
use App\Models\Wine;


class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Wine $wine): RedirectResponse
    {
        Favorite::query()->create(["user_id" => Auth::id(), "wine_id" => $wine->id]);

        return redirect($request->header("referer"));
    }
}
