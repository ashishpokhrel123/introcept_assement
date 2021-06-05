<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


/* saving client detail to csv file */
Route::post('createClient',  [UserController::class, 'addUser'])->name('create');

/* fetching all client from csv file */
Route::get('getClient', [UserController::class, "getClient"])->name("getclient");


