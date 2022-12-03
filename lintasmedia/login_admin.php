<?php
    session_start();
    include 'koneksi.php';  
    if(isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['signin'] = $_POST['signin'];		
		$query_sql = "SELECT * FROM tbadmin
		WHERE USERNAME = '$username' AND PASSWORD ='$password'";

		$result = mysqli_query($connection, $query_sql);

		if (mysqli_num_rows($result) > 0) {
			$_SESSION['signin'] = true;		
			echo "
			<script>
				alert('Login Berhasil');
				document.location.href = 'admin.php';
			</script>
			";;			
		} else {
		echo "
		<script>
			alert('Username atau Password salah!');
			document.location.href = 'index.php';
		</script>
		";;
		}   
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>LOGIN ADMIN</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
		<div class="signin_body">
			<div class="signin_box">
				<h2>LOGIN ADMIN</h2>
				<form action="" method="POST">
					<div class="input_wrap">
						<input type="username" name="username" placeholder="Username" required autocomplete="off">
					</div>
					<div class="input_wrap">
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="input_wrap">
						<button type="submit" name="signin" >Sign In</button>
					</div>
				</form>				
			</div>
		</div>          
    </body>
</html> 