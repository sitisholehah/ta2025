@extends('layouts.user')

@section('content')

{{-- CSS untuk Print --}}
<style>
@media print {
    nav,
    aside,
    header,
    footer,
    .sidebar,
    .navbar,
    .topbar,
    .print-hide,
    .form-control,
    .btn,
    form,
    .pagination,
    .logo,
    .profile,
    .navigation,
    .search-bar {
        display: none !important;
    }

    .container, .card, .card-body {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    body {
        background: white !important;
        color: black !important;
    }

    .table-responsive {
        overflow: visible !important;
    }

    th.print-hide-column,
    td.print-hide-column {
        display: none !important;
    }
}
</style>

<div class="container mt-4">
    {{-- Judul Halaman --}}
    <div class="mb-4">
        <h1 class="h3">Inventaris Barang</h1>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success print-hide">{{ session('success') }}</div>
    @endif

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('inventaris') }}" class="row g-3 align-items-center mb-4 print-hide">
        <!-- Input Nama Barang -->
        <div class="col-md-4">
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang"
                value="{{ request('nama_barang') }}">
        </div>

        <!-- Input Departemen Pemilik -->
        <div class="col-md-4">
            <select name="departemen_pemilik" class="form-control">
                <option value="">-- Pilih Departemen --</option>
                <option value="project control" {{ request('departemen_pemilik') == 'project control' ? 'selected' : '' }}>Project Control</option>
                <option value="it" {{ request('departemen_pemilik') == 'it' ? 'selected' : '' }}>IT</option>
                <option value="akunting" {{ request('departemen_pemilik') == 'akunting' ? 'selected' : '' }}>Akunting</option>
                <option value="tax" {{ request('departemen_pemilik') == 'tax' ? 'selected' : '' }}>Tax</option>
                <option value="audit" {{ request('departemen_pemilik') == 'audit' ? 'selected' : '' }}>Audit</option>
                <option value="HRD" {{ request('departemen_pemilik') == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="legal" {{ request('departemen_pemilik') == 'legal' ? 'selected' : '' }}>Legal</option>
                <option value="tenancy & Design" {{ request('departemen_pemilik') == 'tenancy & Design' ? 'selected' : '' }}>Tenancy & Design</option>
            </select>
        </div>

        <!-- Tombol Filter -->
        <div class="col-md-4 text-end">
            <button class="btn btn-secondary btn-sm me-2" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
            <a href="{{ route('inventaris') }}" class="btn btn-secondary btn-sm me-2">
                <i class="bi bi-arrow-repeat"></i> Refresh
            </a>
            <button class="btn btn-secondary btn-sm" type="button" onclick="window.print()">
                <i class="bi bi-printer"></i> Cetak
            </button>
        </div>
    </form>

    {{-- Tabel Inventaris --}}
    <div class="card">
        <div class="card-body">

            {{-- Tombol Tambah Data --}}
           
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Kelompok</th>
                            <th>Departemen</th>
                            <th>Merk</th>
                            <th>Tipe/Part</th>
                            <th>Serial</th>
                            <th>Tgl Pembelian</th>
                            <th>Harga</th>
                            <th>Tempat</th>
                            <th>Penanggungjawab</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>Tgl Exp. Garansi</th>
                            <th>Keterangan</th>
                            <th class="print-hide-column">Foto Barang</th>
                            <th class="print-hide-column">Foto Serial</th>
                            <th class="print-hide-column">Foto Nota</th>
                            <th class="print-hide-column">Foto Lainnya</th>
                            <th class="print-hide-column">Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventaris as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
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

                                {{-- Foto Barang --}}
                                <td class="print-hide-column">
                                    @if ($item->photo_barang)
                                        <a href="{{ asset($item->photo_barang) }}" target="_blank">
                                            <img src="{{ asset($item->photo_barang) }}" class="img-thumbnail" style="width:50px;height:50px;">
                                        </a>
                                    @endif
                                </td>

                                {{-- Foto Serial --}}
                                <td class="print-hide-column">
                                    @if ($item->photo_serial)
                                        <a href="{{ asset($item->photo_serial) }}" target="_blank">
                                            <img src="{{ asset($item->photo_serial) }}" class="img-thumbnail" style="width:50px;height:50px;">
                                        </a>
                                    @endif
                                </td>

                                {{-- Foto Nota --}}
                                <td class="print-hide-column">
                                    @if ($item->photo_nota)
                                        <a href="{{ asset($item->photo_nota) }}" target="_blank">
                                            <img src="{{ asset($item->photo_nota) }}" class="img-thumbnail" style="width:50px;height:50px;">
                                        </a>
                                    @endif
                                </td>

                                {{-- Foto Lain --}}
                                <td class="print-hide-column">
                                    @if ($item->photo_lainnya)
                                        <a href="{{ asset($item->photo_lainnya) }}" target="_blank">
                                            <img src="{{ asset($item->photo_lainnya) }}" class="img-thumbnail" style="width:50px;height:50px;">
                                        </a>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="print-hide-column">
                                    @if ($item->peminjamanAktif)
                                        <span class="badge bg-success">Dipinjam</span>
                                    @else
                                        <span class="badge bg-secondary">Tersedia</span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                               
                            </tr>
                        @empty
                            <tr>
                                <td colspan="23" class="text-center">Data inventaris belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3 mb-3 print-hide">
                {{ $inventaris->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>
@endsection
