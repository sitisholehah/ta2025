@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi Inventaris</h4>
                    <form class="forms-sample" action="{{ route('inventaris.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_barang">ID</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="ID">
                        </div>
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                placeholder="Kode Barang">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_barang">Deskripsi Barang</label>
                            <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3"
                                placeholder="Tulis deskripsi barang secara detail..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kelompok_barang">Kelompok Barang</label>
                            <select class="form-control" id="kelompok_barang" name="kelompok_barang">
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
                                placeholder="Departemen Pemilik">
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
                        </div>
                        <div class="form-group">
                            <label for="tipe_part_number">Tipe / Part Number</label>
                            <input type="text" class="form-control" id="tipe_part_number" name="tipe_part_number"
                                placeholder="Tipe/Part Number">
                        </div>
                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number"
                                placeholder="Serial Number">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_expired_garansi">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_pembelian"
                                name="tanggal_expired_garansi">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga">
                        </div>
                          <div class="form-group">
                            <label for="tempat_pembelian">Tempat Pembelian</label>
                            <input type="text" class="form-control" id="tempat_pembelian" name="tempat_pembelian"
                                placeholder="Masukkan Tempat Pembelian">
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
                                placeholder="Lokasi Barang">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pembelian">Tanggal Expired Garansi</label>
                            <input type="date" class="form-control" id="tanggal_expired_garansi" name="tanggal_expired_garansi">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                            <label for="photo_barang">Photo 1 (Barang)</label>
                            <input type="file" class="form-control" id="photo_barang" name="photo_barang">
                        </div>
                        <div class="form-group">
                            <label for="photo_serial">Photo 2 (Serial)</label>
                            <input type="file" class="form-control" id="photo_serial" name="photo_serial">
                        </div>
                        <div class="form-group">
                            <label for="photo_nota">Photo 3 (Nota)</label>
                            <input type="file" class="form-control" id="photo_nota" name="photo_nota">
                        </div>
                        <div class="form-group">
                            <label for="photo_lainnya">Photo 4 (Lainnya)</label>
                            <input type="file" class="form-control" id="photo_lainnya" name="photo_lainnya">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
