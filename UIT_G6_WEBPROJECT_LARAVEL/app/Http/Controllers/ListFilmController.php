<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ListFilmController extends Controller
{
    //
    function get_movie_link(){
        // $movie_link = DB::table('movie_link')->get();
        // return view('index', compact('movie_link'));

        $movie_link = DB::table('movie_link')
                        ->join('movie', 'movie_link.id', '=', 'movie.link_id')
                        ->select('movie_link.*', 'movie.title as movie_name')
                        ->get();
        return view('index', compact('movie_link'));
    }
    
    public function redirectToMovieDetail($id){
        $movieLink = DB::table('movie_link')->where('id', $id)->first();
    
        if (!$movieLink) {
            // Handle case where movie link is not found
            abort(404);
        }
        
        $movie = DB::table('movie')->where('id', $movieLink->id)->first();
        
        if (!$movie) {
            // Handle case where movie is not found
            abort(404);
        }
        
        return redirect()->route('detail', $movie->description);

    }
}
