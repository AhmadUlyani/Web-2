<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <a href="{{ route('dashboard') }}" class="brand">📚 Perpustakaan</a>

            <a href="{{ route('member.index') }}" class="{{ request()->is('member*') ? 'active' : '' }}">
                👤 Member
            </a>

            <a href="{{ route('buku.index') }}" class="{{ request()->is('buku*') ? 'active' : '' }}">
                📖 Buku
            </a>

            <a href="{{ route('peminjaman.index') }}" class="{{ request()->is('peminjaman*') ? 'active' : '' }}">
                📋 Peminjaman
            </a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">🚪 Logout</button>
            </form>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>

</html>