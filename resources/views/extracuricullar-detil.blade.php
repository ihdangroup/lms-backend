@extends('templates/page')
@section('title', 'Extracuricullar | Detil')
@section('content')
<div class="mt-4">
    <div class="badge bg-primary">{{$ekskulList->name}}</div>
    <h4 class="text-secondary mt-2">List Students</h4>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($ekskulList->student as $student)
                <li class="list-group-item">{{$student->name}}</li>
                @endforeach
            </ul>
            <a href="/extracuricullar" class="badge bg-warning mt-2">Back</a>
        </div>
    </div>
</div>
@endsection