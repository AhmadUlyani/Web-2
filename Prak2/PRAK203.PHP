<!DOCTYPE html>
<head>
    <title>Soal 3</title>
</head>

<body>
    <?php
    $nilai = "";
    $dari = "";
    $ke = "";
    $hasil_konversi= "";

    if (isset($_POST['konversi'])) {
        $nilai = $_POST["nilai"];
        $dari = $_POST["dari"];
        $ke = $_POST["ke"];

        if ($nilai !== "" && $dari !== "" && $ke !== "") {
            $suhu_celcius = 0;
            switch ($dari) {
                case "Celcius":
                    $suhu_celcius = $nilai;
                    break;
                case "Fahrenheit":
                    $suhu_celcius = ($nilai - 32) * 5 / 9;
                    break;
                case "Reamur":
                    $suhu_celcius = $nilai * 5 / 4;
                    break;
                case "Kelvin":
                    $suhu_celcius = $nilai - 273.15;
                    break;
            }

            $hasil_akhir = 0;
            $simbol = "";
            switch ($ke) {
                case "Celcius":
                    $hasil_akhir = $suhu_celcius;
                    $simbol = "°C";
                    break;
                case "Fahrenheit":
                    $hasil_akhir = ($suhu_celcius * 9 / 5) + 32;
                    $simbol = "°F";
                    break;
                case "Reamur":
                    $hasil_akhir = $suhu_celcius * 4 / 5;
                    $simbol = "°R";
                    break;
                case "Kelvin":
                    $hasil_akhir = $suhu_celcius + 273.15;
                    $simbol = "K";
                    break;
            }

            $hasil_konversi = "<h2>Hasil Konversi: " . number_format($hasil_akhir, 1) . " " . $simbol . "</h2>";
        }
    }
    ?>

    <form action="" method="post">
        Nilai :
        <input type="number" step="any" name="nilai" value="<?php echo $nilai; ?>"> <br>

        Dari : <br>
        <input type="radio" name="dari" value="Celcius" <?php if ($dari == "Celcius") echo "checked"; ?>> Celcius <br>
        <input type="radio" name="dari" value="Fahrenheit" <?php if ($dari == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
        <input type="radio" name="dari" value="Reamur" <?php if ($dari == "Reamur") echo "checked"; ?>> Reamur <br>
        <input type="radio" name="dari" value="Kelvin" <?php if ($dari == "Kelvin") echo "checked"; ?>> Kelvin <br>

        Ke : <br>
        <input type="radio" name="ke" value="Celcius" <?php if ($ke == "Celcius") echo "checked"; ?>> Celcius <br>
        <input type="radio" name="ke" value="Fahrenheit" <?php if ($ke == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
        <input type="radio" name="ke" value="Reamur" <?php if ($ke == "Reamur") echo "checked"; ?>> Reamur <br>
        <input type="radio" name="ke" value="Kelvin" <?php if ($ke == "Kelvin") echo "checked"; ?>> Kelvin <br>

        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
        if ($hasil_konversi !== "") {
            echo $hasil_konversi;
        }
    ?>

</body>

</html>