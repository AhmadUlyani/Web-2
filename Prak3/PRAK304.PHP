<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 4</title>
    <style>
        .bintang {
            width: 50px;
            height: 50px;
            margin-top: 20px;
        }

        .peringatan {
            color: red;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    $tampil_hasil = false;
    $jumlah_bintang = 0;
    $pesan_peringatan = "";

    if (isset($_POST['submit'])) {
        $jumlah_bintang = (int)$_POST['jumlah'];
        $tampil_hasil = true;
    } 
    
    elseif (isset($_POST['tambah'])) {
        $jumlah_bintang = (int)$_POST['jumlah_sekarang'] + 1;
        $tampil_hasil = true;
    } 
    
    elseif (isset($_POST['kurang'])) {
        $jumlah_bintang = (int)$_POST['jumlah_sekarang'] - 1;
        if ($jumlah_bintang < 0) {
            $jumlah_bintang = 0;
            $pesan_peringatan = "Jumlah bintang tidak boleh minus";
        }
        $tampil_hasil = true;
    }
    ?>

    <?php if (!$tampil_hasil) : ?>
        <form method="post" action="">
            <label for="jumlah">Jumlah bintang </label>
            <input type="number" name="jumlah" id="jumlah" min="0" required>
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>

    <?php else : ?>
        <p>Jumlah bintang <?php echo $jumlah_bintang; ?></p>

        <?php if ($pesan_peringatan !== "") : ?>
            <p class="peringatan"><?php echo $pesan_peringatan; ?></p>
        <?php endif; ?>
        
        <?php
        for ($i = 0; $i < $jumlah_bintang; $i++) {
            echo "<img src='star.png' class='bintang' alt='bintang'>";
        }
        ?>

        <form method="post" action="">
            <input type="hidden" name="jumlah_sekarang" value="<?php echo $jumlah_bintang; ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>

</body>
</html>