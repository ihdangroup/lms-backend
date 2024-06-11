@extends('templates/page')
@section('title', 'Classroom')
@section('content')
<span class="badge bg-secondary mt-4 mb-2">Classroom</span>
<h4 class="text-secondary">Ini halaman Classroom</h4>
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
                @foreach($classList as $class)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$class->name}}</td>
                    <td>
                        <a href="/class/{{$class->id}}" class="badge bg-secondary">Detil</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection