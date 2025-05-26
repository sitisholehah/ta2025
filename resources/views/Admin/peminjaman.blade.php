@extends('layouts.welcome')

@section('content')
    <h3>Peminjaman</h3>
    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Input Peminjaman --}}
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_peminjam" class="form-label">ID Peminjam</label>
                <select name="id_peminjam" id="id_peminjam" class="form-control" required>
                    <option value="">-- Pilih Peminjam --</option>
                    @foreach ($peminjams as $peminjam)
                        <option value="{{ $peminjam->id }}">{{ $peminjam->nama }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <input type="text" name="divisi" id="divisi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="divisi" class="form-label">Penanggungjawab</label>
                <input type="text" name="divisi" id="divisi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-flex me-3">
                <button type="submit" class="btn btn-success mr-2">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
            </div>

        </form>
    </div>
@endsection
