<?php
require 'Model.php';

if (isset($_GET['delete'])) {
    deletePeminjaman($_GET['delete']);
    header("Location: Peminjaman.php");
    exit;
}

$pinjamans = getAllPeminjaman();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <a href="index.php" class="brand">📚 Perpustakaan</a>
            <a href="Member.php">👤 Member</a>
            <a href="Buku.php">📖 Buku</a>
            <a href="Peminjaman.php" class="active">📋 Peminjaman</a>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="top-bar">
                    <h2>Data Peminjaman</h2>
                    <a href="FormPeminjaman.php" class="btn btn-primary">+ Tambah Peminjaman</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th style="width: 1%; white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pinjamans as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_member']) ?></td>
                                <td><?= htmlspecialchars($p['judul_buku']) ?></td>
                                <td><?= $p['tgl_pinjam'] ?></td>
                                <td><?= $p['tgl_kembali'] ?></td>
                                <td style="white-space: nowrap;">
                                    <div class="table-actions">
                                        <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="Peminjaman.php?delete=<?= $p['id_peminjaman'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Hapus data peminjaman ini?')">Hapus</a>
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