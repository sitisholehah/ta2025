@extends('layouts.welcome')

@section('content')
    <div class="container mt-2">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <h1 class="h3">Data Karyawan</h1>
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Data Baru</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th> {{-- Kolom baru --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $item)
                    <tr>
                        <td>{{ $item->id_karyawan }}</td>
                        <td>{{ $item->nama_karyawan }}</td>
                        <td>{{ $item->jabatan }}</td>
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
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
