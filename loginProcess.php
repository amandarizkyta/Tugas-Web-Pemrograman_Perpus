
<?php

include "connect.php";

//data yang diinputkan 
$email = $_POST['email'];
$password = $_POST['password'];

//ambil data dari db untuk dicocokkan dengan inputan
$login = mysqli_query($conn, "select * from admin where Email='$email' and Password='$password'");
$cek = mysqli_num_rows($login);

 
if($cek > 0){
    $return = true;
    //mengaktifkan session
	session_start();
    $row = mysqli_fetch_assoc($login);
	$_SESSION['nama'] = $row["Nama"];
	$_SESSION['status'] = "login";
	// header("location:index.php");
}else{
    $return = false;;
	// echo "<script>alert('salah');</script>";	
}
die(json_encode(array('return' => $return)));