<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
       return Course::get();

    }
    public function show($id)
    {
        return Course::where('id', $id)->get();
    }
    public function chapter($id)
    {
        return Course::with('chapter')->find($id);
    }
    public function tambah(Request $request)
    {
        $total_chapter = intval($request->total_chapter);
        $tag = intval($request->tag);
        $new_course = new Course();
        $new_course->name = $request->name;
        $new_course->description = $request->description;
        $new_course->image = $request->image;
        $new_course->total_chapter = $total_chapter;
        $new_course->tag = $tag;
        $new_course->save();

        return response()->json(['message'=> 'success added new couse', 'new_course'=> $new_course], 200);
    }
    public function hapus($id)
    {
        $kursus = Course::findorFail($id);
        $kursus->delete();
        return response()->json(['message'=>'danger', 'alert'=>'Course is deleted!'], 200);
    }
}