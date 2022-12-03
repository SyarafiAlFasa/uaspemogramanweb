<?php 
error_reporting(0);
include 'koneksi.php';
session_start();
if (!isset($_SESSION['signin'])) {
    header("Location: login_admin.php");
    exit;
}
$cek = "";
if (isset($_POST['cari'])) {
    $cari = $_POST['keyword'];
    $data = mysqli_query($connection, "SELECT * FROM datapemasangan WHERE nama LIKE '%$cari%' OR email LIKE '%$cari%' OR alamat LIKE '%$cari%'");
    $cek = mysqli_num_rows($data);
} else {
    $data = mysqli_query($connection, "SELECT * FROM datapemasangan ORDER BY ID asc");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Data Menu</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/cari.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span><img src="images/lintasmediaicon.png" width="40px" alt=""></span><span>Lintas Media</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php">
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="data-pemesanan.php" class="active">
                    <span>Data Pemasangan</span></a>
                </li>
                <li>
                    <a href="data-pembeli.php">
                    <span>Data Pembeli</span></a>
                </li>
                <li>
                    <a href="data-karyawan.php">
                    <span>Data Karyawan</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Data Pemasangan
            </h2>

            <div class="user-wrapper">
                <img src="images/pic-1.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Admin</h4>
                    <small>Admin</small>
                </div>
            </div>

            <div class="logout-wrapper">
                <a href="logout.php"><img src="images/logout.png" width="25%" alt="logout"></a>
            </div>
        </header>

        <!-- Ini Isi Konten -->
        <main>
        <div class="content">
                <h2>DATA PEMASANGAN</h2>
                <hr><br><br><br>          
                    <form action="" method="POST">
                        <input  class="search"type="text" name="keyword" id="live-search" placeholder="Cari" autocomplete="off">
                        <button type="submit" name="cari" id="keyword" class="button">Cari</button>
                    </form>
                    <div id="searchresult"></div>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>                            
                            <th>Tipe</th>
                            <th>Pas Foto</th>
                            <th>Aksi</th>
                        </thead>
                        <?php if($cek == "0") { ?>
                        <tr>
                            <td colspan="7" style="text-align:center;">No data available in table</td>
                        </tr>
                        <?php } ?>
                        <tbody>
                            <?php 
                            include 'koneksi.php';
                            $no = 1;
                            while($d = mysqli_fetch_array($data)){ ?>
                                <tr>                                    
                                    <td><?php echo $d['ID']; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['email']; ?></td>
                                    <td><?php echo $d['nomorhp']; ?></td>
                                    <td><?php echo $d['alamat']; ?></td>      
                                    <td><?php echo $d['tipe_langganan']; ?></td>                              
                                    <td><img style="width: 40px;" src="foto/<?php echo $d['pas_foto']; ?>"></td>
                                    <td>
                                        <button class="edit"><a href="ubah-pemasangan.php?ID=<?php echo $d['ID']; ?>" class="edit">Ubah</a></button>
                                        <button class="hapus"><a href="hapus-pemasangan.php?ID=<?php echo $d['ID']; ?>" onclick="return confirm('Anda yakin hapus data ini?')"
                                        class="hapus">Hapus</a></button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
            </table>
        </div>
        </main>
        <!-- Akhir Isi Konten -->

    </div>


</body>
</html>
