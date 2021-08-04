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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('list', [UserController::class, 'show_list']);
Route::get('delete_user/{id}', [UserController::class, 'delete_user']);
Route::post('add_user', [UserController::class, 'add_user']);
Route::post('update_user/{id}', [UserController::class, 'update_user']);
