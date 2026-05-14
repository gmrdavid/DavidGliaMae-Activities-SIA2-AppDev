<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    private $apiKey = '459b3a23c17ae043929c07267d525229'; // Add your real API key
    
    public function index(Request $request)
    {
        $location = $request->get('location', 'London'); // Default to London
        
        // Clear any cached data for new location
        Cache::forget("weather_{$location}");
        
        // Fetch FRESH data for the SPECIFIC location
        $weatherData = $this->fetchWeatherData($location);
        
        return view('weather.index', compact('weatherData'));
    }
    
    private function fetchWeatherData($location)
    {
        // Try cache first (5 minutes)
        $cacheKey = "weather_{$location}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        
        // Parse location - support city names OR coordinates
        $query = $this->parseLocation($location);
        
        // Current weather API call
        $currentResponse = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $query,
            'appid' => $this->apiKey,
            'units' => 'metric'
        ]);
        
        // 5-day forecast API call  
        $forecastResponse = Http::get("https://api.openweathermap.org/data/2.5/forecast", [
            'q' => $query,
            'appid' => $this->apiKey,
            'units' => 'metric'
        ]);
        
        $weatherData = [
            'current' => $currentResponse->successful() ? $currentResponse->json() : null,
            'forecast' => $forecastResponse->successful() ? $forecastResponse->json() : null
        ];
        
        // Cache for 5 minutes
        Cache::put($cacheKey, $weatherData, 300);
        
        return $weatherData;
    }
    
    private function parseLocation($location)
    {
        // Support coordinates format: "lat,lon" or "lat,lon,country"
        if (preg_match('/^(-?\d+\.?\d*),(-?\d+\.?\d*)(?:,[\w]{2})?$/', $location, $matches)) {
            $lat = $matches[1];
            $lon = $matches[2];
            return "{$lat},{$lon}";
        }
        
        // Default to city name
        return $location;
    }
}