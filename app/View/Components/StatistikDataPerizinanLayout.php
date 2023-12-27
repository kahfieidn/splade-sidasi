<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use ProtoneMedia\Splade\Components\PersistentComponent;

class StatistikDataPerizinanLayout extends PersistentComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.statistik-data-perizinan-layout');
    }
}
