@extends('templates/page')
@section('title', 'Dashboard')
@section('content')
<div class="mt-4">
    <p class="badge bg-primary">Restore Page</p>
    <a href="/student" class="badge bg-secondary">Back</a>
    <div class="col-md-6">
        <ul class="list-group">
            @foreach($students as $student)
            <li class="list-group-item d-flex justify-content-between w-100">
                <span>{{$student->name}}</span>
                <a href="/student-destroy/{{$student->id}}" class="badge bg-primary">Restore</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection