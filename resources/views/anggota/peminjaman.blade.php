@extends('layouts.user')

@section('content')
    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <h1 class="h3">Data Peminjaman</h1>
    </div>

    <div class="card">
        <div class="card-body">

            {{-- Tombol Tambah Data Baru di atas kotak search --}}
            <div class="mb-3 d-flex justify-content-end">
                <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary">Tambah Data Baru</a>
            </div>

            {{-- Kotak Search --}}
            <div class="mb-3 d-flex justify-content-end" style="max-width: 300px;">
                <form action="{{ route('user.peminjaman') }}" method="GET" class="d-flex w-100">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari data peminjam..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-nowrap">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Divisi</th>
                            <th>Penanggung Jawab</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_peminjam }}</td>
                                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->divisi }}</td>
                                <td>{{ $item->penanggungjawab }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('user.peminjaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('user.peminjaman.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {!! $peminjamans->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
