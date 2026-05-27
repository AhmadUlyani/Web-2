<?php
require 'Model.php';

$data = null;
if (isset($_GET['id'])) {
    $data = getBukuById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = $_POST['judul_buku'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];

    if (isset($_POST['id_buku']) && $_POST['id_buku'] != '') {
        updateBuku($_POST['id_buku'], $judul, $penulis, $penerbit, $tahun);
    } else {
        insertBuku($judul, $penulis, $penerbit, $tahun);
    }

    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Buku</title>
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
            <div class="container-form">
                <h2><?= $data ? 'Edit' : 'Tambah' ?> Buku</h2>
                <div class="card">
                    <form method="POST">
                        <?php if ($data): ?>
                            <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" name="judul_buku" value="<?= $data['judul_buku'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" name="penulis" value="<?= $data['penulis'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" value="<?= $data['penerbit'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?? '' ?>">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="Buku.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>