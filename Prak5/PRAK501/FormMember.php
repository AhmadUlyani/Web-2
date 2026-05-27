<?php
require 'Model.php';

$data = null;
if (isset($_GET['id'])) {
    $data = getMemberById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama       = $_POST['nama_member'];
    $nomor      = $_POST['nomor_member'];
    $alamat     = $_POST['alamat'];
    $tgl_daftar = $_POST['tgl_mendaftar'];
    $tgl_bayar  = $_POST['tgl_terakhir_bayar'];

    $tgl_daftar_only = date('Y-m-d', strtotime($tgl_daftar));
    if (!empty($tgl_bayar) && $tgl_bayar <= $tgl_daftar_only) {
        $error = "Tanggal terakhir bayar tidak boleh kurang dari tanggal mendaftar.";
    } else {
        if (isset($_POST['id_member']) && $_POST['id_member'] != '') {
            updateMember($_POST['id_member'], $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
        } else {
            insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
        }
        header("Location: Member.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Member</title>
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
            <div class="container-form">
                <h2><?= $data ? 'Edit' : 'Tambah' ?> Member</h2>
                <div class="card">
                    <form method="POST">
                        <?php if ($data): ?>
                            <input type="hidden" name="id_member" value="<?= $data['id_member'] ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Nama Member</label>
                            <input type="text" name="nama_member" value="<?= $data['nama_member'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Member</label>
                            <input type="text" name="nomor_member" value="<?= $data['nomor_member'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat"><?= $data['alamat'] ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tgl Mendaftar</label>
                            <input type="datetime-local" name="tgl_mendaftar" id="tgl_mendaftar"
                                value="<?= isset($data['tgl_mendaftar']) ? date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar'])) : '' ?>"
                                onchange="updateMinBayar(this.value)">
                        </div>
                        <div class="form-group">
                            <label>Tgl Terakhir Bayar</label>
                            <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar"
                                value="<?= $data['tgl_terakhir_bayar'] ?? '' ?>"
                                min="<?= isset($data['tgl_mendaftar']) ? date('Y-m-d', strtotime($data['tgl_mendaftar'])) : '' ?>">
                        </div>
                        <?php if (isset($error)): ?>
                            <p style="color: #e74c3c; margin-bottom: 12px;"><?= $error ?></p>
                        <?php endif; ?>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="Member.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateMinBayar(tglMendaftar) {
            const tglOnly = tglMendaftar ? tglMendaftar.split('T')[0] : '';
            document.getElementById('tgl_terakhir_bayar').min = tglOnly;

            const tglBayar = document.getElementById('tgl_terakhir_bayar').value;
            if (tglBayar && tglBayar < tglOnly) {
                document.getElementById('tgl_terakhir_bayar').value = '';
            }
        }
    </script>
</body>

</html>