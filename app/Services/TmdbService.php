<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.themoviedb.org/3';
        $this->apiKey = config('services.tmdb.key');
    }

    public function getPopularMovies()
    {
        $response = Http::withoutVerifying()->get("{$this->baseUrl}/movie/popular", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'page' => 1,
        ]);

        return $response->json()['results'];
    }

    public function searchMovies($query)
    {
        $response = Http::withoutVerifying()->get("{$this->baseUrl}/search/movie", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'query' => $query,
            'page' => 1,
            'include_adult' => false,
        ]);

        return $response->json()['results'];
    }

    public function getMovieDetails($id)
    {
        $response = Http::withoutVerifying()->get("{$this->baseUrl}/movie/{$id}", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'append_to_response' => 'credits,videos',
        ]);

        return $response->json();
    }
}
