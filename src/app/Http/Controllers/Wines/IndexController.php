<?php

namespace App\Http\Controllers\Wines;

use App\Http\Requests\Wines\IndexRequest;

use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filters = $indexRequest->validated();
        if (!isset($filters["type"])) $filters["type"] = 0;
        if (!isset($filters["order"])) $filters["order"] = "new";

        $wines = $this->indexService->index($filters);

        return view("wines.index", compact(["wines", "filters"]));
    }
}
