<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesRanking;

Route::get('/movies',[
    MoviesRanking::class,
    'index'
]);
/*Route::get('/', function () {
    return view('welcome');
});*/
