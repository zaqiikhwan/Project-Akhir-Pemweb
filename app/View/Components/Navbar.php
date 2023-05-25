<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    private $links;
    private $active;

    public function __construct()
    {
        $this->links = ["Beranda", "Profil", "Berita"];
        $this->active = "Beranda";
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getActive()
    {
        return $this->active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $logoUrl = asset('images/logo.svg');
        return view('components.navbar', 
            ['links'=>$this->getLinks(), 
            'logoUrl'=>$logoUrl,
            'active'=>$this->getActive()]);
    }
}
