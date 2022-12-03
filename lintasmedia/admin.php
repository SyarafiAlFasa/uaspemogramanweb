<?php 
error_reporting(0);
include 'koneksi.php';
session_start();
if (!isset($_SESSION['signin'])) {
    header("Location: login_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

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
                    <a href="admin.php" class="active">
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="data-pemasangan.php">
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
                Dashboard
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

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>121</h1>
                        <span>Pelanggan</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>15</h1>
                        <span>Total Daerah Jangkauan</span>
                    </div>
                    <div>
                        <span class="las la-coffee"></span>
                    </div>
                </div>


                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Karyawan</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>Rp 6K</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>

        </mnain>

    </div>


</body>
</html>
