<?php 
include 'connect.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("login.php");
}
 
// menampilkan pesan selamat datang
$nama =  $_SESSION['nama'];
 
?>
<h1><?php echo $nama?></h1>
<a href="logout.php">Keluar </a>