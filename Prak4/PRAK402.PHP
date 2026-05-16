<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SOAL 2</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px 20px 5px 8px;
            text-align: left;
        }

        th {
            background-color: #cccccc;
        }
    </style>
</head>

<body>
    <?php
    $data_mhs = [
        [
            "Nama" => "Andi",
            "NIM" => "2101001",
            "Nilai UTS" => 87,
            "Nilai UAS" => 65
        ],
        [
            "Nama" => "Budi",
            "NIM" => "2101002",
            "Nilai UTS" => 76,
            "Nilai UAS" => 79
        ],
        [
            "Nama" => "Tono",
            "NIM" => "2101003",
            "Nilai UTS" => 50,
            "Nilai UAS" => 41
        ],
        [
            "Nama" => "Jessica",
            "NIM" => "2101004",
            "Nilai UTS" => 60,
            "Nilai UAS" => 75
        ]
    ];

    foreach ($data_mhs as &$mhs) {
        $a = $mhs['Nilai UTS'];
        $b = $mhs['Nilai UAS'];
        $nilai_akhir = ($a * 0.40) + ($b * 0.60);
        $mhs["Nilai Akhir"] = $nilai_akhir;

        if ($nilai_akhir >= 80) {
            $huruf = "A";
        } elseif ($nilai_akhir >= 70) {
            $huruf = "B";
        } elseif ($nilai_akhir >= 60) {
            $huruf = "C";
        } elseif ($nilai_akhir >= 50) {
            $huruf = "D";
        } else {
            $huruf = "E";
        }
        $mhs["Huruf"] = $huruf;
    }

    unset($mhs);
    ?>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_mhs as $mhs) : ?>
                <tr>
                    <td><?= $mhs["Nama"] ?></td>
                    <td><?= $mhs["NIM"] ?></td>
                    <td><?= $mhs["Nilai UTS"] ?></td>
                    <td><?= $mhs["Nilai UAS"] ?></td>
                    <td><?= $mhs["Nilai Akhir"] ?></td>
                    <td><?= $mhs["Huruf"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>