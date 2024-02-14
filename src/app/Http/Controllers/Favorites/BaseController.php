<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;

use App\Services\Favorites\IndexService;

class BaseController extends Controller
{
    public $indexService;
    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }
}