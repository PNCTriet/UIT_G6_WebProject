<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StreamingController extends Controller
{
    public function streamingmovie($id)
    {
        // Truy vấn link_id từ bảng movie dựa trên description
        $movie = DB::table('movie')
            ->where('description', $id)
            ->select('link_id')
            ->first();

        // Kiểm tra nếu không tìm thấy link_id
        if (!$movie) {
            abort(404, 'Movie not found');
        }

        // Truy xuất link_id từ kết quả truy vấn
        $link_id = $movie->link_id;

        // Truy vấn movie_link từ bảng movie_link dựa trên link_id
        $movie_link = DB::table('movie_link')
            ->where('id', $link_id)
            ->select('movie_link', 'episode_status')
            ->first();

        // Gọi API từ The Movie Database (TMDb)
        $response = Http::get("https://api.themoviedb.org/3/tv/$id", [
            'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        ]);

        // Kiểm tra phản hồi từ API
        if ($response->successful()) {
            $movie = $response->json(); // Lấy dữ liệu bộ phim từ phản hồi JSON

            // Kết hợp dữ liệu từ cơ sở dữ liệu với dữ liệu từ API
            $movie['link_id'] = $link_id;
            $movie['movie_link'] = $movie_link->movie_link;
            $movie['episode_status'] = $movie_link->episode_status;
            $movie['endpoint_status'] = 'tv';
            return view('streaming', compact('movie'));
        } else {
            abort(404, 'Failed to fetch movie data');
        }
    }

    public function streamingmoviemv($id)
    {
        // Truy vấn link_id từ bảng movie dựa trên description
        $movie = DB::table('movie')
            ->where('description', $id)
            ->select('link_id')
            ->first();

        // Kiểm tra nếu không tìm thấy link_id
        if (!$movie) {
            abort(404, 'Movie not found');
        }

        // Truy xuất link_id từ kết quả truy vấn
        $link_id = $movie->link_id;

        // Truy vấn movie_link từ bảng movie_link dựa trên link_id
        $movie_link = DB::table('movie_link')
            ->where('id', $link_id)
            ->select('movie_link', 'episode_status')
            ->first();

        // Gọi API từ The Movie Database (TMDb)
        $response = Http::get("https://api.themoviedb.org/3/movie/$id", [
            'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        ]);

        // Kiểm tra phản hồi từ API
        if ($response->successful()) {
            $movie = $response->json(); // Lấy dữ liệu bộ phim từ phản hồi JSON

            // Kết hợp dữ liệu từ cơ sở dữ liệu với dữ liệu từ API
            $movie['link_id'] = $link_id;
            $movie['movie_link'] = $movie_link->movie_link;
            $movie['episode_status'] = $movie_link->episode_status;
            $movie['endpoint_status'] = 'mv';

            return view('streaming', compact('movie'));
        } else {
            abort(404, 'Failed to fetch movie data');
        }
    }
}
