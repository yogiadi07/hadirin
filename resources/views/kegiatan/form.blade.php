@csrf
<div class="space-y-4">
    <div>
        <label>Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div>
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="w-full border px-3 py-2 rounded">{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}</textarea>
    </div>
</div>
