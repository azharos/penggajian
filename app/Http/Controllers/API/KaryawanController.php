<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

// Departemen : Teknologi
// Jabatan : FrontEnd, BackEnd, UI UX

class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => Karyawan::get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "status"    => true,
            "data"      => Karyawan::find($id)
        ]);
    }

    public function store(Request $request)
    {
        Karyawan::create([
            "id_jabatan"        => $request->id_jabatan,
            "id_departemen"     => $request->id_departemen,
            "nama_lengkap"      => $request->nama_lengkap,
            "nik_ktp"           => $request->nik_ktp,
            "npwp"              => $request->npwp,
            "status_ptkp"       => $request->status_ptkp,
            "tanggal_bergabung" => $request->tanggal_bergabung,
            "gaji_pokok"        => $request->gaji_pokok,
            "nomor_rekening"    => $request->nomor_rekening,
            "nama_bank"         => $request->nama_bank,
            "status_kepegawaian" => $request->status_kepegawaian,
            "is_active"         => $request->is_active
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function update($id, Request $request)
    {
        Karyawan::find($id)->update([
            "id_jabatan"        => $request->id_jabatan,
            "id_departemen"     => $request->id_departemen,
            "nama_lengkap"      => $request->nama_lengkap,
            "nik_ktp"           => $request->nik_ktp,
            "npwp"              => $request->npwp,
            "status_ptkp"       => $request->status_ptkp,
            "tanggal_bergabung" => $request->tanggal_bergabung,
            "gaji_pokok"        => $request->gaji_pokok,
            "nomor_rekening"    => $request->nomor_rekening,
            "nama_bank"         => $request->nama_bank,
            "status_kepegawaian" => $request->status_kepegawaian,
            "is_active"         => $request->is_active
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }


    public function destroy($id)
    {
        Karyawan::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
