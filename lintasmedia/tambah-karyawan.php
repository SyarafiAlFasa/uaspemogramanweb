<?php 
include 'koneksi.php';

if(isset($_POST['submit'])){
    $NAMA_KAR = htmlspecialchars($_POST['NAMA_KAR']);
    $JABATAN = htmlspecialchars($_POST['JABATAN']);

    $sql = "INSERT INTO karyawan (ID,NAMA,JABATAN) 
    VALUES ('','$NAMA_KAR','$JABATAN')";

    $result = mysqli_query($connection, $sql);


    if($result){
        echo "<script>alert('Data berhasil ditambahkan!');window.location='data-karyawan.php';</script>";  
    } else {
        echo "<script>alert('Data gagal ditambahkan!');window.location='data-karyawan.php';</script>";  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Tambah Data Karyawan</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="./image/user.ico">
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
                    <a href="data-pembeli.php">
                    <span>Data Pembeli</span></a>
                </li>
                <li>
                    <a href="data-karyawan.php" class ="active">
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
                Data Karyawan
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
            <div class="wrapper">
            <h2>Tambah Data Karyawan</h2>
            <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Karyawan</label>
                        <input type="text" name="NAMA_KAR" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" name="JABATAN" required="required" autocomplete="off">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="btn">Tambah</button>
                        <button class="kembali"><a href="data-karyawan.php" class="kembali">Kembali</a></button>
                    </div>
                </form>
            </div>
        </main>
        <!-- Akhir Isi Konten -->
    </div>

</body>
</html>
