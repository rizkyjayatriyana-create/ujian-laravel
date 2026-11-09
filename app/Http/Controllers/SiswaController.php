<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private function aturanValidasi($id = null)
    {
        return [
            'kelas_id'      => 'required|exists:kelas,id',
            'nis'           => 'required|max:20|unique:siswas,nis' . ($id ? ',' . $id : ''),
            'nama_lengkap'  => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'nullable|max:100',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable',
            'no_hp'         => 'nullable|max:20',
            'email'         => 'nullable|email|max:255',
            'asal_sekolah'  => 'required|max:150',
            'jurusan'       => 'required|max:100',
            'nama_ayah'     => 'nullable|max:100',
            'nama_ibu'      => 'nullable|max:100',
            'no_hp_wali'    => 'required|max:20',
            'status'        => 'required|in:Aktif,Nonaktif',
        ];
    }

    public function index()
    {
        $siswas = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas')
            ->orderBy('siswas.nama_lengkap')
            ->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturanValidasi());

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('siswas')->insert($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas', 'kelas.kode_kelas')
            ->where('siswas.id', $id)
            ->first();

        if (!$siswa) {
            abort(404);
        }

        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = DB::table('siswas')->where('id', $id)->first();

        if (!$siswa) {
            abort(404);
        }

        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->aturanValidasi($id));

        $data['updated_at'] = now();

        DB::table('siswas')->where('id', $id)->update($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('siswas')->where('id', $id)->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}