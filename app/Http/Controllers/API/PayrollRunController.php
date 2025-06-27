<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PayrollRun;
use Illuminate\Http\Request;

// Show, Update, Delete

class PayrollRunController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => PayrollRun::get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "status"    => true,
            "data"      => PayrollRun::find($id)
        ]);
    }

    public function store(Request $request)
    {
        PayrollRun::create([
            "periode_gaji"          => $request->periode_gaji,
            "tanggal_eksekusi"      => $request->tanggal_eksekusi,
            "status"                => $request->status,
            "dieksekusi_oleh"       => $request->dieksekusi_oleh,
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function update(Request $request, $id)
    {
        PayrollRun::find($id)->update([
            "periode_gaji"          => $request->periode_gaji,
            "tanggal_eksekusi"      => $request->tanggal_eksekusi,
            "status"                => $request->status,
            "dieksekusi_oleh"       => $request->dieksekusi_oleh
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function destroy($id)
    {
        PayrollRun::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
