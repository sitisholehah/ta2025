@extends('layouts.app')

@section('content')
    <h2>Detail Pengguna</h2>
    <p>Nama: {{ $user->username }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Alamat: {{ $user->address }}</p>
    <p>Telepon: {{ $user->phone }}</p>
@endsection
