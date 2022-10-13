<?php

use App\Http\Controllers\KampusController;
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

Route::get('kampus', [KampusController::class, 'index']);
Route::post('kampus/store', [KampusController::class, 'store']);
Route::get('kampus/search/{keyword}', [KampusController::class, 'searchByNama']);
Route::get('kampus/show/{followed}', [KampusController::class, 'show']);
