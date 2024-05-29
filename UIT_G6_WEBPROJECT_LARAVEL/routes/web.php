<?php


use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StreamingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordManager;
use App\Http\Controllers\testController;
use App\Http\Controllers\ListFilmController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController1;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Console\View\Components\Mutators\EnsurePunctuation;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\GeminiController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/index', [App\Http\Controllers\ListFilmController::class, 'get_movie_link']);

Route::get('/home',[testController::class,'home'])->middleware(EnsureTokenIsValid::class);


// Route::post("/test", function(){
//     return response()->json(['text'=>'hello anh trai']);
// });
Route::get('/token', function () {
    return csrf_token(); 
});

// Route::get("/detail", function(){
//     return view('detail');
// });

Route::get('/profile', [ProfileController::class, 'get_information'])->name('get_information');
Route::get('/streamingtv/{id}', [StreamingController::class, 'streamingmovie'])->name('stream');
Route::get('/streamingmv/{id}', [StreamingController::class, 'streamingmoviemv'])->name('streammv');

Route::get('/search', [SearchController::class, 'showSearchPage'])->name('search.page');
Route::get('/search/results', [SearchController::class, 'search']);
// Movie 
Route::get('/tables',[testController::class,'table'])->middleware(EnsureTokenIsValid::class);
Route::put('/update-movie/{id}',[testController::class,'update_movie']);
Route::get('/add-movie',[testController::class,'add_movie']);
Route::post('/add-movie',[testController::class,'post_movie'])    ;
Route::get('/get-movie/{id}',[testController::class,'get_movie']); 
Route::delete('/delete-movie/{id}',[testController::class,'delete_movie']);  
;

// Voucher
Route::get('/live-search-voucher',[testController::class,'live_search_voucher'])->middleware(EnsureTokenIsValid::class);
Route::get('/voucher-management',[testController::class,'voucher_management'])->middleware(['auth', 'verified']);
Route::post('/add-voucher',[testController::class,'add_voucher']);
Route::get('/get-voucher/{id}',[testController::class,'get_voucher']);
Route::delete('/delete-voucher/{id}',[testController::class,'delete_voucher']);
Route::put('/update-voucher/{id}',[testController::class,'update_voucher']);

// Users
Route::get('/users-management',[testController::class,'users_management'])->middleware(EnsureTokenIsValid::class);
Route::get('/live-search-users',[testController::class,'live_search_users']);
Route::post('/add-user',[testController::class,'add_user']);
Route::get('/get-user/{id}',[testController::class,'get_user']);
Route::put('/update-user/{id}',[testController::class,'update_user']);
Route::delete('/delete-user/{id}',[testController::class,'delete_user']);

//Mail
Route::get('/send-mail',[testController::class,'send_mail'])->middleware(EnsureTokenIsValid::class);
Route::put('/mail-to/{id}',[testController::class,'mail_to']);

// Export Excle
Route::get('/export-user',[testController::class,'export_user']);
Route::get('/export-movie',[testController::class,'export_movie']);


Route::get('/profile', [ProfileController::class, 'get_information']);

// // Route để hiển thị form chỉnh sửa profile
// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::put('/update-profile', [ProfileController::class, 'update']);
// Route để xóa tài khoản người dùng
Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
require __DIR__.'/auth.php';

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('registration.post');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/forget-password", [ForgetPasswordManager::class, "forgetPassword"])
    ->name('forget.password');
Route::post("/forget-password", [ForgetPasswordManager::class, "forgetPasswordPost"])
    ->name('forget.password.post');
Route::get("/reset-password/{token}", [ForgetPasswordManager::class, "resetPassword"])
    ->name("reset.password");
Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])
    ->name("reset.password.post");

//Gemini AI
// Route::post('/only-text',[GeminiController::class,'only_text']);
Route::post('/text-image',[GeminiController::class,'text_image']);

Route::get('/movies/{id}', [ListFilmController::class, 'redirectToMovieDetail'])->name('movies.redirect');
Route::get('/moviesmv/{id}', [ListFilmController::class, 'redirectToMovieDetail_movies'])->name('movies.redirectmovies');

Route::get('/tv/{name}', [MoviesController::class, 'show'])->name('detail');
Route::get('/mv/{id}', [MoviesController::class, 'showmovies'])->name('detailmovies');

//  onclick="redirectTo('' . route('movies.redirectmovies', 168259}) . '')"></a>
//  onclick="redirectTo('http://127.0.0.1:8000/movies/2')">