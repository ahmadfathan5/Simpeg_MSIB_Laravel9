<?php

namespace App\Http\Controllers;

use App\Models\Gaji;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::all();
        return view('gaji.index', compact('gaji'));
    }
}
