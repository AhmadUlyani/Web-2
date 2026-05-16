<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SOAL 1</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <label for="panjang">Panjang :</label>
        <input type="number" name="panjang" id="panjang" value="<?php echo isset($_POST['panjang']) ? $_POST['panjang'] : ''; ?>" required>
        <br>
        <label for="lebar">Lebar :</label>
        <input type="number" name="lebar" id="lebar" value="<?php echo isset($_POST['lebar']) ? $_POST['lebar'] : ''; ?>" required>
        <br>
        <label for="nilai">Nilai :</label>
        <input type="text" name="nilai" id="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>" required>
        <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $nilai = $_POST['nilai'];
        $array = explode(" ", $nilai);

        $jumlah_elemen = count($array);
        $ukuran_matriks = $panjang * $lebar;

        echo "<br>";

        if ($jumlah_elemen == $ukuran_matriks) {
            echo "<table>";
            $index_array = 0;
            for ($baris = 0; $baris < $panjang; $baris++) {
                echo "<tr>";
                for ($kolom = 0; $kolom < $lebar; $kolom++) {
                    echo "<td>" . $array[$index_array] . "</td>";
                    $index_array++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>

</body>
</html>