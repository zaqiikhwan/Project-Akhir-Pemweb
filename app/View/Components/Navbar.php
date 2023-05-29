<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    private $links;

    public function __construct()
    {
        $this->links = [
            ["display"=>"Beranda","link"=>""], 
            ["display"=>"Profil","link"=>"profile/pemerintah"],
            ["display"=>"Berita","link"=>"news"],
        ];
    }

    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $logoUrl = asset('images/logo.svg');
        $active = Route::currentRouteName();

        return view('components.navbar', 
            ['links'=>$this->getLinks(), 
            'logoUrl'=>$logoUrl,
            'active'=>$active]);
    }
}
