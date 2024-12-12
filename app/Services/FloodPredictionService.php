<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FloodPredictionService
{
    // Fetch flood prediction data
    public function getFloodPrediction($latitude, $longitude)
    {
        // Example of a Flask API URL for flood prediction (adjust as per your setup)
        $url = "http://localhost:5000/predict?lat={$latitude}&lon={$longitude}";

        // Make the API call
        $response = Http::get($url);

        // Return the prediction data
        return $response->json();
    }
}
