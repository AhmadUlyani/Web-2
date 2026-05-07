<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
    <style>
        .icon {
            width: 30px;
            height: 30px;
        }
        .sembunyi {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <label for="tinggi">Tinggi : </label>
        <input type="number" name="tinggi" id="tinggi" value="<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>"required>
        <br>
        <label for="gambar">Alamat Gambar : </label>
        <input type="text" name="gambar" id="gambar" value="<?php echo isset($_POST['gambar']) ? $_POST['gambar'] : ''; ?>" required>
        <br>
        <button type="submit" name="cetak">Cetak</button> 
        <br> <br>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $gambar = $_POST['gambar'];

        $i = 1;
        while ($i <= $tinggi) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$gambar' class='icon sembunyi' alt='spasi'>";
                $j++;
            }

            $k = 1;
            $batas_gambar = $tinggi - $i + 1;
            while ($k <= $batas_gambar) {
                echo "<img src='$gambar' class='icon' alt='gambar'>";
                $k++;
            }
            
            echo "<br>";
            $i++;
        }
    }
    ?>

</body>
</html>