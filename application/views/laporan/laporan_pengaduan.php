<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pengaduan</title>
    <style>
        table { border-collapse: collapse; width: 100%; font-size: 12px; }
        table, th, td { border: 1px solid black; padding: 5px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>LAPORAN DATA PENGADUAN</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Tanggal</th>

            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($pengaduan as $u) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $u['nama']; ?></td>
                <td><?= $u['kategori']; ?></td>
                <td><?= $u['isi_laporan']; ?></td>
                <td><?= $u['status']; ?></td>
                <td><?= date('Y-m-d', strtotime($u['tanggal'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
