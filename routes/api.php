<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\ApiAuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register',[ApiAuthController::class, 'register'])->name('register.api');
});

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('/logout',[ApiAuthController::class, 'logout'])->name('logout.api');
});


Route::group(['prefix' => 'task'], function () {
    Route::get('/', [TaskController::class, 'index']);
    // Route::get('/{id}', [TaskController::class, 'show']);
    Route::post('/', [TaskController::class, 'store']);
    Route::put('/', [TaskController::class, 'update']);

    Route::get('/getByOrder', [TaskController::class, 'getByOrder']);


    // Route::put('/{id}', 'Task\TaskController@update');
    // Route::delete('/{id}', 'Task\TaskController@destroy');
})->middleware('auth:api');
