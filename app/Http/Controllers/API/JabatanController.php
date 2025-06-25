<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function store(Request $request)
    {
        // Proses Penambahan
        // $departemen         = new Jabatan;
        // $departemen->nama   = $request->nama;
        // $departemen->save();

        $departemen = Jabatan::create([
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
        $departemen         = Jabatan::find($id);
        $departemen->nama   = $request->nama;
        $departemen->save();

        // $departemen = Jabatan::find($id)->update([
        //     'nama'          => $request->nama
        // ]);

        return response()->json([
            "status"    => true,
            "data"      => $departemen
        ]);
    }

    public function destroy($id)
    {
        Jabatan::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
