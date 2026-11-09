@extends('dashboard.welcome')
@section('title', 'Data Siswa')

@section('content')
<div class="card">
    <div class="top-bar">
        <h2>Data Siswa</h2>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>L/P</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama_lengkap }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->nama_kelas }}</td>
                    <td>{{ $s->jurusan }}</td>
                    <td>{{ $s->status }}</td>
                    <td>
                        <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Belum ada data siswa.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection