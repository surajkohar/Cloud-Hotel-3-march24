<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingHotelController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingFlightController;
use App\Http\Controllers\AdminSettingController;

use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();



    Route::get('/', function () {
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::middleware([
      'role:Admin|Employe|Manager',
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [BookingHotelController::class, 'Dashboard'])->name('dashboard');
            Route::delete('/resetRole/{user}', [UserController::class, 'resetRoles'])->name('user.resetRoles');
            Route::resource('/users', UserController::class);
            Route::resource('/roles', RoleController::class);
            Route::resource('/permissions', PermissionController::class);
//            Route::get('/settings',[SettingController::class, 'index'])->name('dashboard.setting');
//            Route::get('/settings/{setting}/edit',[SettingController::class, 'edit'])->name('dashboard.setting.edit');
//            Route::get('/settings/delete/{setting}',[SettingController::class, 'destroy'])->name('dashboard.setting.delete');
//            Route::get('/settings/create',[SettingController::class, 'create'])->name('dashboard.setting.create');
//            Route::post('/settings/store/',[SettingController::class, 'store'])->name('dashboard.setting.store');
//            Route::PUT('/settings/update/{setting}',[SettingController::class, 'store'])->name('dashboard.setting.update');
            Route::get('/viewBookingDetails/{id}',[BookingHotelController::class, 'viewBookingDetails'])->name('viewBookingDetails');
            Route::resource('/employe',EmployeController::class);
            Route::resource('/team',TeamController::class);
            Route::resource('/adminSetting',AdminSettingController::class);

            Route::resource('/hotelTable',BookingHotelController::class);
            Route::resource('/flightTable',BookingFlightController::class);
            Route::get('/agents', function () {
                return view('Dashboard.agents');
            })->name('agents');
            Route::get('/flights', function () {
                return view('dashboard.flights');
            })->name('flights');
            Route::get('/hotels', function () {
                return view('Dashboard.hotels');
            })->name('hotels');
            Route::get('/funds', function () {
                return view('Dashboard.funds');
            })->name('funds');
            Route::get('/teams', function () {
                return view('Dashboard.teams');
            })->name('teams');
            Route::get('/analytics', function () {
                return view('Dashboard.analytics');
            })->name('analytics');
//            Route::get('/logout', function () {
//                Auth::logout();
//                return redirect('/');
//            })->name('logout');

            Route::get('/settings', function () {
                return view('Dashboard.settings');
            })->name('settings');


        });
    });

    Route::get('/download-excel', [BookingHotelController::class, 'downloadExcel'])->name('downloadExcel');

    Route::get('/logout', function () {
                Auth::logout();
                return redirect('/');
            })->name('logout');


        // Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified',
    // ])->group(function () {
    //     Route::view('/dashboard', 'dashboard')->name('dashboard');
    // });

    Route::get('/download',function (){
        $travellandaDataDownloadService = new \App\Services\TravellandaDataDownloadService();
        $travellandaDataDownloadService->downloadCountries();
        $travellandaDataDownloadService->downloadCities();
        return 'done';
    });
//        $travellandaService = new \App\Services\TravellandaService();
//        $xmlRequest = $travellandaService->buildSearchRequest([
//            'city' => 'PAR',
//            'checkIn' => '2021-09-01',
//            'checkOut' => '2021-09-02',
//        ]);
//        $response = $travellandaService->sendRequest($xmlRequest);
//        $jsonResponse = $travellandaService->XMlToJSON($response);
//        dd($jsonResponse);
//    });

// route group for hotel
    Route::group(['prefix' => 'hotel'], function () {
        Route::get('/search', [\App\Http\Controllers\SearchController::class,'index'])->name('hotel.search');
        Route::get('/search-results', [\App\Http\Controllers\SearchController::class,'results'])->name('hotel.search.results');
    //    old one
        // Route::get('/hotel-details/{hotelId}', [\App\Http\Controllers\SearchController::class,'details'])->name('hotel.details');
    //   new one
        Route::get('/hotel-details', [\App\Http\Controllers\SearchController::class,'details'])->name('hotel.details');
        Route::get('/holidayList', [\App\Http\Controllers\SearchController::class,'hotelResults'])->name('hotel.holidayList');
        Route::get('/searchHotelByName', [\App\Http\Controllers\SearchController::class,'searchHotel'])->name('hotel.searchHotelByName');


        Route::get('/booking', [BookingController::class,'index'])->name('hotel.booking');
        Route::get('/bookingStage1/{bookingDetails}', [BookingController::class,'bookingStage1'])->name('hotel.bookingStage1');

        Route::post('/morefilter',[\App\Http\Controllers\SearchController::Class,'moreFilterHotel'])->name('hotel.filterHotel');
        Route::post('/rating',[\App\Http\Controllers\SearchController::Class,'HotelRatings'])->name('hotel.rating');
        Route::post('/priceRange',[\App\Http\Controllers\SearchController::Class,'filterByPriceRange'])->name('hotel.filterHotelByPrice');

        Route::post('/sortby',[\App\Http\Controllers\SearchController::Class,'sortBy'])->name('hotel.sort');


        Route::post('/bookingStage2', [BookingController::class,'bookingStage2'])->name('hotel.bookingStage2');
        Route::post('/bookingStage3', [BookingController::class,'bookingStage3'])->name('hotel.bookingStage3');
        Route::get('/cardPayment/bookingStage4',[BookingController::Class,'bookingStage4'])->name('hotel.bookingStage4');

        Route::get('/bookingStage5/payment',[BookingController::Class,'cardPayment'])->name('hotel.cardPayment');

        Route::get('/resetfilter', [\App\Http\Controllers\SearchController::Class, 'resetFilter'])->name('hotel.resetFilter');
        Route::get('/applyfilter', [\App\Http\Controllers\SearchController::Class, 'applyFilter'])->name('hotel.applyFilter');
        Route::get('/removefilter', [\App\Http\Controllers\SearchController::Class, 'removeFilter'])->name('hotel.removeFilter');



        // routes/web.php



           Route::get('/hotel/suggestions', [\App\Http\Controllers\SearchController::class, 'getHotelSuggestions'])->name('hotel.suggestions');

           Route::get('/hotel/roomDetailsPdf/{hotelId}', [HotelController::class, 'roomDetaiPdf'])->name('hotel.roomDetailsPdf');
        Route::get('/sharePdf/{hotelId}', [HotelController::class, 'sharePdf'])->name('hotel.sharePdf');



    });


});
Route::get('/fetchhotels/{pageNo}',function($pageNo) {
//    dd($pageNo);
//    $pageNo = 2;

    $itemsPerPage = 12;
    $sessionData = Session::all();
    $data = $sessionData['availableHotels']['Response']['Body']['Hotels']['Hotel'];
    $totalPage = intval(count($data) / $itemsPerPage)+1;
    $hotelData = array_slice($data, ($pageNo - 1) * $itemsPerPage, $itemsPerPage);
    $totalRecords = count($data);
    return response()->json(['totalHotelCount' => $totalRecords,'pageno'=> $pageNo,'totalPage'=>$totalPage,'totalHotels' => $hotelData]);
});



Route::get('fetchStubaMoreHotelDetails/{hotelId}',function($hotelId){
//    dd('fetchStubaMoreHotelDetails',$hotelId);
//    $xmlFilePath = '4688893.xml';
//    $xmlFilePath = storage_path(`app/HotelDetailXML/{$hotelId}.xml`);
    $xmlFilePath = storage_path('app/HotelDetailXML/' . $hotelId . '.xml');

//    dd($xmlFilePath);
//    $jsonResult = convertXmlToJson($xmlFilePath);
    if (!file_exists($xmlFilePath)) {
        die('XML file not found.');
    }

    $xmlString = file_get_contents($xmlFilePath);
    $xml = simplexml_load_string($xmlString);
    $jsonResult = json_encode($xml, JSON_PRETTY_PRINT);
    $jsonResult = json_decode($jsonResult, true);
//return  $jsonResult;
    $amenities = isset($jsonResult['Amenity']) && is_array($jsonResult['Amenity']) ? $jsonResult['Amenity'] : [];

    $transformedAmenities = array_map(function ($amenity) {
        return [
            "FacilityType" => $amenity['Code'], // Assuming you want to map 'Code' to 'FacilityType'
            "FacilityName" => $amenity['Text'], // Mapping 'Text' to 'FacilityName'
        ];
    }, $amenities);

    $transformedDetails = [
        "HotelId" => $jsonResult['Id'],
        "CityId" => $jsonResult['Region']['CityId'],
        "HotelName" =>$jsonResult['Name'],
//        "StarRating" => round($stubaDetails['Rating']['Score'] / 10), // Assuming Score is out of 100
    "StarRating"=>$jsonResult['Stars'],
        "Latitude" => $jsonResult['GeneralInfo']['Latitude'],
        "Longitude" => $jsonResult['GeneralInfo']['Longitude'],
        "Address" => $jsonResult['Address']['Address1'],
        "City" => $jsonResult['Address']['City'],
        "Country" => $jsonResult['Address']['Country'],
        "Location" => $jsonResult['Region']['Name'],
        "PhoneNumber" => $jsonResult['Address']['Tel'],
        "Description" => implode("\n", array_map(function($desc) {
            return $desc['Text'];
        }, $jsonResult['Description'])),
        "Facilities" => [
            "Facility" => $transformedAmenities ,
        ],
        "Images" => [
            "Image" => array_map(function($photo) {
                return $photo['Url']; // Assuming the base URL needs to be appended
            }, $jsonResult['Photo'])
        ]
    ];
dd($transformedDetails);
    return response()->json($transformedDetails);

    return $jsonResult;
});


