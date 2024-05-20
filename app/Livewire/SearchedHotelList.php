<?php

namespace App\Livewire;

use Livewire\Component;

class SearchedHotelList extends Component
{
    public $hotels = [];
    public $perPage = 10;
    public $page = 1;
    public $displayMap = true;

    public function loadMore()
    {
        // dd('loadmore is working');
        $this->page++;
    }

    public function toggleMap()
    {
        $this->displayMap = !$this->displayMap;
    }

    public function render()
    {
        $start = ($this->page - 1) * $this->perPage;
        $paginatedHotels = array_slice($this->hotels, $start, $this->perPage);

        return view('livewire.searched-hotel-list')->with('paginatedHotels', $paginatedHotels);
    }
}
