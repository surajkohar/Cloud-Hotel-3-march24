<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hotelCardHeading extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $address;

    public function __construct($title, $address)
    {
        $this->title = $title;
        $this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.hotel-card-heading');
    }
}
