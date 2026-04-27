<!DOCTYPE html>
<head>
    <title>Soal 2</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $nama_error = "";
    $nim_error = "";
    $jk_error = "";
    $nama = "";
    $nim = "";
    $jk = "";

    if (isset($_POST['submit'])){
        if (empty($_POST["nama"])){
            $nama_error = "nama tidak boleh kosong";
        } else {
            $nama = ($_POST["nama"]);
        }

        if (empty($_POST["nim"])){
            $nim_error = "nim tidak boleh kosong";
        } else {
            $nim = ($_POST["nim"]);
        }

        if (empty($_POST["jk"])){
            $jk_error = "jenis kelamin tidak boleh kosong";
        } else {
            $jk = ($_POST["jk"]);
        }
    }
    ?>
    
    <form action="" method="post">
        Nama:
        <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error">* <?php echo $nama_error; ?></span>
        <br><br>

        Nim:
        <input type="text" name="nim" value="<?php echo $nim; ?>"> 
        <span class="error">* <?php echo $nim_error; ?></span>
        <br><br>

        Jenis Kelamin :  
        <span class="error">* <?php echo $jk_error; ?></span><br>
        <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($jk) && $jk=="Laki-Laki") echo "checked";?>> Laki-Laki <br>
        <input type="radio" name="jk" value="Perempuan" <?php if (isset($jk) && $jk=="Perempuan") echo "checked";?>> Perempuan <br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
        if (isset($_POST['submit']) && empty($nama_error) && empty($nim_error) && empty($jk_error)){
            echo "<h2>Output:</h2>";
            echo $nama . "<br>";
            echo $nim . "<br>";
            echo $jk . "<br>";
        }
    ?>
</body>

</html>