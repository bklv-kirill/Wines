<?php

namespace App\View\Components\Wines;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Wine;

class WineCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $wine;
    public function __construct(Wine $wine)
    {
        $this->wine = $wine;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wines.wine-card');
    }
}
