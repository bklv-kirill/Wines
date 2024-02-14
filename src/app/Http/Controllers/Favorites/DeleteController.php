<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Favorite;
use App\Models\Wine;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Wine $wine): RedirectResponse
    {
        Favorite::query()->where("user_id", Auth::id())->where("wine_id", $wine->id)->delete();

        return redirect($request->header("referer"));
    }
}
