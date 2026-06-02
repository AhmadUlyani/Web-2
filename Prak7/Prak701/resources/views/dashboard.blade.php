@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2>Dashboard</h2>

    <p class="welcome-text">
        Selamat datang, {{ session('username') }}.
    </p>

    <div class="dashboard-grid">
        <a href="{{ route('member.index') }}" class="dashboard-card">
            <div class="dashboard-icon">👤</div>
            <div class="dashboard-label">Member</div>
        </a>

        <a href="{{ route('buku.index') }}" class="dashboard-card">
            <div class="dashboard-icon">📖</div>
            <div class="dashboard-label">Buku</div>
        </a>

        <a href="{{ route('peminjaman.index') }}" class="dashboard-card">
            <div class="dashboard-icon">📋</div>
            <div class="dashboard-label">Peminjaman</div>
        </a>
    </div>
</div>
@endsection