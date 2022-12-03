<?php 
include 'koneksi.php';

if(isset($_POST['submit'])){
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

            $query = "INSERT INTO datapemasangan (ID, nama, email, nomorhp, alamat, tipe_langganan, pas_foto)VALUES('','$nama','$email','$nomorhp', '$alamat', '$tipe', '$gambar')";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='pemesanan.php';</script>";  
            }

        }else{
            echo "<script>alert('Ekstensi gambar hanya jpg dan png!');window.location='pemesanan.php';</script>";   
        }

    }else{
        $query = "INSERT INTO datapemasangan (ID, nama, email, nomorhp, alamat, tipe_langganan)VALUES('','$nama','$email','$nomorhp', '$alamat', '$tipe')";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
        }else{
            echo "<script>alert('Data berhasil ditambahkan!');window.location='pemesanan.php';</script>";  
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
    <title>Tambah Data Menu</title>
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
                    <a href="user.php">
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="" class="active">
                    <span>Pemasangan</span></a>
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
                Pemasangan
            </h2>

            <div class="user-wrapper">
                <img src="images/pic-1.png" width="40px" height="40px" alt="">
                <div>
                    <h4>User</h4>
                    <small>User</small>
                </div>
            </div>

            <div class="logout-wrapper">
                <a href="logout.php"><img src="images/logout.png" width="25%" alt="logout"></a>
            </div>
        </header>

        <!-- Ini Isi Konten -->
        <main>
            <div class="wrapper">
            <h2>FORMULIR PEMASANGAN</h2>
            <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor HP</label>
                        <input type="text" name="nomorhp" required="required" autocomplete="off">
                    </div>           
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea type="text" name="alamat" required="required" autocomplete="off"></textarea>
                    </div>         
                    <div class="form-group">
                        <label for="">Tipe Langganan</label>
                        <select name="tipe" required="required" autocomplete="off">                                     
                                    <option value="50 MBps">50 MBps</option>
                                    <option value="80 MBps">80 MBps</option>
                                    <option value="100 MBps">100 MBps</option>
                                    <option value="120 MBps">120 MBps</option>
                        </select>                        
                    </div>    
                    <div class="form-group">
                        <label for="">Pas Foto</label>
                        <input type="file" name="gambar" required="required">
                    </div>                			
                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="btn">Tambah</button>
                        <button class="kembali"><a href="data-menu.php" class="kembali">Kembali</a></button>
                    </div>
                </form>
            </div>
        </main>
        <!-- Akhir Isi Konten -->
    </div>

</body>
</html>
