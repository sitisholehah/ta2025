@extends('layouts.user')

@section('title', 'Profil Saya')
<style>
    .user-detail-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .detail-title {
        text-align: center;
        margin-bottom: 20px;
        color: #343a40;
    }

    .detail-item {
        margin-bottom: 15px;
        font-size: 16px;
        color: #495057;
    }

    .detail-item strong {
        color: #212529;
    }
    .detail-item:not(:last-child) {
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 10px;
    }
</style>
@section('content')
    <div class="user-detail-container">
        <h2 class="detail-title">Detail Pengguna</h2>
        <div class="detail-item"><strong>Nama:</strong> {{ $user->username }}</div>
        <div class="detail-item"><strong>Email:</strong> {{ $user->email }}</div>
        <div class="detail-item"><strong>Alamat:</strong> {{ $user->address ?? '-' }}</div>
        <div class="detail-item"><strong>Telepon:</strong> {{ $user->phone ?? '-' }}</div>
         <div class="button-container">
            <a href="{{ route('anggota.profile') }}" class="edit-link">Edit Profil</a>
        </div>
    </div>
@endsection
