<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Rating;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function genre(Request $request)
    {
        $genre = $request->query('genre');
        $movies = Movie::where('Genre', $genre)->get();

        return response()->json($movies);
    }

    public function timeslot(Request $request)
    {
        $theater_name = $request->query('theater_name');
        $time_start = $request->query('time_start');
        $time_end = $request->query('time_end');

        $start = date('Y-m-d H:i:s', strtotime($time_start));
        $end = date('Y-m-d H:i:s', strtotime($time_end));

        $movies = Movie::where('theater_name', $theater_name)
                        ->where('start_time', '>=', $start)
                        ->where('end_time', '<=', $end)
                        ->get();

        return response()->json($movies);
    }

    public function specific_movie_theater(Request $request)
    {
        $theater_name = $request->query('theater_name');
        $d_date = $request->query('d_date');

        $date = date('Y-m-d', strtotime($d_date));

        $movies = Movie::where('theater_name', $theater_name)
                        ->where('start_time', '>=', $date)
                        ->get();

        return response()->json($movies);
    }

    public function search_performer(Request $request)
    {
        $performer_name = $request->query('performer_name');
        $movies = Movie::where('Performer', $performer_name)->get();

        return response()->json($movies);
    }

    public function give_rating(Request $request)
    {
        $request->validate([
            'Movie_title' => 'required',
            'Username' => 'required',
            'Rating' => 'required|integer',
            'R_description' => 'required',
        ]);

        $rating = Rating::create($request->all());
        return response()->json($rating, 201);
    }
}
