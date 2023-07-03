<?php

use App\Http\Resources\Service\MobilResource;
use App\Http\Resources\Service\KilometerResource;
use App\Http\Resources\Service\ReservasiResource;
use App\Http\Resources\System\MerekResource;
use App\Http\Resources\System\BrandResource;
use App\Http\Resources\System\TipeResource;
use App\Http\Resources\System\TahunproduksiResource;
use App\Http\Resources\System\WarnaResource;
use App\Http\Resources\UserResource;
use App\Models\Service\Mobil;
use App\Models\Service\Kilometer;
use App\Models\Service\Reservasi;
use App\Models\System\Merek;
use App\Models\System\Brand;
use App\Models\System\Tipe;
use App\Models\System\Tahunproduksi;
use App\Models\System\Warna;
use App\Models\User;
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

Route::get('kilometer', function() {
    $kilometer = Kilometer::orderBy('nama')->get(); 

    return KilometerResource::collection($kilometer);
});

Route::get('reservasi', function() {
    $reservasi = Reservasi::orderBy('mobil_id')->get();

    return ReservasiResource::collection($reservasi);
    
});

Route::get('merek', function() {
    $merek = Merek::orderBy('nama')->get();

    return MerekResource::collection($merek);
});

Route::get('brand', function() {
    $brand = Brand::orderBy('nama')->get();

    return BrandResource::collection($brand);

});

Route::get('tipe', function() {
    $tipe = Tipe::orderBy('nama')->get();

    return TipeResource::collection($tipe);
    
});

Route::get('tahunproduksi', function() {
    $tahunproduksi = Tahunproduksi::orderBy('nama')->get();

    return TahunproduksiResource::collection($tahunproduksi);
});

Route::get('warna', function() {
    $warna = Warna::orderBy('nama')->get();

    return WarnaResource::collection($warna);
});

Route::get('user', function() {
    $user = User::orderBy('name')->get();

    return UserResource::collection($user);
});