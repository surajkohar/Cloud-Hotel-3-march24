<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class DownloadHotelsCommand extends Command
{
    protected $signature = 'download:hotels';

    protected $description = 'Download and process hotel data from Emerging Travel Group API';

    public function handle()
    {
        $this->info('Downloading hotel region dump...');

        $regionDumpUrl = 'https://api.worldota.net/api/b2b/v3/hotel/region/dump/';
        $apiKey = 'f7163127-7de8-4efa-a0e5-aea4f8b23826'; // Replace with your actual API key
        $curlCommand = "curl -g --user '$apiKey:'";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $curlCommand
        ])->post($regionDumpUrl);

        $regionDump = $response->json();

        if ($regionDump && isset($regionDump['data']['url'])) {
            $regionDumpUrl = $regionDump['data']['url'];
            $archivePath = storage_path('app/hotel_region_dump.zst');

            Http::download($regionDumpUrl, $archivePath);

            $this->info('Hotel region dump downloaded successfully.');

            // Continue with the remaining logic
            // ...
        } else {
            $this->error('Failed to download hotel region dump or invalid response format.');
        }
    }


}
