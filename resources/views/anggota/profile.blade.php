@extends('layouts.user')

@section('title', 'Profil Saya')
<style>
    .profile-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 25px;
        background: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-title {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-form .form-group {
        margin-bottom: 15px;
    }

    .profile-form label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-weight: 600;
    }

    .profile-form input[type="text"],
    .profile-form input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: border-color 0.3s;
    }

    .profile-form input:focus {
        border-color: #007bff;
        outline: none;
    }

    .submit-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>
@section('content')
    <div class="profile-container">
        <h2 class="profile-title">Profil Saya</h2>

        @if (session('alert'))
            <div class="alert alert-warning">{{ session('alert') }}</div>
        @endif

        <form action="{{ route('anggota.profile.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" required>
            </div>

            <div class="form-group">@extends('layouts.app')

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
                        <img src="{{ asset('assets/foto/' . $user->photo) . '?v=' . time() }}" alt="Foto Profil"
                            width="150" class="img-thumbnail">
                    @else
                        <img src="{{ asset('assets/foto/default.png') }}" alt="Foto Default" width="150"
                            class="img-thumbnail">
                    @endif


                </div>

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
            </div>
        @endsection

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
</div>

<div class="form-group">
    <label for="address">Alamat:</label>
    <input type="text" name="address" id="address" value="{{ $user->address }}">
</div>

<div class="form-group">
    <label for="phone">No. Telepon:</label>
    <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
</div>

<button type="submit" class="submit-btn">Update Profil</button>
</form>
</div>
@endsection
