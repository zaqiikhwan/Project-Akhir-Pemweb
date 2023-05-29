<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Sidenav extends Component
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
        $routeName = Route::currentRouteName();
        if (Str::contains($routeName, "agenda")) {
            $routeName = "agenda";
        } 
        return view('components.sidenav',["route"=>$routeName]);
    }
}
