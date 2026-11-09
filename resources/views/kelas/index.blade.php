@extends('dashboard.welcome')
@section('title', 'Data Kelas')

@section('content')
<div class="card">
    <div class="top-bar">
        <h2>Data Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">+ Tambah Kelas</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
                <th>Tahun Ajaran</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->kode_kelas }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->tingkat }}</td>
                    <td>{{ $k->tahun_ajaran }}</td>
                    <td>{{ $k->wali_kelas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Belum ada data kelas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection