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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Toko game</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
        
         </nav>
        
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        toko game
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <a href="tambah.php">Tambah Data</a>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
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
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    <!-- <h1>Toko Game</h1> -->

    <!-- <a href="tambah.php">Tambah Data</a> -->
    <table>
        <!-- <thead>
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
        </thead> -->
        <tbody>
            <!-- foreach dengan sintaks alternatif -->
            <!-- <?php $no = 1; foreach ($rows as $row) : ?>
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
            <?php endforeach; ?> -->
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
