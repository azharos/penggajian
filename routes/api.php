<?php

use App\Http\Controllers\API\DepartemenController;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\KomponenGajiController;
use App\Http\Controllers\API\PayrollRunController;
use App\Http\Controllers\API\SlipGajiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', function (Request $request) {
    $credentials = [
        'email'     => $request->email,
        'password'  => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('penggajian')->plainTextToken;

        return response()->json([
            "status"    => true,
            "data"      => [
                'user'  => $user,
                'token' => $token,
                "type"  => "Bearer"
            ]
        ]);
    }

    return response()->json([
        "status"    => false,
        "data"      => []
    ]);
})->name('login');

Route::post('register', function (Request $request) {

    // Logic Add
    $user = User::create([
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => Hash::make($request->password),
    ]);

    return response()->json([
        "status"    => true,
        'data'      => $user
    ]);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::resource('departemen', DepartemenController::class);
    Route::resource('jabatan', JabatanController::class);

    Route::post('logout', function (Request $request) {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            "status"    => true,
        ]);
    });
});

Route::resource('karyawan', KaryawanController::class);
Route::resource('komponen-gaji', KomponenGajiController::class);
Route::resource('payroll-run', PayrollRunController::class);
Route::resource('slip-gaji', SlipGajiController::class);
