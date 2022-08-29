<?php

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
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register',[\App\Http\Controllers\AuthController::class,'register']);
    Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
});

Route::middleware('JWT')->group(function(){
    Route::post('/auth/me', [\App\Http\Controllers\AuthController::class,'me']);
});

Route::get('/news',[\App\Http\Controllers\Api\newsController::class,'getNews']);
Route::get('/news-details/{id}',[\App\Http\Controllers\Api\newsController::class,'newsDetails']);
Route::post('/contact-us',[\App\Http\Controllers\ContactController::class,'store']);
