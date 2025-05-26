@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Karyawan</h4>
                    <form class="forms-sample" action="{{ route('karyawan.store') }}" method="POST">
                        @csrf
                        
                        
                        <div class="form-group">
                            <label for="id_pegawai">ID Karyawan</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID Karywan">
                        </div>
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Karyawan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Karyawan">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Alamat</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
