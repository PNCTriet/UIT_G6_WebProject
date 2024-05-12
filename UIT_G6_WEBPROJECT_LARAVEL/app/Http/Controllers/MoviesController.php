<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $name)
    // {
    //     //
    //     // API Key của bạn từ TMDB
    //     $api_key = '123113d4a4822456c35fc67ce8dd0c16';

    //     // Từ khóa tìm kiếm

    //     // URL của API của TMDB để tìm kiếm TV show
    //     $url = "https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=" . urlencode($name);

    //     // Khởi tạo curl
    //     $curl = curl_init();

    //     // Cài đặt các tùy chọn cho curl
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ]);

    //     // Gửi yêu cầu và nhận kết quả
    //     $response = curl_exec($curl);

    //     // Đóng curl
    //     curl_close($curl);

    //     // Chuyển đổi JSON thành mảng
    //     $data = json_decode($response, true);

    //     // Check if any movies are found
    //     if (isset($data['results']) && count($data['results']) > 0) {
    //         // Get details of the first movie found
    //         $movieDetails = $data['results'][0];
    //         // Pass movie details to view
    //         return view('detail', compact('movieDetails'));
    //     } else {
    //         // Handle case where no movie is found
    //         abort(404, 'Movie not found');
    //     }
    // }
    public function show($description)
    {
        // Make API request to search for the movie
        // ID của TV show từ biến $description
        ;

        // Gọi API để lấy thông tin về TV show dựa trên ID
        $response = Http::get("https://api.themoviedb.org/3/tv/$description", [
            'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        ]);


        // Make API request to get movie details by ID
        // $response = Http::get('https://api.themoviedb.org/3/search/movie/' . $description, [
        //     'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        // ]);


        // Check if the request was successful
        // if ($response->successful()) {
        //     // Get the first result
        //     $movie = $response['results'][0];

        //     // Pass movie details to view
        //     return view('detail', compact('movie'));
        // } else {
        //     // Handle case where request was not successful
        //     abort(404, 'Movie not found');
        // }

        if ($response->successful()) {
            $movie = $response->json(); // Lấy dữ liệu bộ phim từ phản hồi JSON
            return view('detail', compact('movie'));
        } else {
            abort(404, 'Failed to fetch movie data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
