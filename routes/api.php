<?php

use App\Http\Controllers\API\DepartemenController;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\KomponenGajiController;
use App\Http\Controllers\API\PayrollRunController;
use App\Http\Controllers\API\SlipGajiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('login', function (Request $request) {
    $credentials = [
        'email'     => $request->email,
        'password'  => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('penggajian')->plainTextToken;

        return response()->json([
            "status"    => false,
            "data"      => [
                'user'  => $user,
                'token' => $token
            ]
        ]);
    }

    return response()->json([
        "status"    => false,
        "data"      => []
    ]);
});

Route::resource('departemen', DepartemenController::class);
Route::resource('jabatan', JabatanController::class);

Route::resource('karyawan', KaryawanController::class);
Route::resource('komponen-gaji', KomponenGajiController::class);
Route::resource('payroll-run', PayrollRunController::class);
Route::resource('slip-gaji', SlipGajiController::class);
