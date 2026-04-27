<!DOCTYPE html> 
<head>
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: separate;
            border-spacing: 2px;
        }
        
        th, td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
$daftar_samsung = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    
    <?php
    foreach ($daftar_samsung as $smartphone) {
        echo "<tr>";
        echo "<td>" . $smartphone . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>