<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;


// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
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
Route::post('register', [UserRegisterController::class, "register"]);
Route::get('get', [UserRegisterController::class, "list"]);
Route::get('search/{search}', [UserRegisterController::class, "search"]);
Route::get('user-religion', [UserRegisterController::class, "userReligion"]);
Route::get('user-age', [UserRegisterController::class, "userAge"]);
Route::get('user-month', [UserRegisterController::class, "userMonth"]);


