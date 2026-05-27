<?php
require 'Model.php';

$data = null;
if (isset($_GET['id'])) {
    $data = getPeminjamanById($_GET['id']);
}

$members = getAllMember();
$bukus   = getAllBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member   = $_POST['id_member'];
    $id_buku     = $_POST['id_buku'];
    $tgl_pinjam  = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if (!empty($tgl_kembali) && $tgl_kembali < $tgl_pinjam) {
        $error = "Tanggal kembali tidak boleh kurang dari tanggal pinjam.";
    } else {
        if (isset($_POST['id_peminjaman']) && $_POST['id_peminjaman'] != '') {
            updatePeminjaman($_POST['id_peminjaman'], $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
        } else {
            insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
        }
        header("Location: Peminjaman.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Peminjaman</title>
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
            <div class="container-form">
                <h2><?= $data ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
                <div class="card">
                    <form method="POST">
                        <?php if ($data): ?>
                            <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Member</label>
                            <select name="id_member" required>
                                <option value="">-- Pilih Member --</option>
                                <?php foreach ($members as $m): ?>
                                    <option value="<?= $m['id_member'] ?>"
                                        <?= (isset($data) && $data['id_member'] == $m['id_member']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($m['nama_member']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Buku</label>
                            <select name="id_buku" required>
                                <option value="">-- Pilih Buku --</option>
                                <?php foreach ($bukus as $b): ?>
                                    <option value="<?= $b['id_buku'] ?>"
                                        <?= (isset($data) && $data['id_buku'] == $b['id_buku']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($b['judul_buku']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tgl Pinjam</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam"
                                value="<?= $data['tgl_pinjam'] ?? '' ?>"
                                required
                                onchange="updateMinKembali(this.value)">
                        </div>
                        <div class="form-group">
                            <label>Tgl Kembali</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali"
                                value="<?= $data['tgl_kembali'] ?? '' ?>"
                                min="<?= $data['tgl_pinjam'] ?? '' ?>">
                        </div>
                        <?php if (isset($error)): ?>
                            <p style="color: #e74c3c; margin-bottom: 12px;"><?= $error ?></p>
                        <?php endif; ?>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="Peminjaman.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateMinKembali(tglPinjam) {
            document.getElementById('tgl_kembali').min = tglPinjam;
            const tglKembali = document.getElementById('tgl_kembali').value;
            if (tglKembali && tglKembali < tglPinjam) {
                document.getElementById('tgl_kembali').value = '';
            }
        }
    </script>
</body>

</html>