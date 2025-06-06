<!-- resources/views/anggota/form.blade.php -->
@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $anggota->nama_lengkap ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin', $anggota->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $anggota->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div>
        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $anggota->asal_sekolah ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $anggota->email ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
</div>
