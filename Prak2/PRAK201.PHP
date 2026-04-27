<!DOCTYPE html>
<head>
    <title>Soal 1</title>
</head>
<body>
    <form action="" method="post">
        Nama: 1
        <input type="text" name="nama1"><br><br>

        Nama: 2
        <input type="text" name="nama2"><br><br>

        Nama: 3
        <input type="text" name="nama3"><br><br>

        <button type="submit" name="urutkan">Urutkan</button>
    </form>

    <?php
        if (isset($_POST['urutkan'])){
            $nama1 = $_POST['nama1'];
            $nama2 = $_POST['nama2'];
            $nama3 = $_POST['nama3'];

            $semua_nama = [$nama1, $nama2, $nama3];

            sort($semua_nama);
            foreach($semua_nama as $sn){
                echo $sn . "<br>"; 
            }
        }
    ?>
</body>
</html>