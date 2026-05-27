<?php require 'Model.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <a href="index.php" class="brand">📚 Perpustakaan</a>
            <a href="Member.php">👤 Member</a>
            <a href="Buku.php">📖 Buku</a>
            <a href="Peminjaman.php">📋 Peminjaman</a>
        </div>
        <div class="main-content">
            <div class="container">
                <h2>Dashboard</h2>
                <div class="dashboard-grid">
                    <a href="Member.php" class="dashboard-card">
                        <div class="dashboard-icon">👤</div>
                        <div class="dashboard-label">Member</div>
                    </a>
                    <a href="Buku.php" class="dashboard-card">
                        <div class="dashboard-icon">📖</div>
                        <div class="dashboard-label">Buku</div>
                    </a>
                    <a href="Peminjaman.php" class="dashboard-card">
                        <div class="dashboard-icon">📋</div>
                        <div class="dashboard-label">Peminjaman</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>