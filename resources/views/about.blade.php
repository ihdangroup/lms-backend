@extends('templates/page')
@section('title', 'About')
@section('content')
<div class="mt-4">
    <span class="badge bg-primary">Ini halaman about</span>
    <span class="badge bg-warning">{{ $name }}</span>
    <span class="badge bg-secondary">{{ $profesi }}</span>
</div>
@endsection