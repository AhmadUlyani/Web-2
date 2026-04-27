<!DOCTYPE html>
<head>
    <title>Soal 4</title>
</head>
<body>
    <?php
    $nilai = "";
    $hasil = "";

    if (isset($_POST['submit'])) {
        $nilai = (int)$_POST["nilai"];

        if ($nilai !== "") {
            if ($nilai < 0 || $nilai >= 1000) {
                $hasil = "Anda Menginput Melebihi Limit Bilangan";
            } elseif ($nilai == 0) {
                $hasil = "Nol";
            } elseif ($nilai >= 1 && $nilai <= 9) {
                $hasil = "Satuan";
            } elseif ($nilai >= 11 && $nilai <= 19) {
                $hasil = "Belasan";
            } elseif ($nilai == 10 || ($nilai >= 20 && $nilai <= 99)) {
                $hasil = "Puluhan";
            } elseif ($nilai >= 100 && $nilai <= 999) {
                $hasil = "Ratusan";
            }
        }
    }
    ?>

    <form action="" method="post">
        Nilai :
        <input type="number" name="nilai" value="<?php echo $nilai; ?>"> <br>
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php
        if ($hasil !== "") {
            echo "<h2>Hasil: " . $hasil . "</h2>";
        }
    ?>
</body>
</html>