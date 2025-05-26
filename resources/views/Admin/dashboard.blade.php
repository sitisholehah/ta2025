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
                    <div class="card-body">
                        <h4 class="card-title">History Peminjaman</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Kondisi Barang</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Natalia</td>
                                        <td>02312</td>
                                        <td>$14,500</td>
                                        <td>04 Dec 2019</td>
                                        <td>Dashboard</td>
                                        <td>Baik</td>
                                        <td>-</td>
                                        <td><button class="btn btn-success btn-sm">Approved</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sholehah</td>
                                        <td>02312</td>
                                        <td>$14,500</td>
                                        <td>04 Dec 2019</td>
                                        <td>Website</td>
                                        <td>Baik</td>
                                        <td>-</td>
                                        <td><button class="btn btn-warning btn-sm">Pending</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Lucy</td>
                                        <td>02312</td>
                                        <td>$14,500</td>
                                        <td>04 Dec 2019</td>
                                        <td>App design</td>
                                        <td>Baik</td>
                                        <td>-</td>
                                        <td><button class="btn btn-danger btn-sm">Rejected</button></td>
                                    </tr>
                                    <!-- Tambahkan data lainnya jika ada -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
