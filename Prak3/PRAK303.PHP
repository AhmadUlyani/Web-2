<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3</title>
    <style>
        .bintang {
            width: 25px;
            height: 25px;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <label for="batas_bawah">Batas Bawah : </label>
        <input type="number" name="batas_bawah" id="batas_bawah" value="<?php echo isset($_POST['batas_bawah']) ? $_POST['batas_bawah'] : ''; ?>" required>
        <br>
        <label for="batas_atas">Batas Atas : </label>
        <input type="number" name="batas_atas" id="batas_atas" value="<?php echo isset($_POST['batas_atas']) ? $_POST['batas_atas'] : ''; ?>" required>
        <br>
        <button type="submit" name="cetak">Cetak</button>
        <br> <br>
    </form>
    
    <?php
    if (isset($_POST['cetak'])) {
        $batas_bawah = $_POST['batas_bawah'];
        $batas_atas = $_POST['batas_atas'];

        $i = $batas_bawah;
        if ($i <= $batas_atas) {
            do {
                if (($i + 7) % 5 == 0) {
                    echo "<img src='star.png' class='bintang' alt='bintang'> ";
                } else {
                    echo "$i ";
                }

                $i++;
            } while ($i <= $batas_atas);
        } else {
            echo "Batas bawah harus lebih kecil atau sama dengan batas atas.";
        }
    }
    ?>

</body>
</html>