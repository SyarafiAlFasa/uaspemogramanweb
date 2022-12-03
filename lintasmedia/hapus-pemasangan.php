<?php 
include 'koneksi.php';
$ID = $_GET['ID'];
$query = "DELETE FROM datapemasangan WHERE ID='$ID'";
$result = mysqli_query($connection, $query);
 
if(!$result) {
    die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
}else{
    echo "<script>alert('Data berhasil dihapus!');window.location='data-pemasangan.php';</script>";  
}     
?>