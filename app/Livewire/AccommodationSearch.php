<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class AccommodationSearch extends Component
{
    public $checkInDate = '';
    public $checkOutDate = '';
    public $location = '';
    public $country = '';
    public $rooms = 1;
    public $adults = 1;
    public $children = 0;
    public $maxChildAge;
    public $childrenAges = [];
    public $countries;
    public $cities;
    public $city = '';
    public $checkDateExceeds = false;
    public $checkDateMinError = false;
    public $term = '';
    public $highlightIndex = 0;

    public function mount()
    {
        $this->countries = Country::data();
        $this->cities = [];
    }

    protected $rules = [
        'checkInDate' => 'required|date|after_or_equal:today',
        'checkOutDate' => 'required|date|after_or_equal:checkInDate',
        'location' => 'required',
        'country' => 'required',
        'city' => 'required',
        'rooms' => 'required|numeric|min:1',
        'adults' => 'required|numeric|min:1',
        'children' => 'required|numeric|min:0',
        'childrenAges' => 'required|array',
    ];

    public function resetlist()
    {
        $this->term  =   '';
        $this->cities        =   [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->cities) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->cities) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $user = $this->cities[$this->highlightIndex] ?? null;
        // if ($user) {
        //     $this->redirect(route('show-contact', $user['id']));
        // }
    }

    public function updatedTerm(){
        $this->cities = City::where('CityName', 'like', '%' . $this->term . '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('livewire.hotel-search');
    }

    public function incrementCounter($field)
    {
        // Your existing logic for incrementing counters
    }

    public function decrementCounter($field)
    {
        // Your existing logic for decrementing counters
    }

    public function search()
    {
        // Your existing search logic
    }

    public function initializeChildrenAges()
    {
        $this->childrenAges = array_fill(0, $this->children, '');
    }

    public function fetchCountries()
    {
        // Your existing logic for fetching countries
    }

    public function fetchCities()
    {
        $this->cities = Country::where('countryCode',$this->country)->first()->cities()->select('CityId','CityName')->get();
    }
}
