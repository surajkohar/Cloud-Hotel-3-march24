<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationFront extends Component
{
    public function render(): View
    {
        return view('components.navigation-front');
    }
}
