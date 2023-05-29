<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Paginate extends Component
{
    /**
     * Create a new component instance.
     */
    public $cur;
    public $max;

    public function __construct($cur, $max)
    {
        $this->cur = $cur;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paginate',
            ['cur'=>$this->cur, 
            'max'=>$this->max]);
    }
}
