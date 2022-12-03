<?php 
$connection = mysqli_connect("localhost","root","","dblintasmedia");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>