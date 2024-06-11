@extends('templates/page')
@section('title', 'Create student')
@section('content')
<div class="mt-4">
    <div class="row flex  justify-content-center">
        <div class="col-md-6">
            <p class="badge bg-primary">Create New Student</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/student-in" class="form card p-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required autocomplete="off">
                </div>
                <div class="form-group my-2">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select one</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-Laki</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" class="form-control" name="nis" id="nis" required autocomplete="off">
                </div>
                <div class="form-group my-2">
                    <label for="class_id" class="form-label">Class</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="">Select one</option>
                        @foreach($class as $clas)
                        <option value="{{$clas->id}}">{{$clas->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="photo" class="form-label">Photo</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Add Student</button>
                    <a type="submit" href="/student" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection