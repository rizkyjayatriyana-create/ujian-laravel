@extends('dashboard.welcome')
@section('title', 'Tambah Kelas')

@section('content')
<div class="card">
    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Kode Kelas</label>
            <input type="text" name="kode_kelas" value="{{ old('kode_kelas') }}">
            @error('kode_kelas') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}" placeholder="Contoh: X RPL 1">
            @error('nama_kelas') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tingkat</label>
            <input type="text" name="tingkat" value="{{ old('tingkat') }}" placeholder="Contoh: X, XI, XII">
            @error('tingkat') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" placeholder="Contoh: 2026/2027">
            @error('tahun_ajaran') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Wali Kelas (boleh kosong)</label>
            <input type="text" name="wali_kelas" value="{{ old('wali_kelas') }}">
            @error('wali_kelas') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection