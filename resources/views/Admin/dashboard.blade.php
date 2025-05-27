@extends('layouts.welcome')

@section('content')
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="font-weight-bold">Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <!-- Card Statistik Jumlah Peminjaman -->
            <div class="col-sm-3 grid-margin">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Jumlah Peminjaman</h5>
                        <div class="row">
                            <div class="col-8 my-auto">
                                <h2 class="mb-0">5</h2>
                            </div>
                            <div class="col-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-book text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Statistik Jumlah Pengembalian -->
            <div class="col-sm-3 grid-margin">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Jumlah Pengembalian</h5>
                        <div class="row">
                            <div class="col-8 my-auto">
                                <h2 class="mb-0">2</h2>
                            </div>
                            <div class="col-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-backup-restore text-danger ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Statistik Jumlah User -->
            <div class="col-sm-3 grid-margin">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Jumlah User</h5>
                        <div class="row">
                            <div class="col-8 my-auto">
                                <h2 class="mb-0">5</h2>
                            </div>
                            <div class="col-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-account-multiple text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Statistik Jumlah Karyawan -->
            <div class="col-sm-3 grid-margin">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Jumlah Karyawan</h5>
                        <div class="row">
                            <div class="col-8 my-auto">
                                <h2 class="mb-0">8</h2> <!-- Ganti 8 dengan jumlah karyawan sebenarnya -->
                            </div>
                            <div class="col-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-account-box-outline text-info ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Peminjaman -->
    
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
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
                            <th>tanggal pinjam</th>
                            <th>tanggal kembali</th>
                            <th>keterangan</th>
                            <th>status</th>
                            <th>aksi</th>
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
            </div>
        </div>
    </div>
@endsection
