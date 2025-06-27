<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SlipGaji;
use Illuminate\Http\Request;

class SlipGajiController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => SlipGaji::with('karyawan', 'payroll')->get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "status"    => true,
            "data"      => SlipGaji::with('karyawan', 'payroll')->find($id)
        ]);
    }

    public function store(Request $request)
    {
        // Penghasilan Bruto
        $penghasilan_bruto = $request->gaji_pokok + $request->total_tunjangan;

        // Penghasilan Total Potongan
        $penghasilan_total_potongan = $request->total_potongan + $request->pph21_terpotong + $request->total_iuran_bpjs_karyawan;

        // Penghasilan Bersih
        $penghasilan_bersih = $penghasilan_bruto - $penghasilan_total_potongan;

        SlipGaji::create([
            'id_payroll_run'      => $request->id_payroll_run,
            'id_karyawan'         => $request->id_karyawan,
            "gaji_pokok"          => $request->gaji_pokok,
            "total_tunjangan"     => $request->total_tunjangan,
            "total_potongan"      => $request->total_potongan,
            "penghasilan_bruto"   => $penghasilan_bruto,
            "pph21_terpotong"     => $request->pph21_terpotong,
            "total_iuran_bpjs_karyawan" => $request->total_iuran_bpjs_karyawan,
            'thp'                   => $penghasilan_bersih
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function update(Request $request, $id)
    {
        // Penghasilan Bruto
        $penghasilan_bruto = $request->gaji_pokok + $request->total_tunjangan;

        // Penghasilan Total Potongan
        $penghasilan_total_potongan = $request->total_potongan + $request->pph21_terpotong + $request->total_iuran_bpjs_karyawan;

        // Penghasilan Bersih
        $penghasilan_bersih = $penghasilan_bruto - $penghasilan_total_potongan;

        SlipGaji::find($id)->update([
            'id_payroll_run'      => $request->id_payroll_run,
            'id_karyawan'         => $request->id_karyawan,
            "gaji_pokok"          => $request->gaji_pokok,
            "total_tunjangan"     => $request->total_tunjangan,
            "total_potongan"      => $request->total_potongan,
            "penghasilan_bruto"   => $penghasilan_bruto,
            "pph21_terpotong"     => $request->pph21_terpotong,
            "total_iuran_bpjs_karyawan" => $request->total_iuran_bpjs_karyawan,
            'thp'                   => $penghasilan_bersih
        ]);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function destroy($id)
    {
        SlipGaji::destroy($id);

        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
