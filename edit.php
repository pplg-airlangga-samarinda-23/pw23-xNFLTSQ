<?php  
require 'koneksi.php';  

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {     
    $id = $_GET['id'];  

    $sql = "SELECT * FROM tokogame WHERE id=?";  
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {    
    $id = $_GET['id'];

    // Pastikan semua data dikirim dengan benar
    $nama_game = $_POST['nama_game'];
    $genre = $_POST['genre'];
    $harga = $_POST['harga'];
    $developer = $_POST['developer'];
    $tanggal_rilis = $_POST['tanggal_rilis'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE tokogame SET nama_game=?, gendre=?, harga=?, developer=?, tanggal_rilis=?, stok=?, deskripsi=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("siisssi", $nama_game, $gendre, $harga, $developer, $tanggal_rilis, $stok, $deskripsi, $id);
    $success = $stmt->execute();

    if ($success) {
        header("Location: game.php");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <title>Edit Data</title>  
</head>  
<body>  
    <h1>Edit Data</h1>  
    <form action="" method="post">  
        <div class="form-item">  
            <label for="nama_game">Nama Game:</label>  
            <input type="text" name="nama_game" id="nama_game" value="<?= htmlspecialchars($row['nama_pemanen'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="gendre">Gendre:</label>  
            <input type="text" name="gendre" id="gendre" value="<?= htmlspecialchars($row['buah_sangat_matang'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="harga">Harga:</label>  
            <input type="text" name="harga" id="harga" value="<?= htmlspecialchars($row['jumlah_janjang'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="developer">Developer:</label>  
            <input type="text" name="developer" id="developer" value="<?= htmlspecialchars($row['buah_mentah'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="tanggal_rilis">Tanggal Rilis:</label>  
            <input type="text" name="tanggal_rilis" id="tanggal_rilis" value="<?= htmlspecialchars($row['tanggal_pengambilan'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="stok">Stok:</label>  
            <input type="text" name="stok" id="stok" value="<?= htmlspecialchars($row['nama_peberondol'] ?? '') ?>">  
        </div>  
        <div class="form-item">  
            <label for="deskripsi">Deskripsi:</label>  
            <input type="text" name="deskripsi" id="deskripsi" value="<?= htmlspecialchars($row['nama_peberondol'] ?? '') ?>">  
        </div>  

        <button type="submit">Simpan</button>  
    </form>  
</body>  
</html>
