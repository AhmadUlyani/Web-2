<!DOCTYPE html>
<head>
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: separate;
            border-spacing: 2px;
        }
        
        th {
            background-color: red;
            font-size: 24px;
            font-weight: bold;
            border: 1px solid black;
            padding: 15px;
        }

        td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$daftar_samsung = [
    "S22" => "Samsung Galaxy S22",
    "S22+" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy A03",
    "X5" => "Samsung Galaxy Xcover 5"
];
?>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    
    <?php
    foreach ($daftar_samsung as $kategori => $smartphone) {
        echo "<tr>";
        echo "<td>" . $smartphone . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>