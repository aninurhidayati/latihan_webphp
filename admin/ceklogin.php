<?php
require_once("../config/koneksi_db.php");
require_once("../config/config.php");
//cek apakah data dikirim sesuai variabel berikut
if(isset($_POST['btnlogin'])){
	$txt_user = $_POST['username'];
	$txt_pass = md5($_POST['password']);
	$result = mysqli_query($connect_db, 
			"select * from mst_user where username = '".$txt_user."' 
			AND password = '".$txt_pass."' AND is_active=1");
	if(mysqli_num_rows($result) > 0){
		//jika hasil query data lebih dari 0
		echo "hasil= ".mysqli_num_rows($result);
		header("Location: ".URL."home.php");		
	}else{
		header("Location: ".URL."");
	}
}
?>