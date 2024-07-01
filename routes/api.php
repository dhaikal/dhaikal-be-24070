<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [MovieController::class, 'index']);
Route::get('/genre', [MovieController::class, 'genre']);
Route::get('/timeslot', [MovieController::class, 'timeslot']);
Route::get('/specific_movie_theater', [MovieController::class, 'specific_movie_theater']);
Route::get('/search_performer', [MovieController::class, 'search_performer']);