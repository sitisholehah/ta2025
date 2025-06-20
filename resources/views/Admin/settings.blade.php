@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Pengaturan Profil</h2>

        {{-- Status Notifikasi --}}
        @if (session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
        @endif

        {{-- Form Update Foto Profil --}}
        <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="photo" required>
            <button type="submit">Update Foto</button>
        </form>

        {{-- Foto Profil Saat Ini --}}
        @if ($user->photo && file_exists(public_path('assets/foto/' . $user->photo)))
            <img src="{{ asset('assets/foto/' . $user->photo) . '?v=' . time() }}" alt="Foto Profil" width="150"
                class="img-thumbnail">
        @else
            <img src="{{ asset('assets/foto/default.png') }}" alt="Foto Default" width="150" class="img-thumbnail">
        @endif
    </div>

    <hr class="my-5">

    {{-- Form Ganti Username --}}
    <h4>Ganti Nama</h4>
    <form action="{{ route('profile.updateName') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Baru:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Nama</button>
    </form>

    <hr class="my-5">

    {{-- Form Ganti Password --}}
    <h4>Ganti Password</h4>
    <form action="{{ route('profile.updatePassword') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama:</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru:</label>
            <input type="password" name="new_password" class="form-control" required>
            @error('new_password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru:</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Ganti Password</button>
    </form>
@endsection
