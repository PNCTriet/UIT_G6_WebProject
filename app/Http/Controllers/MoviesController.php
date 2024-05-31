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

    
    public function show($description)
    {
        // Make API request to search for the movie
        // ID của TV show từ biến $description
        ;

        // Gọi API để lấy thông tin về TV show dựa trên ID
        $response = Http::get("https://api.themoviedb.org/3/tv/$description", [
            'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        ]);

        if ($response->successful()) {
            $movie = $response->json(); // Lấy dữ liệu bộ phim từ phản hồi JSON
            return view('detail', compact('movie'));
        } else {
            abort(404, 'Failed to fetch movie data');
        }
    }

    public function showmovies($id)
    {
        // Gọi API để lấy thông tin về TV show dựa trên ID
        $response = Http::get("https://api.themoviedb.org/3/movie/$id", [
            'api_key' => '123113d4a4822456c35fc67ce8dd0c16',
        ]);

        if ($response->successful()) {
            $movie = $response->json(); // Lấy dữ liệu bộ phim từ phản hồi JSON
            return view('detailmovies', compact('movie'));
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
