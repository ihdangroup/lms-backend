<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
class ClassController extends Controller
{
    public function index() {
        $class = ClassRoom::get();
        return view('classroom', ['classList' => $class]);
    }
    public function show($id) {
        $class = ClassRoom::with(['student', 'teacher'])->findOrFail($id);
        return view('class-detail', ['classList' => $class]);
    }
}