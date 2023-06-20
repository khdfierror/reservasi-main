<?php

use App\Http\Resources\MobilResource;
use App\Models\Service\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mobil', function() {
    $mobil = Mobil::orderBy('no_rangka')->get();

    return MobilResource::collection($mobil);
});


