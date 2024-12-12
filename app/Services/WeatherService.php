<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;


class WeatherService
{
    protected $apiKey = '90c9d94b79ff4026e46958f11d7f7fd8'; // Replace with your actual API key

    public function getWeatherData($lat, $lng)
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lng}&appid={$this->apiKey}&units=metric";

        try {
            $response = file_get_contents($url);
            \Log::info("Weather API response: " . $response); // Log raw response
            return json_decode($response, true);
        } catch (\Exception $e) {
            \Log::error("Error fetching weather data: " . $e->getMessage());
            return null;
        }
    }
}


