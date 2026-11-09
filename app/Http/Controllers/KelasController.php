<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas'   => 'required|max:20|unique:kelas,kode_kelas',
            'nama_kelas'   => 'required|max:50',
            'tingkat'      => 'required|max:20',
            'tahun_ajaran' => 'required|max:20',
            'wali_kelas'   => 'nullable|max:100',
        ]);

        DB::table('kelas')->insert([
            'kode_kelas'   => $request->kode_kelas,
            'nama_kelas'   => $request->nama_kelas,
            'tingkat'      => $request->tingkat,
            'tahun_ajaran' => $request->tahun_ajaran,
            'wali_kelas'   => $request->wali_kelas,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->first();

        if (!$kelas) {
            abort(404);
        }

        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kelas'   => 'required|max:20|unique:kelas,kode_kelas,' . $id,
            'nama_kelas'   => 'required|max:50',
            'tingkat'      => 'required|max:20',
            'tahun_ajaran' => 'required|max:20',
            'wali_kelas'   => 'nullable|max:100',
        ]);

        DB::table('kelas')->where('id', $id)->update([
            'kode_kelas'   => $request->kode_kelas,
            'nama_kelas'   => $request->nama_kelas,
            'tingkat'      => $request->tingkat,
            'tahun_ajaran' => $request->tahun_ajaran,
            'wali_kelas'   => $request->wali_kelas,
            'updated_at'   => now(),
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $masihAdaSiswa = DB::table('siswas')->where('kelas_id', $id)->exists();

        if ($masihAdaSiswa) {
            return redirect()->route('kelas.index')
                ->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        DB::table('kelas')->where('id', $id)->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
