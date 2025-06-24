<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }

    public function store()
    {
        return response()->json([
            "status"    => true,
            "data"      => []
        ]);
    }
}
