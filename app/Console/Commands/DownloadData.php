<?php
// app/Console/Commands/DownloadCities.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TravellandaDataDownloadService;

class DownloadData extends Command
{
    protected $signature = 'download:data';
    protected $description = 'Download cities from Travellanda in the background';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(TravellandaDataDownloadService $downloadService)
    {
        $this->info('Downloading cities and from Travellanda in the background...');
        $this->info('Downloading countries...');
        $downloadService->downloadCountries();
        $this->info('Countries downloaded successfully.');
        $this->info('Downloading cities...');
        $downloadService->downloadCities();
        $this->info('Cities downloaded successfully.');
    }
}
