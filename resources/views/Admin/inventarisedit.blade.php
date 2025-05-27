@extends('layouts.welcome')

@section('content')
    <div class="container mt-3">
        <h2>Edit Data Inventaris</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang"
                    value="{{ old('kode_barang', $inventaris->kode_barang) }}">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang"
                    value="{{ old('nama_barang', $inventaris->nama_barang) }}">
            </div>
            <div class="form-group">
                <label for="deskripsi_barang">Deskripsi Barang</label>
                <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3"
                 value="{{ old('deskripsi_barang', $inventaris->deskripsi_barang) }}"></textarea>
            </div>
            <div class="form-group">
                <label for="kelompok_barang">Kelompok Barang</label>
                <select class="form-control" id="kelompok_barang" name="kelompok_barang"
                    value="{{ old('kelompok_barang', $inventaris->kelompok_barang) }}">
                    <option value="">-- Pilih Kelompok Barang --</option>
                    <option value="">-- Pilih Kelompok Barang --</option>
                    <option value="ATK">ATK</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Other">Other</option>
                    <option value="Tools">Tools</option>
                </select>
            </div>
            <div class="form-group">
                <label for="departemen_pemilik">Departemen Pemilik</label>
                <input type="text" class="form-control" id="departemen_pemilik" name="departemen_pemilik"
                    placeholder="Departemen Pemilik" value="{{ old('departemen_pemilik', $inventaris->departemen_pemilik) }}">
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk"
                    value="{{ old('merk', $inventaris->merk) }}">
            </div>
            <div class="form-group">
                <label for="tipe_part_number">Tipe / Part Number</label>
                <input type="text" class="form-control" id="tipe_part_number" name="tipe_part_number"
                    placeholder="Tipe/Part Number" value="{{ old('tipe_part_number', $inventaris->tipe_part_number) }}">
            </div>
            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number"
                    placeholder="Serial Number" value="{{ old('serial_number', $inventaris->serial_number) }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" value="{{ old('harga', $inventaris->harga) }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga"
                    placeholder="Masukkan nominal harga" value="{{ old('harga', $inventaris->harga) }}">
            </div>
            <div class="form-group">
                <label for="penanggungjawab">Penanggung Jawab</label>
                <select class="form-control" id="penanggungjawab" name="penanggungjawab">
                    <option value="">-- Pilih Penanggung Jawab --</option>
                    <option value="Lukmanul Hakim">Lukmanul Hakim</option>
                    <option value="Irfan Naufal">Irfan Naufal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kondisi_barang">Kondisi Barang</label>
                <select class="form-control" id="kondisi_barang" name="kondisi_barang">
                    <option value="">-- Pilih Kondisi Barang --</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Dimusnahkan">Dimusnahkan</option>
                    <option value="Direlokasi">Direlokasi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi_barang">Lokasi Barang</label>
                <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang"
                    placeholder="Lokasi Barang" value="{{ old('lokasi_barang', $inventaris->lokasi_barang) }}">
            </div>
            <div class="form-group">
                <label for="tanggal_expired_garansi">Tanggal Expired Garansi</label>
                <input type="date" class="form-control" id="tanggal_expired_garansi" name="tanggal_expired_garansi"     
                    value="{{ old('tanggal_expired_garansi', $inventaris->tanggal_expired_garansi) }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" 
                    value="{{ old('keterangan', $inventaris->keterangan) }}">
            </div>
            <div class="form-group">
                <label for="photo_barang">Photo 1 (Barang)</label>
                <input type="file" class="form-control" id="photo_barang" name="photo_barang" 
                    value="{{ old('photo_barang', $inventaris->photo_barang) }}">
            </div>
            <div class="form-group">
                <label for="photo_serial">Photo 2 (Serial)</label>
                <input type="file" class="form-control" id="photo_serial" name="photo_serial"   
                    value="{{ old('photo_serial', $inventaris->photo_serial) }}">
            </div>
            <div class="form-group">
                <label for="photo_nota">Photo 3 (Nota)</label>
                <input type="file" class="form-control" id="photo_nota" name="photo_nota" 
                    value="{{ old('photo_nota', $inventaris->photo_nota) }}">
            </div>
            <div class="form-group">
                <label for="photo_lainnya">Photo 4 (Lainnya)</label>
                <input type="file" class="form-control" id="photo_lainnya" name="photo_lainnya" 
                    value="{{ old('photo_lainnya', $inventaris->photo_lainnya) }}">
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('inventaris') }}" class="btn btn-secondary">Batal</a>

        </form>
    </div>
@endsection
