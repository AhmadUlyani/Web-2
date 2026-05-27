<?php
require 'Model.php';

if (isset($_GET['delete'])) {
    deleteBuku($_GET['delete']);
    header("Location: Buku.php");
    exit;
}

$bukus = getAllBuku();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <a href="index.php" class="brand">📚 Perpustakaan</a>
            <a href="Member.php">👤 Member</a>
            <a href="Buku.php" class="active">📖 Buku</a>
            <a href="Peminjaman.php">📋 Peminjaman</a>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="top-bar">
                    <h2>Data Buku</h2>
                    <a href="FormBuku.php" class="btn btn-primary">+ Tambah Buku</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th style="width: 1%; white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($bukus as $b): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($b['judul_buku']) ?></td>
                                <td><?= htmlspecialchars($b['penulis']) ?></td>
                                <td><?= htmlspecialchars($b['penerbit']) ?></td>
                                <td><?= $b['tahun_terbit'] ?></td>
                                <td style="white-space: nowrap;">
                                    <div class="table-actions">
                                        <a href="FormBuku.php?id=<?= $b['id_buku'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="Buku.php?delete=<?= $b['id_buku'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Hapus buku ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>