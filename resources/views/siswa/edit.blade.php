@extends('dashboard.welcome')
@section('title', 'Edit Siswa')

@section('content')
<div class="card">
    <h2>Edit Siswa</h2>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('siswa._form')

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection