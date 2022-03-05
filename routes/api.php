<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Cinema\CinemaController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Ticket\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
});


Route::group(['prefix' => 'general'], function () {
    Route::get('/cities', [GeneralController::class, 'cities']);
});

Route::group(['prefix' => 'cinema'], function () {
    Route::get('/', [CinemaController::class, 'index']);
    Route::get('/filter', [CinemaController::class, 'filter']);
    Route::post('/', [CinemaController::class, 'store'])->middleware('auth:api');
    Route::delete('/', [CinemaController::class, 'destroy'])->middleware('auth:api');

    Route::post('/add-movie', [CinemaController::class, 'addMovie'])->middleware('auth:api');
    Route::post('/remove-movie', [CinemaController::class, 'removeMovie'])->middleware('auth:api');
});

Route::group(['prefix' => 'movie'], function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::post('/', [MovieController::class, 'store'])->middleware('auth:api');
});

Route::group(['prefix' => 'ticket'], function () {
    Route::get('/my-tickets', [TicketController::class, 'myTickets'])->middleware('auth:api');
    Route::post('/', [TicketController::class, 'store'])->middleware('auth:api');
    Route::delete('/', [TicketController::class, 'destroy'])->middleware('auth:api');
});







Route::group(['prefix' => 'task'], function () {
    Route::get('/', [TaskController::class, 'index']);
    // Route::get('/{id}', [TaskController::class, 'show']);
    Route::post('/', [TaskController::class, 'store']);
    Route::put('/', [TaskController::class, 'update']);
    Route::get('/getByOrder', [TaskController::class, 'getByOrder']);
    // Route::put('/{id}', 'Task\TaskController@update');
    // Route::delete('/{id}', 'Task\TaskController@destroy');
});
