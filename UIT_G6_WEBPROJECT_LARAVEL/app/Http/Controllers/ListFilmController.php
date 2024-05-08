<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ListFilmController extends Controller
{
    //
    function get_data(){
        $data = DB::table('movie_link')->get();
        return view('index', compact('data'));
    }
    
}
