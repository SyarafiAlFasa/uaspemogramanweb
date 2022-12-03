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
    $data = mysqli_query($connection, "SELECT * FROM user WHERE USERNAME LIKE '%$cari%' OR email LIKE '%$cari%'");
    $cek = mysqli_num_rows($data);
} else {
    $data = mysqli_query($connection, "SELECT * FROM user ORDER BY ID_USER asc");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Data Pembeli</title>
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
                    <a href="data-pemasangan.php">
                    <span>Data Pemasangan</span></a>
                </li>
                <li>
                    <a href="data-pembeli.php" class="active">
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
                Data Pembeli
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
                <h2>DATA PEMBELI</h2>
                <hr><br>
                <br><br>
                    <form action="" method="POST">
                        <input  class="search"type="text" name="keyword" id="live-search" placeholder="Cari" autocomplete="off">
                        <button type="submit" name="cari" id="keyword" class="button">Cari</button>
                    </form>
                    <div id="searchresult"></div>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>                            
                        </thead>
                        <?php if($cek == "0") { ?>
                        <tr>
                            <td colspan="7" style="text-align:center;">No data available in table</td>
                        </tr>
                        <?php } ?>
                        <tbody>
                            <?php 
                            include 'koneksi.php';                            
                            while($d = mysqli_fetch_array($data)){ ?>
                                <tr>
                                    <td><?php echo $d['ID_USER']; ?></td>
                                    <td><?php echo $d['USERNAME']; ?></td>
                                    <td><?php echo $d['EMAIL']; ?></td>

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
