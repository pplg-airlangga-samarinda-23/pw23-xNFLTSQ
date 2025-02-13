<?php 
require 'koneksi.php';

// Mengambil semua data dari tabel datakebun
$sql = "SELECT * FROM tokogame";
$rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO GAME</title>
    <style>
        /* CSS untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
        a {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>v 
</head>
<body>
    <h1>Toko Game</h1>

    <a href="tambah.php">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NAMA GAME</th>
                <th>GENDRE</th>
                <th>HARGA</th>
                <th>DEVELOPER</th>
                <th>TANGGAL RILIS</th>
                <th>STOK</th>
                <th>DESKRIPSI</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach dengan sintaks alternatif -->
            <?php $no = 1; foreach ($rows as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_game'] ?></td>
                <td><?= $row['genre'] ?></td>   
                <td><?= $row['harga'] ?></td>
                <td><?= $row['developer'] ?></td>
                <td><?= $row['tanggal_rilis'] ?></td>
                <td><?= $row['stok'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
