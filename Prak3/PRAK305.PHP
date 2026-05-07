<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 5</title>
    <style>
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="kata" value="<?php echo isset($_POST['kata']) ? $_POST['kata'] : ''; ?>" required>
        <button type="submit" name="submit">submit</button> 
        <br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input_kata = $_POST['kata'];
        $panjang = strlen($input_kata);

        echo "<p class='bold'>Input:</p>";
        echo "<p>$input_kata</p>";
        echo "<p class='bold'>Output:</p>";

        for ($i = 0; $i < $panjang; $i++) {
            $huruf = $input_kata[$i];
            echo strtoupper($huruf);
            for ($j = 1; $j < $panjang; $j++) {
                echo strtolower($huruf);
            }
        }
    }
    ?>

</body>
</html>