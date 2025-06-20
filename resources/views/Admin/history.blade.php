@extends('layouts.welcome')

@section('content')
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="font-weight-bold">Dashboard</h2>
            </div>
        </div>

        <div class="row">
            <!-- Statistik Cards -->
            <div class="col-sm-4 grid-margin">
                <div class="card bg-primary text-white h-100 d-flex align-items-center">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Jumlah Peminjaman</h5>
                            <h2 class="d-inline-block mb-0">{{ $jumlahPeminjaman }}</h2>
                        </div>
                        <i class="mdi mdi-book icon-lg ms-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card bg-info text-white h-100 d-flex align-items-center">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Jumlah Karyawan</h5>
                            <h2 class="d-inline-block mb-0">{{ $jumlahKaryawan }}</h2>
                        </div>
                        <i class="mdi mdi-account-box-outline icon-lg ms-4"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card bg-success text-white h-100 d-flex align-items-center">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Jumlah User</h5>
                            <h2 class="d-inline-block mb-0">{{ $jumlahUser }}</h2>
                        </div>
                        <i class="mdi mdi-account-multiple icon-lg ms-4"></i>
                    </div>
                </div>
            </div>
        </div>


        {{-- Tabel History Peminjaman --}}
        <div class="card mb-4 mt-4">
            <div class="card-header bg-dark text-white">
                <strong>History Peminjaman</strong>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>ID Peminjam</th>
                            <th>Kode Barang</th>
                            <th>Status Lama</th>
                            <th>Status Baru</th>
                            <th>Waktu Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_barang ?? '-' }}</td>
                                <td>{{ $item->id_peminjaman }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->status_lama ?? '-' }}</td>
                                <td>{{ $item->status_baru }}</td>
                                <td>{{ $item->waktu_update }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('history.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua Riwayat</a>
            </div>
        </div>


        <div class="d-flex justify-content-end mt-3">
            {!! $peminjamans->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    </div>
@endsection
