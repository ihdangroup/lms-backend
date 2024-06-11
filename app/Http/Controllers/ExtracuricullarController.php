<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracuriccullar;

class ExtracuricullarController extends Controller
{
    public function index()
    {
        $ekskul = Extracuriccullar::get();
        return view('extracuricullar', ['ekskulList' => $ekskul]);
    }
    public function show($id)
    {
        $ekskul = Extracuriccullar::with('student')->find($id);
        return view('extracuricullar-detil', ['ekskulList' => $ekskul]);
    }
}