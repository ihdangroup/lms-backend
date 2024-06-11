<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get();
       return view('teacher', ['teacherList'=> $teachers]);
    }
    public function show($id)
    {
        $teachers = Teacher::with('class')->findOrFail($id);
       return view('teacher-detil', ['teacherList'=> $teachers]);
    }
}