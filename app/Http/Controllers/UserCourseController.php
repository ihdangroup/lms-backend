<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\User_Enroll_Course;
// use Illuminate\Support\Facades\Validator;

class UserCourseController extends Controller
{
    public function index($userId, $courseId) {
       return User_Enroll_Course::where('user_id', $userId)->where('course_id', $courseId)->get();
    }

    public function students($id) {
        $students_course = User_Enroll_Course::with('student')->where('course_id', $id)
        ->get();
        return response()->json($students_course, 200);
    }
    public function user($id) {
        $students_course = User_Enroll_Course::with('course')->where('user_id', $id)
        ->get();
        return response()->json($students_course, 200);
    }

    public function add(Request $request)
    {
        $user_course = new User_Enroll_Course();
        $user_course->user_id = $request->user_id;
        $user_course->course_id = $request->course_id;
        $user_course->completed_video = $request->completed_video;
        $user_course->save();

        return response()->json(['user_id' => $request->user_id, 'course_id' => $request->course_id, 'completed_video' => $request->completed_video], 200);
    }


}