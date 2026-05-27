<?php
require 'Model.php';

if (isset($_GET['delete'])) {
    deleteMember($_GET['delete']);
    header("Location: Member.php");
    exit;
}

$members = getAllMember();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <a href="index.php" class="brand">📚 Perpustakaan</a>
            <a href="Member.php" class="active">👤 Member</a>
            <a href="Buku.php">📖 Buku</a>
            <a href="Peminjaman.php">📋 Peminjaman</a>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="top-bar">
                    <h2>Data Member</h2>
                    <a href="FormMember.php" class="btn btn-primary">+ Tambah Member</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Member</th>
                            <th>Alamat</th>
                            <th>Tanggal Mendaftar</th>
                            <th>Tanggal Terakhir Bayar</th>
                            <th style="width: 1%; white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($members as $m): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($m['nama_member']) ?></td>
                                <td><?= htmlspecialchars($m['nomor_member']) ?></td>
                                <td><?= htmlspecialchars($m['alamat']) ?></td>
                                <td><?= $m['tgl_mendaftar'] ?></td>
                                <td><?= $m['tgl_terakhir_bayar'] ?></td>
                                <td style="white-space: nowrap;">
                                    <div class="table-actions">
                                        <a href="FormMember.php?id=<?= $m['id_member'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="Member.php?delete=<?= $m['id_member'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Hapus member ini?')">Hapus</a>
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