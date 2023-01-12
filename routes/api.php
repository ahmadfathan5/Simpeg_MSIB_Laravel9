<?php

use App\Http\Controllers\Api\PegawaiController;
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

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/{id}', [PegawaiController::class, 'show']);
Route::post('/pegawai-create', [PegawaiController::class, 'store']);
