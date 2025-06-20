@extends('layouts.user')

@section('content')
    <div class="container mt-2">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3">Data Karyawan</h1>
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Data Baru</a>
        </div>

        {{-- Form pencarian --}}
        <form action="{{ route('karyawan') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari data karyawan..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
                @if(request('search'))
                    <a href="{{ route('karyawan') }}" class="btn btn-outline-danger">Reset</a>
                @endif
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th> {{-- Kolom baru --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $index => $item)
                    <tr>
                        {{-- Nomor urut sesuai halaman --}}
                        <td>{{ $karyawan->firstItem() + $index }}</td>
                        <td>{{ $item->id_karyawan }}</td>
                        <td>{{ $item->nama_karyawan }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->divisi }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $item->id_karyawan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('karyawan.destroy', $item->id_karyawan) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Data karyawan tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-3">
            {{ $karyawan->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
