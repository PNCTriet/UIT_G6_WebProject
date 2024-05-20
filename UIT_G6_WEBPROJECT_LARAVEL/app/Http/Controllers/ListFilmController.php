<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListFilmController extends Controller
{
    //
    function get_movie_link()
    {
        // $movie_link = DB::table('movie_link')->get();
        // return view('index', compact('movie_link'));

        //===
        $sql = "UPDATE `movie`
                JOIN (
                    SELECT m.`id`, COUNT(DISTINCT CASE WHEN s.`point` > m.`point` THEN s.`point` ELSE NULL END) + 1 AS new_rank
                    FROM `movie` AS m
                    LEFT JOIN `movie` AS s ON m.`point` < s.`point`
                    GROUP BY m.`id`
                ) AS subquery ON `movie`.`id` = subquery.`id`
                SET `movie`.`rank` = subquery.`new_rank`;
                ";

        DB::statement($sql);

        $movies = DB::table('movie_link')
            ->join('movie', function ($join) {
                $join->on('movie_link.id', '=', 'movie.link_id');
            })
            ->orderBy('movie.rank')
            ->take(10)
            ->get();
        //===
        $data = DB::table('movie_link')
            ->join('movie', 'movie_link.id', '=', 'movie.link_id')
            ->select('movie_link.*', 'movie.title as movie_name', 'movie.description as movie_api')
            ->get();

        // Chuyển đổi dữ liệu thành Collection
        $data = collect($data);

        return view('index', ["data" => $data, "movies" => $movies]);
    }

    public function redirectToMovieDetail($id)
    {
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
