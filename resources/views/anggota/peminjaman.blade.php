@extends('layouts.user')

@section('content')
    <h3>Peminjaman</h3>
    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Input Peminjaman --}}
        
 @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <h1 class="h3">Data Inventaris</h1>
        <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Data Baru</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>jumlah</th>
                            <th>divisi</th>
                            <th>penanggungjawab</th>
                            <th>tanggal kpinjam</th>
                            <th>tanggal kembali</th>
                             <th>tanggal kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamans as $item)
                            <tr>
                                <td>{{ $item->id_peminjam }}</td>
                                <td>{{ $item->nama_peminjam }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->divisi}}</td>
                                <td>{{ $item->penanggungjawab }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->status }}</td>
                                
                                <td><label class="badge bg-danger">Pending</label></td>
                                <td>
                                    <a href="{{ route('user.peminjaman.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('user.peminjaman.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-3">
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> <!-- end card-body -->
    </div>
    </div>


@endsection
