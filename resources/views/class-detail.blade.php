@extends('templates/page')
@section('title', 'Dashboard')
@section('content')
<div class="mt-4">
    <div class="badge bg-primary">{{$classList->name}}</div>
    <div class="badge bg-primary">{{$classList->teacher->nama}}</div>
    <h4 class="text-secondary mt-2">List Students</h4>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($classList->student as $student)
                <li class="list-group-item">{{$student->name}}</li>
                @endforeach
            </ul>
            <a href="/class" class="badge bg-warning mt-2">Back</a>
        </div>
    </div>
</div>
@endsection