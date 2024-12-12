<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class FloodPredictionController extends Controller
{
    /**
     * Make a flood prediction using the trained model.
     *
     * @param Request $request
     * @param WeatherService $weatherService
     * @return \Illuminate\Http\Response
     */
    public function predictFlood(Request $request, WeatherService $weatherService)
    {
        // Get the latitude and longitude from the request
        $latitude = $request->input('lat');
        $longitude = $request->input('lng');

        // Fetch weather data from OpenWeatherMap using the WeatherService
        $weatherData = $weatherService->getWeatherData($latitude, $longitude);

        // Check if the weather data was fetched successfully
        if (!$weatherData) {
            \Log::error('Error fetching weather data');
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }

        // Log the full weather data to verify the structure
        \Log::info('Weather Data:', $weatherData);

        // Extract necessary weather features from the API response
        $features = [
            'temperature' => $weatherData['main']['temp'],  // Temperature (°C)
            'humidity' => $weatherData['main']['humidity'],  // Humidity (%)
            'pressure' => $weatherData['main']['pressure'],  // Atmospheric pressure (hPa)
            'rain' => isset($weatherData['rain']['1h']) ? $weatherData['rain']['1h'] : 0,  // Precipitation (mm/h)
            'wind_speed' => $weatherData['wind']['speed'],  // Wind speed (m/s)
            'wind_gust' => isset($weatherData['wind']['gust']) ? $weatherData['wind']['gust'] : 0,  // Wind gust (m/s)
            'cloudiness' => $weatherData['clouds']['all'],  // Cloud cover (%)
        ];

        // Log the extracted features for debugging
        \Log::info('Extracted features: ', $features);

        // Convert the features array to a comma-separated string
        $featuresStr = implode(',', $features);

        // Path to your Python executable (directly specify the absolute path)
        $pythonPath = "C:\\Python312\\python.exe";  // Adjust path based on your Python installation

        // Path to your Python script (using base_path for Laravel project)
        $scriptPath = base_path('app/Python/predict.py'); // Path to your Python script

        // Log the full Python command being executed
        \Log::info("Python command: $pythonPath $scriptPath $featuresStr");

        // Command to execute the Python script with the features passed as argument
        $command = "$pythonPath $scriptPath $featuresStr";

        // Execute the command and capture the output (both stdout and stderr)
        $output = shell_exec($command . ' 2>&1'); // Capture both stdout and stderr

        // Log the output for debugging (optional)
        \Log::info("Python output: " . $output);

        // Return the prediction result as a JSON response
        return response()->json([
            'prediction' => $output
        ]);
    }
}

