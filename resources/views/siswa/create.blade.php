@extends('dashboard.welcome')
@section('title', 'Tambah Siswa')

@section('content')
<div class="card">
    <h2>Tambah Siswa</h2>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        @include('siswa._form')

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection