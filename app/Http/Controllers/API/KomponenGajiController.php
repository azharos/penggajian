<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;

// Komponen Gaji
// THR, Tunjangan, Tidak Tetap, 0, 0
// Transportasi, Tunjangan, Tetap, 0, 0
// Koperasi, Potongan, Tetap, 0, 0

class KomponenGajiController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => KomponenGaji::get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "status"    => true,
            "data"      => KomponenGaji::find($id)
        ]);
    }

    public function store(Request $request)
    {
        KomponenGaji::create([
            "nama_komponen"     => $request->nama_komponen,
            "tipe"              => $request->tipe,
            "sifat"             => $request->sifat,
            "is_taxable"        => $request->is_taxable,
            "is_bpjs_base"      => $request->is_bpjs_base,
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function update(Request $request, $id)
    {
        KomponenGaji::find($id)->update([
            "nama_komponen"     => $request->nama_komponen,
            "tipe"              => $request->tipe,
            "sifat"             => $request->sifat,
            "is_taxable"        => $request->is_taxable,
            "is_bpjs_base"      => $request->is_bpjs_base,
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function destroy($id)
    {
        KomponenGaji::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
