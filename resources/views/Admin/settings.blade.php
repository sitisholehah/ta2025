@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Settings Profil</h1>

    <!-- Info user -->
    <div class="mb-3">
        <strong>Nama:</strong> {{ $user->name }} <br>
        <strong>Email:</strong> {{ $user->email }}
    </div>

    <!-- Status sukses -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form ganti password -->
    <h3>Ganti Password</h3>
    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama:</label>
            <input id="current_password" type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru:</label>
            <input id="new_password" type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru:</label>
            <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ubah Password</button>
    </form>
</div>
@endsection
