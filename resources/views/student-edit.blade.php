@extends('templates/page')
@section('title', 'Edit student')
@section('content')
<div class="mt-4">
    <div class="row flex justify-content-center">
        <div class="col-md-6">
            <p class="badge bg-primary">Edit Student</p>
            <form action="/student/{{$student->id}}" class="form card p-4" method="post">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" required>
                </div>
                <div class="form-group my-2">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="{{$student->gender}}">
                            @if($student->gender == 'P') Perempuan @else Laki-Laki @endif
                        </option>
                        <option value="@if($student->gender == 'P') L @else P @endif"> @if($student->gender == 'P')
                            Laki-Laki @else Perempuan @endif</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" class="form-control" name="nis" id="nis" required value="{{$student->nis}}">
                </div>
                <div class="form-group my-2">
                    <label for="class_id" class="form-label">Class</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="{{$student->class_id}}">{{$student->class->name}}</option>
                        @foreach($class as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Add Student</button>
                    <a href="/student" type="submit" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection