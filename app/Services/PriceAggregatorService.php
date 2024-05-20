<?php
// app/Services/PriceAggregatorService.php

namespace App\Services;

use App\Services\TransformationService;
use App\Providers\StubaProvider;
use App\Providers\TravellandaProvider;
use App\Providers\RatehawkProvider;
use http\Env\Response;

class PriceAggregatorService
{
    protected $stubaProvider;
    protected $travellandaProvider;
    protected $ratehawkProvider;
    protected $transformationService;

    public function __construct(
        StubaProvider         $stubaProvider,
        TravellandaProvider   $travellandaProvider,
        RatehawkProvider      $ratehawkProvider,
        TransformationService $transformationService

    )
    {
        $this->stubaProvider = $stubaProvider;
        $this->travellandaProvider = $travellandaProvider;
        $this->ratehawkProvider = $ratehawkProvider;
        $this->transformationService = $transformationService;
    }

    public function fetchHotels($searchParams)
    {
        $rateHawkHotels = $this->ratehawkProvider->availableHotels($searchParams);
        $travellandaHotels = $this->travellandaProvider->fetchPrices($searchParams);
//        dd($travellandaHotels);
        $stubaHotels = $this->stubaProvider->availableHotels($searchParams);
        $stubaHotels['Response']['Body']['Hotels']['Hotel'] = $this->transformationService->transformHotels($stubaHotels['AvailabilitySearchResult']['HotelAvailability']);

        unset( $stubaHotels['AvailabilitySearchResult']);

        session()->put('stubaHotels',$stubaHotels);
        $rateHawkHotels['Response']['Body']['Hotels']['Hotel'] = $rateHawkHotels['Hotel'];
//        unset($rateHawkHotels['Hotel']);
        session()->put('rateHawkHotels',$rateHawkHotels);
        $stubaHotels['Response']['Body']["HotelsReturned"] = count($stubaHotels['Response']['Body']['Hotels']['Hotel']);

        $outtedTravellanda = $travellandaHotels['Response']['Body']['Hotels']['Hotel'];
        $outtedStuba = $stubaHotels['Response']['Body']['Hotels']['Hotel'];
        $outtedRateHawk = $rateHawkHotels['Hotel'];
//        dd($outtedRateHawk);
//        $matchedHotels = $outtedRateHawk;

//        $matchedHotels = $outtedStuba;
//        dd($outtedTravellanda,$outtedStuba,$outtedRateHawk);
        $matchedHotels = $this->unionHotelLists($outtedTravellanda, $outtedStuba,$outtedRateHawk);

//        $matchingHotels['Response']['Body']['Hotels']['Hotel'] = $matchedHotels;
//        $matchingHotels['Response']['Body']["HotelsReturned"] = count($matchedHotels);
//
//        return $matchingHotels;
        $matchingHotels['Response']['Body']['Hotels']['Hotel'] = $matchedHotels;


        $matchingHotels['Response']['Body']["HotelsReturned"] = count($matchedHotels);

//        dd($matchedHotels);
//        dd($matchingHotels);

//        dd()

//        $stubaPrices = $this->stubaProvider->fetchPrices();

//        return $travellandaHotels;
//this is stuba start
//        dd($stubaHotels);

        return  $matchingHotels;
//        $stubaHotels['AvailabilitySearchResult'] = [];00



//        session('stubaHotels',$stubaHotels);

//        dd(session()->all());

//        dd($stubaHotels['Response']['Body']['Hotels']['Hotel']);
//        dd($travellandaHotels['Response']['Body']['Hotels']['Hotel'], $stubaHotels['Response']['Body']['Hotels']['Hotel']);


//        dd($matchedHotels['matchingHotels']);
//
//        $matchingHotels['Response']['Body']['Hotels']['Hotel'] = $matchedHotels['matchingHotels'];
//        $matchingHotels['Response']['Body']["HotelsReturned"] = count($matchedHotels['matchingHotels']);

//        dd($matchingHotels['Response']['Body']['Hotels']['Hotel'][0]);


//dd($outtedTravellanda,$outtedStuba)
//        dd($matchedHotels);


//        dd($stubaHotels);

        return $travellandaHotels;
//this is stuba end
//        $ratehawkPrices = $this->ratehawkProvider->fetchPrices();

//        $cheapestOption = ... // Implement your comparison logic here

//        dd($stubaHotels,$travellandaHotels);
    }



    public function fetchPolicies($option)
    {
        $travellandaPolicies = $this->travellandaProvider->fetchPolicies($option);
        return $travellandaPolicies;
    }


    public function bookHotel($option)
    {
        $travellandaBooking = $this->travellandaProvider->bookHotel($option);
        return $travellandaBooking;
    }

    function extractOptionIDs($data)
    {
        $optionIDs = [];

        foreach ($data as $key => $value) {
            if ($key === "OptionId") {
                $optionIDs[] = $value;
            } elseif (is_array($value)) {
                $optionIDs = array_merge($optionIDs, $this->extractOptionIDs($value));
            }
        }

        return $optionIDs;
    }

    public function fetchHotelDetails($option)
    {
        $travellandaBooking = $this->travellandaProvider->fetchHotelDetails($option);
        return $travellandaBooking;


    }

    public function bulkHotelDetailsRequest($option)
    {
        $travellandaBooking = $this->travellandaProvider->fetchBulkHotelDetails($option);
        return $travellandaBooking;
    }

    public function fetchStubaHotelDetails($option)
    {

        $stubaMoreHotelsDetails = $this->stubaProvider->fetchMoreHotelDetails($option);
//        dd($stubaMoreHotelsDetails);
        $stubaTransformed = $this->transformationService->transformHotelMoreDetails($stubaMoreHotelsDetails);
//        dd($stubaTransformed);
        //stuba_end
//
        return $stubaTransformed;
    }
    public function fetchRateHawkHotelDetails($option)
    {


        $rateHawkHotelsMoreDetails = $this->ratehawkProvider->moreDetailsOfRatehawkHotel($option);


//
        return $rateHawkHotelsMoreDetails;
    }



    public function bookStubaHotel($guests,$quoteId,$commitType){
        if($commitType == 'prepare'){

        $bookStubaHotel = $this->stubaProvider->bookHotelRequest($guests,$quoteId,$commitType);
        $transformPolicy = $this->transformationService->transformStubaPolicy($bookStubaHotel);
        return $transformPolicy;
        }
//dd($bookStubaHotel);
//        return $bookStubaHotel;

    }





    //moreHotel Functions//////////////////////////////////////////



    public function unionHotelLists($list1, $list2, $list3)
    {
        $uniqueHotels = collect();
        $allHotels = collect($list1)->merge($list2)->merge($list3);
        $allHotels->each(function ($hotel) use ($uniqueHotels) {
            $existingHotel = $uniqueHotels->first(function ($uniqueHotel) use ($hotel) {
                $similiratyValue = $this->calculateSimilarity($uniqueHotel["HotelName"], $hotel["HotelName"]);
                return $similiratyValue > 99.99;
            });

            if ($existingHotel) {
                $minimumPriceOfHotel = $this->findMinPrice($hotel["Options"]["Option"]);
                $minimumPriceOfExistingHotel = $this->findMinPrice($existingHotel["Options"]["Option"]);
                if ($minimumPriceOfHotel < $minimumPriceOfExistingHotel) {
                    $existingHotel = $hotel;
                }
            } else {
                $uniqueHotels->push($hotel);
            }
        });
//      $stubaHotels = $uniqueHotels->where('Vendor','Stuba');
        return $uniqueHotels->toArray();
    }


    function calculateSimilarity($str1, $str2)
    {
        similar_text($str1, $str2, $percent);
        return $percent;
    }
    function hotelWithMinimumPrice($hotel1, $hotel2, $hotel3)
    {
        $minPrice1 = $this->findMinPrice($hotel1["Options"]["Option"]);
        $minPrice2 = $this->findMinPrice($hotel2["Options"]["Option"]);
        $minPrice3 = $this->findMinPrice($hotel3["Options"]["Option"]);

        // Compare the minimum prices and return the hotel with the lowest minimum price
        if ($minPrice1 <= $minPrice2 && $minPrice1 <= $minPrice3) {
            return $hotel1;
        } elseif ($minPrice2 <= $minPrice1 && $minPrice2 <= $minPrice3) {
            return $hotel2;
        } else {
            return $hotel3;
        }
    }
    function findMinPrice($options)
    {
        // Initialize with a high value
        $minPrice = PHP_FLOAT_MAX;

        if(!isset($options[0])){
//            dd($options);
            $options = [$options];
        }
        // Loop through each option and find the minimum total price
        foreach ($options as $option) {
            $totalPrice = (float)$option['TotalPrice'];
            $minPrice = min($minPrice, $totalPrice);
        }

        return $minPrice;
    }





    //backup codes

    function findMatchingHotelssss($list1, $list2, $similarityThreshold = 80)
    {
        $matchingHotels = [];

        foreach ($list1 as $hotel1) {
            $foundMatch = false;
            foreach ($list2 as $hotel2) {

//$firstHotelAddress = $this->fetchHotelDetails($hotel1['HotelId'])['Response']['Body']['Hotels']['Hotel']['Address'];
//    $secondHotelAddress = $this->fetchStubaHotelDetails($hotel2['HotelId'])['Address'];
//                $similarity = $this->calculateSimilarity($firstHotelAddress, $secondHotelAddress);

                $similarity = $this->calculateSimilarity($hotel1["HotelName"], $hotel2["HotelName"]);

                if ($similarity >= $similarityThreshold) {
                    $foundMatch = true;
                    $matchingHotels[] = $this->hotelWithMinimumPrice($hotel1, $hotel2);
                    break;
                }
                if (!$foundMatch) {
                    // If hotel1 has no match in $list2, add it to uniqueHotels
                    $uniqueHotels[] = $hotel1;
                }
            }
        }
        dd($matchingHotels);
        return [$matchingHotels,$uniqueHotels];
    }
    function findMatchingHotelsOLD($list1, $list2, $similarityThreshold = 80)
    {
        $matchingHotels = [];
        $uniqueHotels = [];

        foreach ($list1 as $hotel1) {
            $foundMatch = false;

            foreach ($list2 as $hotel2) {
                $similarity = $this->calculateSimilarity($hotel1["HotelName"], $hotel2["HotelName"]);

                if ($similarity >= $similarityThreshold) {

                    $minPriceHotel = $this->hotelWithMinimumPrice($hotel1,$hotel2);
//
                    $matchingHotels[] = $minPriceHotel;
                    $foundMatch = true;
                    break; // No need to continue checking for this hotel1 in the remaining $list2
                }
            }

            if (!$foundMatch) {
                // If hotel1 has no match in $list2, add it to uniqueHotels
                $uniqueHotels[] = $hotel1;
            }
        }
        // Add remaining hotels in $list2 to uniqueHotels
        foreach ($list2 as $hotel2) {
            $foundMatch = false;

            foreach ($list1 as $hotel1) {
                $similarity = $this->calculateSimilarity($hotel1["HotelName"], $hotel2["HotelName"]);

                if ($similarity >= $similarityThreshold) {
                    $foundMatch = true;
                    break; // No need to continue checking for this hotel2 in the remaining $list1
                }
            }

            if (!$foundMatch) {
                // If hotel2 has no match in $list1, add it to uniqueHotels
                $uniqueHotels[] = $hotel2;
            }
        }
        dd($matchingHotels);
        $matchedAndUnique = array_merge($matchingHotels,$uniqueHotels);
        return $matchedAndUnique;

    }


}
