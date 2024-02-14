<?php

namespace App\Http\Controllers\Wines;

use App\Http\Controllers\Controller;

use App\Http\Requests\Wines\StoreRequest;

use Illuminate\Http\RedirectResponse;

use App\Models\Wine;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $validated = $storeRequest->validated();

        Wine::query()->create($validated);

        return redirect()->route("wines.index");
    }
}
