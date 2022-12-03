<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lintasmedia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <header class="header"> 
    
        <a href="#" class="logo">Lintas Media</a>

        <nav class="navbar" id="myNavbar">
            <div id="close-navbar" class="fas fa-times"></div>
            <a href="#">home</a>
            <a href="#about">about</a>            
            <a href="#review">review</a>
            <div class="dropdown">
                <button class="dropbtn">Login
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="login_admin.php">Admin</a>
                    <a href="login_user.php">User</a>
                </div>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </nav> 
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

    </header>
        <!--  header -->
        <!-- Home -->

    <section class="home" id="home">

        <div class="content">
            <h3>fast and stable internet</h3>
            <p>Better internet, Better life</p><br>
            <center><a href="login_user.php" class="btn">Order Now</a></center>
        </div>

    </section>

            <!-- About us -->    
            <section class="about" id="about">
        <h1 class="heading">about us</h1>

        <div class="row">

            <div class="image">
                <img src="images/gambar2.jpg" alt="about">
            </div>

            <div class="content">
                <h3>What is Lintas Media?</h3>
                <div class="line"></div>
                <p>Lintas media adalah sebuah perusahaan yang menyediakan layanan internet Wi-Fi yang cepat dan stabil dengan harga yang terjangkau.</p>
            </div>

        </div>

    </section>

    <!-- Customer's Review -->
    <section class="review" id="review">

        <h1 class="heading">  <span> customer's review</span> </h1>

        <div class="box-container">

            <div class="box">
                <p>Internet disini sangat cepat dan stabil, saya sudah menggunakannya selama 5 tahun, terimakasih Lintas Media!</p>
                <img src="images/pic-1.png" class="user" alt="">
                <h3>Abdul</h3>
            </div>

            <div class="box">                
                <p>Internet yang disediakan oleh Lintas Media sangan membantu dalam mengerjaka tugas kuliahku dah kebutuhan sehari-hari.</p>
                <img src="images/pic-2.png" class="user" alt="">
                <h3>Yasinta</h3>
            </div>
            
            <div class="box">                
                <p>Saya menggunakan Lintas Media sebagai internet service di cafe saya untuk kepuasan para pelanggan</p>
                <img src="images/pic-3.png" class="user" alt="">
                <h3>Raffi Ahmad</h3>
            </div>

        </div>

    </section>
        <!-- End -->
    
    <section class="footer">
        <!-- Footer -->

        <div class="box-container">

            <div class="box">
                <img src="image/footer-1.png" alt="">
                <h3>Address</h3>
                <p> Jalan Ir. H. Juanda, Air Hitam, Samarinda Ulu, Samarinda, Kalimantan Timur 75124 </p>
    
            </div>
    
            <div class="box">
                <img src="image/footer-2.png" alt="">
                <h3>E-mail</h3>
                <a href="#" class="link">lintasmedia@gmail.com</a>
            </div>
    
            <div class="box">
                <img src="image/footer-3.png" alt="">
                <h3>Call us</h3>
                <p>+62822-1344-2541</p>
            </div>
    
            <div class="box">
                <img src="image/footer-4.png" alt="">
                <h3>Opening hours</h3>
                <p>Senin - Jumat : 8:00 - 16:00
                    <br> Sabtu   : 8:00 - 12:00</p>
            </div>

        </div>

        <div class="credit">Lintas <span>Media</span> | All Rights Reserved </div>

    </section>
</body>
</html>