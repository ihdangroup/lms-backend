@extends('templates/page')
@section('title', 'Student Page')
@section('content')
<h4 class="text-secondary">Ini halaman Siswa</h4>
@if(session()->get('message'))
<div class="alert alert-{{session()->get('message')}}" role="alert">{{session()->get('alert')}}</div>
@endif
<a href="/student-create" class="badge bg-primary my-2">Add Student</a>
<a href="/student-deleted" class="badge bg-warning my-2">Softdelete Student</a>
<div class="my-3 col-12 col-sm-8 col-md-6">
    <form action="" method="get">
        <div class="input-group d-flex">
            <input type="text" name="keyword" class="form-control" placeholder="Search with keyword" autocomplete="off">
            <div>
                <button class="btn btn-primary input-group-text">Search</button>
            </div>
        </div>
    </form>
</div>
<table class="table">
    <thead class="bg-secondary text-white">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Nis</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1 ?>
        @foreach ($studentList as $data)
        @if($id % 2 == 0)
        <tr class="bg-light">
            @else
        <tr> @endif
            <td class="bg-light fw-bold">{{$id}}</td>
            <td>{{$data->name}}</td>
            @if($data->gender == 'P')
            <td>Perempuan</td>
            @else <td>Laki-Laki</td>
            @endif
            <td>{{$data->nis}}</td>
            <td>{{$data->class->name}}</td>
            <td>
                <a href="/student/{{$data->id}}" class="badge bg-primary">Detail</a>
                <a href="/student-edit/{{$data->id}}" class="badge bg-secondary">Edit</a>
                <button type="button" class=" border-0 badge bg-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Delete
                </button>
            </td>
        </tr>
        <?php $id++ ?>
        @endforeach
    </tbody>
</table>
<div class="my-5">
    {{$studentList->withQueryString()->links()}}
</div>
<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you Sure..?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="/student-delete/{{$data->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection