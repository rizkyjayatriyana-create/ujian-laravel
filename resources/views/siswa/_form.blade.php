<div class="grid-2">
    <div class="form-group">
        <label>Kelas</label>
        <select name="kelas_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}"
                    {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})
                </option>
            @endforeach
        </select>
        @error('kelas_id') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" value="{{ old('nis', $siswa->nis ?? '') }}">
        @error('nis') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap ?? '') }}">
        @error('nama_lengkap') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Tempat Lahir (boleh kosong)</label>
        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}">
        @error('tempat_lahir') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Tanggal Lahir (boleh kosong)</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}">
        @error('tanggal_lahir') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>No. HP (boleh kosong)</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $siswa->no_hp ?? '') }}">
        @error('no_hp') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Email (boleh kosong)</label>
        <input type="text" name="email" value="{{ old('email', $siswa->email ?? '') }}">
        @error('email') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $siswa->asal_sekolah ?? '') }}">
        @error('asal_sekolah') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Jurusan</label>
        <input type="text" name="jurusan" value="{{ old('jurusan', $siswa->jurusan ?? '') }}">
        @error('jurusan') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Nama Ayah (boleh kosong)</label>
        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}">
        @error('nama_ayah') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Nama Ibu (boleh kosong)</label>
        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}">
        @error('nama_ibu') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>No. HP Orang Tua/Wali</label>
        <input type="text" name="no_hp_wali" value="{{ old('no_hp_wali', $siswa->no_hp_wali ?? '') }}">
        @error('no_hp_wali') <div class="error-text">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="Aktif" {{ old('status', $siswa->status ?? 'Aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="Nonaktif" {{ old('status', $siswa->status ?? 'Aktif') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status') <div class="error-text">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-group">
    <label>Alamat (boleh kosong)</label>
    <textarea name="alamat" rows="3">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
    @error('alamat') <div class="error-text">{{ $message }}</div> @enderror
</div>