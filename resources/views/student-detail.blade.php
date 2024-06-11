@extends('templates/page')
@section('title', 'About')
@section('content')
<div class="mt-4">
    <div class="row">
        <div class="col-md-4 text-center">
            <span class="badge bg-primary mb-2">Detil page</span>
            <div class="card border border-none ">
                <div class="card-image p-3 d-flex justify-content-center">
                    @if($student->image != '')
                    <img src="{{asset('storage/photo/'.$student->image)}}" width="100" class="rounded-circle"
                        height="100" alt="">
                    @else
                    <img src="{{asset('images/person.png')}}" width="100" class="rounded-circle" height="100" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="text-secondary">{{$student->name}}</h4>
                    <p>{{$student->class->name}}</p>
                    <p class="fw-bold">{{$student->class->teacher->nama}}</p>
                    <div class="button">
                        <span class="badge bg-warning">{{$student->nis}}</span>
                        <a href="/student" class="badge bg-success">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-secondary">List Extracuricullar</h4>
            <div class="card">
                <ul class="list-group">
                    @foreach($student->extracuriccullar as $extra)
                    <li class="list-group-item">{{$extra->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection