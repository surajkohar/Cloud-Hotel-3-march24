<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ImportStubaHotels extends Command
{
    protected $signature = 'importstuba';
    protected $description = 'Sucessfully imported data to database';

    public function handle()
    {
        {
            $xmlFolder = storage_path('app/HotelDetailXML');
            $xmlFiles = File::files($xmlFolder);

            foreach ($xmlFiles as $xmlFile) {
                $xmlFilePath = $xmlFile->getPathname();
                $hotelId = pathinfo($xmlFilePath, PATHINFO_FILENAME);

                $xmlString = file_get_contents($xmlFilePath);

                libxml_use_internal_errors(true);
                $xml = simplexml_load_string($xmlString);

                if ($xml === false) {
                    $errors = libxml_get_errors();
                    libxml_clear_errors();

                    foreach ($errors as $error) {
                        $this->error("XML Error for hotel ID: $hotelId - Line {$error->line}: {$error->message}");
                    }

                    continue; // Skip to the next iteration if there's an XML error
                }

                $jsonResult = json_encode($xml, true);
                $data = json_decode($jsonResult, true);

                try {
                    \App\Models\StubaHotels::create($data);
                    $this->info("Data inserted successfully for hotel ID: $hotelId");
                } catch (\Exception $e) {
                    $this->error("Error for hotel ID: $hotelId - " . $e->getMessage());
                }
            }

            $this->info('All data inserted successfully.');
        }
    }
}
