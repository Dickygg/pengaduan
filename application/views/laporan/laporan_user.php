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
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Member Sejak</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $a) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= $a['role']; ?></td>
                    <td><?= date('Y-m-d', strtotime($a['created_at'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>