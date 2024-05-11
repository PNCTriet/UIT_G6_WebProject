<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\testController;
use App\Http\Controllers\ListFilmController;
use App\Http\Controllers\MoviesController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/index', [App\Http\Controllers\ListFilmController::class, 'get_movie_link']);

Route::get('/home',[testController::class,'home']);
Route::get("/test", function(){
    return view('testapi');
});

Route::get("/detail", function(){
    return view('detail');
});

//Route::get('/movies/{id}', 'ListFilmController@redirectToMovieDetail')->name('movies.redirect');
Route::get('/movies/{id}', [App\Http\Controllers\ListFilmController::class, 'redirectToMovieDetail'])->name('movies.redirect');
Route::get('/{name}', [App\Http\Controllers\MoviesController::class, 'show'])->name('detail');


// Movie 
Route::get('/tables',[testController::class,'table']);
Route::put('/update-movie/{id}',[testController::class,'update_movie']);
Route::get('/add-movie',[testController::class,'add_movie']);
Route::post('/add-movie',[testController::class,'post_movie'])    ;
Route::get('/get-movie/{id}',[testController::class,'get_movie']); 
Route::delete('/delete-movie/{id}',[testController::class,'delete_movie']);  
;

// Voucher
Route::get('/live-search-voucher',[testController::class,'live_search_voucher']);
Route::get('/voucher-management',[testController::class,'voucher_management']);
Route::post('/add-voucher',[testController::class,'add_voucher']);
Route::get('/get-voucher/{id}',[testController::class,'get_voucher']);
Route::delete('/delete-voucher/{id}',[testController::class,'delete_voucher']);
Route::put('/update-voucher/{id}',[testController::class,'update_voucher']);

// Users
Route::get('/users-management',[testController::class,'users_management']);
Route::get('/live-search-users',[testController::class,'live_search_users']);
Route::post('/add-user',[testController::class,'add_user']);

// ============

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('registration.post');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/forget-password", [ForgetPasswordManager::class, "forgetPassword"])
    ->name('forget.password');
Route::post("/forget-password", [ForgetPasswordManager::class, "forgetPasswordPost"])
    ->name('forget.password.post');
Route::get("/reset-password/{token}", [ForgetPasswordManager::class, "resetPassword"])
    ->name("reset.password");
Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])
    ->name("reset.password.post");

