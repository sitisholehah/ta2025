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
    @endsection
