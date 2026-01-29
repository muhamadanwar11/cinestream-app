<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\TmdbService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function index()
    {
        $popularMovies = $this->tmdb->getPopularMovies();
        return view('dashboard', compact('popularMovies'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return redirect()->route('dashboard');
        }

        $searchResults = $this->tmdb->searchMovies($query);
        return view('dashboard', compact('searchResults', 'query'));
    }

    public function show($id)
    {
        $movie = $this->tmdb->getMovieDetails($id);

        // Check if movie is already in watchlist
        $inWatchlist = false;
        if (Auth::check()) {
            $inWatchlist = Movie::where('user_id', Auth::id())
                ->where('tmdb_id', $id)
                ->exists();
        }

        return view('movies.show', compact('movie', 'inWatchlist'));
    }

    public function watchlist()
    {
        $movies = Auth::user()->movies()->latest()->get();
        return view('watchlist.index', compact('movies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tmdb_id' => 'required',
            'title' => 'required',
            'poster_path' => 'nullable',
        ]);

        Movie::create([
            'user_id' => Auth::id(),
            'tmdb_id' => $request->tmdb_id,
            'title' => $request->title,
            'poster_path' => $request->poster_path,
        ]);

        return redirect()->back()->with('success', 'Movie added to watchlist!');
    }

    public function update(Request $request, Movie $movie)
    {
        // Ensure the user owns this record
        if ($movie->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'user_rating' => 'nullable|numeric|min:0|max:10',
            'notes' => 'nullable|string',
        ]);

        $movie->update($request->only(['user_rating', 'notes']));

        return redirect()->back()->with('success', 'Watchlist updated!');
    }

    public function destroy(Movie $movie)
    {
        // Ensure the user owns this record
        if ($movie->user_id !== Auth::id()) {
            abort(403);
        }

        $movie->delete();

        return redirect()->back()->with('success', 'Movie removed from watchlist!');
    }
}
