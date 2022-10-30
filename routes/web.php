<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

/*
Route::get('/home', function () {
    return view('home');
});
*/

Route::get('/profile', function () {
    return view('profile-page');
});


Route::post("checklogin", [UserController::class, 'checklogin']);
Route::post("home", [UserController::class, 'successlogin']);
Route::get("home", [HomeController::class, 'show']);
Route::get("/game/{id}", [HomeController::class, 'viewSpecificGame']);