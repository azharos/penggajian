<?php

use App\Http\Controllers\API\DepartemenController;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\API\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('karyawan', function () {
//     return response()->json([
//         "status"    => true,
//         "data"      => []
//     ]);
// });

Route::resource('departemen', DepartemenController::class);
Route::resource('jabatan', JabatanController::class);

Route::resource('karyawan', KaryawanController::class);
