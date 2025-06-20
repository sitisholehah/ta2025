@extends('layouts.welcome')

@section('content')
    <div class="container mt-4">
        <h3>Edit Data Peminjaman</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_peminjam" class="form-label">Nama Peminjam</label>
                <select name="id_peminjam" id="id_peminjam" class="form-control" required>
                    <option value="">-- Pilih Nama Peminjam --</option>
                    @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->id_karyawan }}"
                            {{ old('id_peminjam', $peminjaman->id_peminjam) == $karyawan->id_karyawan ? 'selected' : '' }}>
                            {{ $karyawan->nama_karyawan }}
                        </option>
                    @endforeach
                </select>
                @error('id_peminjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Barang</label>
                <select name="kode_barang" id="kode_barang" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($inventaris as $barang)
                        <option value="{{ $barang->kode_barang }}"
                            {{ old('kode_barang', $peminjaman->kode_barang) == $barang->kode_barang ? 'selected' : '' }}>
                            {{ $barang->nama_barang }}
                        </option>
                    @endforeach
                </select>
                @error('kode_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                       value="{{ old('jumlah', $peminjaman->jumlah) }}" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <input type="text" name="divisi" id="divisi" class="form-control"
                       value="{{ old('divisi', $peminjaman->divisi) }}" required>
                @error('divisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="penanggungjawab" class="form-label">Penanggung Jawab</label>
                <input type="text" name="penanggungjawab" id="penanggungjawab" class="form-control"
                       value="{{ old('penanggungjawab', $peminjaman->penanggungjawab) }}" required>
                @error('penanggungjawab')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                       value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" required>
                @error('tanggal_pinjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
                       value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" required>
                @error('tanggal_kembali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $peminjaman->keterangan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Dipinjam" {{ old('status', $peminjaman->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ old('status', $peminjaman->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
