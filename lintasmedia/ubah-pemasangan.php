<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $nomorhp = htmlspecialchars($_POST['nomorhp']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tipe = htmlspecialchars($_POST['tipe']);
    $gambar = $_FILES['gambar']['name'];
    
    if($gambar != "") {
        $ekstensi = array('jpg', 'png');
        $x = explode('.', $gambar);
        $extension = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if(in_array($extension, $ekstensi) === true) {
            move_uploaded_file($file_tmp, 'foto/'.$gambar);

            $query = "UPDATE datapemasangan SET nama='$nama', email='$email', nomorhp='$nomorhp', alamat='$alamat', tipe_langganan='$tipe', pas_foto='$gambar'";
            $query .= "WHERE ID='$ID'";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Error  : ".mysqli_errno($connection)." - ".mysqli_error($connection));
            }else{
                echo "<script>alert('Data berhasil diubah!');window.location='data-pemasangan.php';</script>";  
            }

        }else{
            echo "<script>alert('Ekstensi gambar hanya jpg dan png!');window.location='ubah-pemasangan.php';</script>";   
        }

    }else{
        $query = "UPDATE datapemasangan SET nama='$nama', email='$email', nomorhp='$nomorhp', alamat='$alamat', tipe_langganan='$tipe'";
        $query .= "WHERE ID='$ID'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query Error  : ".mysqli_errno($connection)." - ".mysqli_error($connection));
        }else{
            echo "<script>alert('Data berhasil diubah!');window.location='data-menu.php';</script>";  
        }     
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Ubah Data Menu</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="./image/ahay.ico">
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
                    <a href="data-pemasangan.php" class="active">
                    <span>Data Langganan</span></a>
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
            <div class="wrapper">
            <h2>UBAH DATA PEMASANGAN</h2>
            <hr>
            <?php
            include 'koneksi.php';
            $ID = $_GET['ID'];
            $query_mysql = mysqli_query($connection, "SELECT * FROM datapemasangan WHERE ID='$ID'");
            // $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <input type="text" name="nama" autocomplete="off" value="<?php echo $data['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <input type="text" name="email" autocomplete="off" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor HP</label>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <input type="text" name="nomorhp"autocomplete="off" value="<?php echo $data['nomorhp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <textarea type="text" name="alamat"autocomplete="off" value="<?php echo $data['alamat'] ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tipe Langganan</label>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <select name="tipe" required="required" autocomplete="off">                                     
                                    <option value="50 MBps">50 MBps</option>
                                    <option value="80 MBps">80 MBps</option>
                                    <option value="100 MBps">100 MBps</option>
                                    <option value="120 MBps">120 MBps</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <img src="foto/<?php echo $data['pas_foto']; ?>" style="width: 40px;"><br>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                        <input type="file" name="gambar">
                    </div>			
                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="edit">Ubah</button>
                        <button class="kembali"><a href="data-pemasangan.php" class="kembali">Kembali</a></button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </main>
        <!-- Akhir Isi Konten -->
    </div>

</body>
</html>
