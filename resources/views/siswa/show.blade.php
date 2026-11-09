@extends('dashboard.welcome')
@section('title', 'Detail Siswa')

@section('content')
<div class="card">
    <h2>Detail Siswa</h2>

    <table>
        <tr><th width="220">Kelas</th><td>{{ $siswa->nama_kelas }} ({{ $siswa->kode_kelas }})</td></tr>
        <tr><th>NIS</th><td>{{ $siswa->nis }}</td></tr>
        <tr><th>Nama Lengkap</th><td>{{ $siswa->nama_lengkap }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
        <tr><th>Tempat Lahir</th><td>{{ $siswa->tempat_lahir ?? '-' }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $siswa->tanggal_lahir ?? '-' }}</td></tr>
        <tr><th>Alamat</th><td>{{ $siswa->alamat ?? '-' }}</td></tr>
        <tr><th>No. HP</th><td>{{ $siswa->no_hp ?? '-' }}</td></tr>
        <tr><th>Email</th><td>{{ $siswa->email ?? '-' }}</td></tr>
        <tr><th>Asal Sekolah</th><td>{{ $siswa->asal_sekolah }}</td></tr>
        <tr><th>Jurusan</th><td>{{ $siswa->jurusan }}</td></tr>
        <tr><th>Nama Ayah</th><td>{{ $siswa->nama_ayah ?? '-' }}</td></tr>
        <tr><th>Nama Ibu</th><td>{{ $siswa->nama_ibu ?? '-' }}</td></tr>
        <tr><th>No. HP Orang Tua/Wali</th><td>{{ $siswa->no_hp_wali }}</td></tr>
        <tr><th>Status</th><td>{{ $siswa->status }}</td></tr>
    </table>

    <br>
    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection