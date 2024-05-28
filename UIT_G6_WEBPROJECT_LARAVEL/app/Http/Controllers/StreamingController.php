<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StreamingController extends Controller
{
    public function streamingmovie($id)
    {
        // // Lấy dữ liệu từ database dựa vào ID
        // $movieLink = DB::table('movie_link')->where('id', $id)->first();

        // if (!$movieLink) {
        //     // Handle case where movie link is not found
        //     abort(404, 'Movie link not found');
        // }

        // $movie = DB::table('movie')->where('link_id', $movieLink->id)->first();

        // if (!$movie) {
        //     // Handle case where movie is not found
        //     abort(404, 'Movie not found');
        // }

        // return view('streaming', [
        //     'movie' => $movie,
        //     'movieLink' => $movieLink
        // ]);

        return view('streaming');
    }
}
?>
