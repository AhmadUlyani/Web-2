<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SOAL 3</title>
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
            font-weight: bold;
        }

        .revisi {
            background-color: red;
            color: black;
        }

        .tidak-revisi {
            background-color: #00cc66;
            color: black;
        }
    </style>
</head>

<body>
    <?php
    $data_krs = [
        [
            "No" => 1,
            "Nama" => "Ridho",
            "Mata Kuliah" => ["Pemrograman I", "Praktikum Pemrograman I", "Pengantar Lingkungan Lahan Basah", "Arsitektur Komputer"],
            "SKS" => [2, 1, 2, 3]
        ],
        [
            "No" => 2,
            "Nama" => "Ratna",
            "Mata Kuliah" => ["Basis Data I", "Praktikum Basis Data I", "Kalkulus"],
            "SKS" => [2, 1, 3]
        ],
        [
            "No" => 3,
            "Nama" => "Tono",
            "Mata Kuliah" => ["Rekayasa Perangkat Lunak", "Analisis dan Perancangan Sistem", "Komputasi Awan", "Kecerdasan Bisnis"],
            "SKS" => [3, 3, 3, 3]
        ]
    ];

    foreach ($data_krs as &$mhs) {
        $total_sks = 0;

        foreach ($mhs["SKS"] as $sks) {
            $total_sks += $sks;
        }

        $mhs["Total SKS"] = $total_sks;

        if ($total_sks < 7) {
            $mhs["Keterangan"] = "Revisi KRS";
        } else {
            $mhs["Keterangan"] = "Tidak Revisi";
        }
    }
    unset($mhs);
    ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_krs as $mhs) : ?>

                <?php foreach ($mhs["Mata Kuliah"] as $index => $nama_mk) : ?>
                    <tr>
                        <?php
                        if ($index === 0) :
                        ?>
                            <td><?= $mhs["No"] ?></td>
                            <td><?= $mhs["Nama"] ?></td>
                        <?php else : ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>

                        <td><?= $nama_mk ?></td>
                        <td><?= $mhs["SKS"][$index] ?></td>

                        <?php
                        if ($index === 0) :
                            $class_warna = ($mhs["Keterangan"] == "Revisi KRS") ? "revisi" : "tidak-revisi";
                        ?>
                            <td><?= $mhs["Total SKS"] ?></td>
                            <td class="<?= $class_warna ?>">
                                <?= $mhs["Keterangan"] ?>
                            </td>
                        <?php else : ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>