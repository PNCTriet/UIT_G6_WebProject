<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SearchController extends Controller
{
    public function showSearchPage()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $api_key = '123113d4a4822456c35fc67ce8dd0c16';

        $video_json_file = storage_path('json/json_videos.json');
        $details_json_file = storage_path('json/json_details.json');

        $video_json_content = File::get($video_json_file);
        $video_data_all = json_decode($video_json_content, true);

        $details_json_content = File::get($details_json_file);
        $details_data_all = json_decode($details_json_content, true);

        $results = [];

        foreach ($details_data_all as $series_id => $details_data) {
            if (strpos(strtolower($series_id), strtolower($query)) !== false) {
                $video_data_key = $series_id . '_videos';
                $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                $youtube_key = $video_data && !empty($video_data['results']) ? $video_data['results'][0]['key'] : null;

                $results[] = [
                    'title' => $details_data['title'],
                    'overview' => $details_data['overview'],
                    'poster_link' => $details_data['poster_link'],
                    'redirect_url' => route('movies.redirect', $series_id),
                    'youtube_key' => $youtube_key,
                    'vote_average' => $details_data['vote_average'],
                    'number_of_episodes' => $details_data['number_of_episodes'],
                    'genres' => array_column($details_data['genres'], 'name'),
                ];
            }
        }

        return response()->json($results);
    }
}
