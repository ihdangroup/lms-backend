<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentCreateRequest;
use App\Models\ClassRoom;


class StudentController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        $students = Student::with('class')->where('name', 'LIKE', '%'.$keyword.'%')->orWhere('nis', 'LIKE', '%'.$keyword.'%')->orWhereHas('class', function($query) use($keyword) {
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })->paginate(10);
        return view('student', ['studentList' => $students]);
    }
    public function show($id)
    {
        $student = Student::with(['class.teacher', 'extracuriccullar'])->findorFail($id);
        return view('student-detail', ['student'=> $student]);
    }
    public function edit($id)
    {
        $student = Student::with('class')->findorFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student'=> $student, 'class'=> $class]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::findorFail($id);
        $student->update($request->all());
        return redirect('/student');
    }
    public function delete($id)
    {
        $student = Student::findorFail($id);
        $student->delete();
        return redirect('/student')->with(['message'=>'danger', 'alert'=>'Student is deleted!']);
    }
    public function deleted()
    {
        $student = Student::onlyTrashed()->get();
        return view('student-restore', ['students'=> $student]);
    }
    public function destroy($id)
    {
        $student = Student::withTrashed()->where('id', $id)->restore();
        return redirect('/student');
    }
    public function create()
    {
        $class = ClassRoom::get();
        return view('student-add', ['class'=> $class]);
    }
    public function store(StudentCreateRequest $request)
    {
        $newName = '';
        if ($request->file('photo')) {
            $ekstension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'. now()->timestamp.'.'.$ekstension;
             $request->file('photo')->storeAs('images', $newName);
        }
        $request['image'] = $newName;
        $student = Student::create($request->all());
        return redirect('/student')->with(['message'=>'success', 'alert'=>'Success to Add Student!']);
    }
}