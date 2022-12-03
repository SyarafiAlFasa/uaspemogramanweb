<?php
    session_start();
    include 'koneksi.php';  
    if(isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['signin'] = $_POST['signin'];		
        $result = mysqli_query($connection, "SELECT * FROM user WHERE USERNAME = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['PASSWORD'])){
                $_SESSION['signin'] = true;
                echo "<script>alert('Sign In berhasil!');window.location='user.php';</script>";
                exit;
            } 
        } else {
            echo "<script>alert('Username atau Password salah!');window.location='index.php';</script>";
        }
    }
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>LOGIN USER</title>
        <link rel="stylesheet" href="style2.css">
		<link rel="icon" href="./img/icon.ico">
    </head>

    <body>
		<div class="signin_body">
			<div class="signin_box">
				<h2>LOGIN USER</h2>
				<form action="" method="POST">
					<div class="input_wrap">
						<input type="username" name="username" placeholder="Username">
					</div>
					<div class="input_wrap">
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="input_wrap">
						<button name="signin" type="submit">LOGIN</button>
					</div>
				</form>
				<p>don't have an account? <a href="signup.php" style="color: black; text-decoration: none;">Sign Up</a></p>
			</div>
		</div>           
    </body>
</html>