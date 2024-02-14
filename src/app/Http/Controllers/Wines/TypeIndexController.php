<?php

namespace App\Http\Controllers\Wines;

use App\Http\Requests\Wines\TypeIndexRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Route;

class TypeIndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($type, TypeIndexRequest $typeIndexRequest)
    {
        if (!Type::query()->where("name", $type)->exists()) abort(404);

        $filters = $typeIndexRequest->validated();
        if (!isset($filters["order"])) $filters["order"] = "new";

        $wines = $this->typeIndexService->index($filters, Type::query()->where("name", $type)->first()->id);

        return view("wines.typeIndex", compact(["wines", "filters", "type"]));
    }
}
