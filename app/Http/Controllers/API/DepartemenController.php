<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => Departemen::get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "status"    => true,
            "data"      => Departemen::find($id)
        ]);
    }

    public function store(Request $request)
    {
        // Proses Penambahan
        // $departemen         = new Departemen;
        // $departemen->nama   = $request->nama;
        // $departemen->save();

        $departemen = Departemen::create([
            'nama'          => $request->nama
        ]);

        // Departemen::create($request->all());

        return response()->json([
            "status"    => true,
            "data"      => $departemen
        ]);
    }

    public function update($id, Request $request)
    {
        // Proses Update
        $departemen         = Departemen::find($id);
        $departemen->nama   = $request->nama;
        $departemen->save();

        // $departemen = Departemen::find($id)->update([
        //     'nama'          => $request->nama
        // ]);

        return response()->json([
            "status"    => true,
            "data"      => $departemen
        ]);
    }

    public function destroy($id)
    {
        Departemen::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
