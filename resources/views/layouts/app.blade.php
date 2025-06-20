<!DOCTYPE html>
<html>

<head>
    <title>Sistem Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    @php
        // Ambil nilai active menu dari section 'active' di view yang extend layout ini
        $activeMenu = trim($__env->yieldContent('active'));
    @endphp

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PT. Govindo Utama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ $activeMenu === 'home' ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('inventaris') }}"
                            class="nav-link {{ $activeMenu === 'inventaris' ? 'active' : '' }}">
                            Inventaris
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('karyawan') }}"
                            class="nav-link {{ $activeMenu === 'karyawan' ? 'active' : '' }}">
                            Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('peminjaman.index') }}"
                            class="nav-link {{ $activeMenu === 'peminjaman' ? 'active' : '' }}">
                            Peminjaman
                         </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.settings') }}"
                            class="nav-link {{ $activeMenu === 'settings' ? 'active' : '' }}">
                            Settings
                        </a>
                    </li>
                    <!-- Tambahkan menu lain di sini jika perlu -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
