@extends('layouts.user')

@section('content')
   <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Inventaris Barang</h1>

        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form pencarian --}}
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>Pilih Divisi</th>
                            <th>Pilih Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option selected disabled>-- Pilih Divisi --</option>
                                    <option value="divisi1">Divisi 1</option>
                                    <option value="divisi2">Divisi 2</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option selected disabled>-- Pilih Unit --</option>
                                    <option value="unit1">Unit 1</option>
                                    <option value="unit2">Unit 2</option>
                                </select>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-secondary btn-sm mr-2">
                                        <i class="bi bi-search"></i> Cari <i></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm mr-2">
                                        <i class="bi bi-arrow-repeat"></i> Refresh <i></i>
                                    </button>
                                    {{-- <button class="btn btn-secondary btn-sm mr-2">
                                        <i class="bi bi-printer"></i> Cetak <i></i>
                                    </button> --}}
                                </div>
                                <link rel="stylesheet"
                                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>

    {{-- Judul tabel dan tombol data baru --}}
    {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}
    <div class="mb-3">
        <h1 class="h3">Data Inventaris</h1>
        {{-- <a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">Tambah Data Baru</a> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi Barang</th>
                            <th>Kelompok Barang</th>
                            <th>Departement Pemilik</th>
                            <th>Merk</th>
                            <th>Tipe/Part Number</th>
                            <th>Serial Number</th>
                            <th>Tanggal Pembelian</th>
                            <th>Harga</th>
                            <th>Tempat Pembelian</th>
                            <th>Penanggungjawab</th>
                            <th>Kondisi Barang</th>
                            <th>Lokasi Barang</th>
                            <th>Tgl Expired Garansi</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->deskripsi_barang }}</td>
                                <td>{{ $item->kelompok_barang }}</td>
                                <td>{{ $item->departemen_pemilik }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->tipe_part_number }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->tanggal_pembelian }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->tempat_pembelian }}</td>
                                <td>{{ $item->penanggungjawab }}</td>
                                <td>{{ $item->kondisi_barang }}</td>
                                <td>{{ $item->lokasi_barang }}</td>
                                <td>{{ $item->tanggal_expired_garansi }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <img class="card-img-top"
                                        src="{{ $item->photo_barang != null ? asset('storage/foto_inventaris/' . $item->photo_barang) : '' }}"
                                        alt="" style="width: 100px; height: auto;" />

                                    <img class="card-img-top"
                                        src="{{ $item->photo_serial != null ? asset('storage/foto_inventaris/' . $item->photo_serial) : '' }}"
                                        alt="" style="width: 100px; height: auto;" />

                                    <img class="card-img-top"
                                        src="{{ $item->photo_nota != null ? asset('storage/foto_inventaris/' . $item->photo_nota) : '' }}"
                                        alt="" style="width: 100px; height: auto;" />

                                    <img class="card-img-top"
                                        src="{{ $item->photo_Lainnya != null ? asset('storage/foto_inventaris/' . $item->photo_Lainnya) : '' }}"
                                        alt="" style="width: 100px; height: auto;" />

                                </td>
                                <td><label class="badge bg-danger">Pending</label></td>
                                <td>
                                    {{-- <a href="{{ route('inventaris.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a> --}}
                                    {{-- <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form> --}}
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
    </div> <!-- end card -->

    </div>
    @endsection
