<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

/*
Route::get('/home', function () {
    return view('home');
});
*/

Route::get('/profile', function () {
    return view('profile-page');
});

Route::get('/settings', function () {
    return view('edit-profile');
});

// Route::get('/lists', function () {
//     return view('lists');
// });

Route::get('/lists/new', function () {
    return view('new-list');
});

Route::get("login", [UserController::class, 'index']);
Route::post("checklogin", [UserController::class, 'checklogin']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('store', [RegisterController::class, 'store']);
Route::post("home", [UserController::class, 'successlogin']);
Route::get("home", [HomeController::class, 'show']);
Route::get("/game/{id}", [HomeController::class, 'viewSpecificGame']);
Route::get('logout',[UserController::class, 'logout']);
Route::post('/game/{id}', [RatingController::class, 'log']);
Route::get("profile", [RatingController::class, 'gameStats']);
Route::get("settings", [RatingController::class, 'show']);
Route::put('settings', [UserController::class, 'update']);
Route::get("/add-fav/{id}", [RatingController::class, 'addFav']);
Route::get("/remove-fav/{id}", [RatingController::class, 'removeFav']);
Route::get('/profile/{id}/edit-review', [RatingController::class, 'showLoggedInfo']);
Route::put('/profile/{id}/edit-review', [RatingController::class, 'editLog']);
Route::get('/profile/{id}/delete-review', [RatingController::class, 'deleteReview']);
Route::get("lists", [ListController::class, 'show']);
Route::post('/lists/new', [ListController::class, 'createList']);
Route::get("/lists/{id}", [ListController::class, 'viweSpecificList']);
Route::get("/lists/{id}/edit", [ListController::class, 'showListInfo']);
Route::put("/lists/{id}/edit", [ListController::class, 'editListInfo']);
Route::get("/lists/{id}/edit/addtoList", [ListController::class, 'addtoList']);
Route::get("/lists/{id}/edit/removeFromList", [ListController::class, 'removeFromList']);
Route::get("/lists/{id}/edit/removeList", [ListController::class, 'removeList']);
Route::get("profile/{id}/games", [HomeController::class, 'showMyGames']);
Route::get("/profile/{id}/lists", [ListController::class, 'showMyLists']);
