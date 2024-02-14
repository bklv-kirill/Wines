<?php

namespace App\Http\Controllers\Wines;

use App\Http\Controllers\Controller;
use App\Services\Wines\IndexService;
use App\Services\Wines\TypeIndexService;

class BaseController extends Controller
{
    public $indexService;
    public $typeIndexService;

    public function __construct(IndexService $indexService, TypeIndexService $typeIndexService)
    {
        $this->indexService = $indexService;
        $this->typeIndexService = $typeIndexService;
    }
}