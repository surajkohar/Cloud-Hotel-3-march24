<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hotelRecomendedCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $hotelImage;
    public $hotelName;
    public $cityName;
    public $hotelDesc;
    public $ratingCount;
    public $ratingStatus;
    public $price;
    public $hotelUrl;

    public function __construct($hotelUrl, $hotelName,$cityName, $hotelDesc, $hotelImage, $ratingCount, $ratingStatus,$price)
    {
         $this->hotelUrl = $hotelUrl;
        $this->hotelImage = $hotelImage;
        $this->hotelName = $hotelName;
        $this->cityName= $cityName;
        $this->hotelDesc = $hotelDesc;
        $this->ratingCount = $ratingCount;
        $this->ratingStatus = $ratingStatus;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..common.hotel-recomended-card');
    }
}
