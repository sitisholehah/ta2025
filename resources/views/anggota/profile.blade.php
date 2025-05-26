@extends('layouts.app')

@section('content')
    <h2>Profil Saya</h2>

    @if(session('alert'))
        <div class="alert alert-warning">{{ session('alert') }}</div>
    @endif

    <form action="{{ route('anggota.profile.update') }}" method="POST">
        @csrf
        <label>Username:</label>
        <input type="text" name="username" value="{{ $user->username }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>Alamat:</label>
        <input type="text" name="address" value="{{ $user->address }}">

        <label>No. Telepon:</label>
        <input type="text" name="phone" value="{{ $user->phone }}">

        <button type="submit">Update Profil</button>
    </form>
@endsection
