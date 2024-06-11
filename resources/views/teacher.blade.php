@extends('templates/page')
@section('title', 'Teacher')
@section('content')
<span class="badge bg-secondary mt-4 mb-2">Teacher</span>
<h4 class="text-secondary">Ini halaman Teachers</h4>
<div class="row">
    <div class="col-md-6">
        <table class="table mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacherList as $teacher)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$teacher->nama}}</td>
                    <td>
                        <a href="/teacher/{{$teacher->id}}" class="badge bg-primary">Detil</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection