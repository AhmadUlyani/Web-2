<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <style>
        .merah {
            color: red;
            font-weight: bold;
        }

        .hijau {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <label>Jumlah Peserta: </label>
        <input type="number" name="jumlah" id="jumlah" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : ''; ?>" required>
        <br>
        <button type="submit" name="cetak">Cetak</button>
        <br>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 != 0) {
                echo "<h3 class='merah'>Peserta ke-$i</h3>";
            } else {
                echo "<h3 class='hijau'>Peserta ke-$i</h3>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>