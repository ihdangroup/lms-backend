@extends('templates/page')
@section('title', 'Extracuricullar')
@section('content')
<span class="badge bg-secondary mt-4 mb-2">Extracuricullar</span>
<h4 class=" text-secondary">Extracuricullar List</h4>
<div class="row">
    <div class="col-md-6">
        <table class="table mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($semua_kursus as $kursus)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kursus->name}}</td>
                    <td>
                        <a href="/kursus/{{$kursus->id}}" class="badge bg-primary">Detil</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection