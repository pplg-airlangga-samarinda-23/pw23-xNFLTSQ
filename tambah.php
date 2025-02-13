<?php
require 'koneksi.php'; // Pastikan koneksi.php menggunakan PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Ambil data dari form
        $nama_game = $_POST['nama_game'];
        $genre = $_POST['genre'];
        $harga = $_POST['harga'];
        $developer = $_POST['developer'];
        $tanggal_rilis = $_POST['tanggal_rilis'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];

        // Validasi sederhana untuk memastikan semua input terisi
        if (empty($nama_game) || empty($genre) || empty($harga) || empty($developer) || empty($tanggal_rilis) || empty($stok) || empty($deskripsi)) {
            $error = "Harap isi semua kolom!";
        } else {
            // Query menggunakan prepared statement
            $sql = "INSERT INTO tokogame (nama_game, genre, harga, developer, tanggal_rilis, stok, deskripsi) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $koneksi->prepare($sql);
            $stmt->execute([$nama_game, $genre, $harga, $developer, $tanggal_rilis, $stok, $deskripsi]);

            if ($stmt) {
                header("Location: game.php");
                exit();
            } else {
                $error = "Gagal menambahkan game.";
            }
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        .form-item {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Tambah Stok Game</h1>

    <?php if (!empty($error)) : ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-item">
            <label for="nama_game">Nama Game</label>
            <input type="text" name="nama_game" id="nama_game" required>
        </div>

        <div class="form-item">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required>
        </div>

        <div class="form-item">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" required min="0">
        </div>

        <div class="form-item">
            <label for="developer">Developer</label>
            <input type="text" name="developer" id="developer" required>
        </div>

        <div class="form-item">
            <label for="tanggal_rilis">Tanggal Rilis</label>
            <input type="date" name="tanggal_rilis" id="tanggal_rilis" required>
        </div>

        <div class="form-item">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" required min="0">
        </div>

        <div class="form-item">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" required rows="4"></textarea>
        </div>

        <button type="submit">Tambah Game</button>
    </form>
</body>
</html>
