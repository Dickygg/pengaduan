<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengaduan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>LAPORAN DATA PENGADUAN</h2>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Kategori</th>
                

            </tr>
        </thead>
        <tbody align="center">
            <?php $no = 1;
            foreach ($kategori as $k) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['kategori']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>