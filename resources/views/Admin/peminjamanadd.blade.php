@extends('layouts.welcome')

@section('content')
    <h3>Tambah Peminjaman</h3>
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_peminjam" class="form-label">Nama Peminjam</label>
                <select name="id_peminjam" id="id_peminjam" class="form-control" required>
                    <option value="">-- Pilih Nama Peminjam --</option>
                    @foreach ($karyawans as $item)
                        <option value="{{ $item->id_karyawan }}" {{ old('id_peminjam') == $item->id_karyawan ? 'selected' : '' }}>
                            {{ $item->nama_karyawan }}
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
                        <option value="{{ $barang->kode_barang }}" {{ old('kode_barang') == $barang->kode_barang ? 'selected' : '' }}>
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
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <input type="text" name="divisi" id="divisi" class="form-control" value="{{ old('divisi') }}" required>
                @error('divisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="penanggungjawab" class="form-label">Penanggungjawab</label>
                <input type="text" name="penanggungjawab" id="penanggungjawab" class="form-control" value="{{ old('penanggungjawab') }}" required>
                @error('penanggungjawab')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam') }}" required>
                @error('tanggal_pinjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali') }}" required>
                @error('tanggal_kembali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ old('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
