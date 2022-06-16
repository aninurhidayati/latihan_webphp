<?php 
require_once("config/koneksi_db.php");	
$email = $_POST['email'];
$nama = $_POST['txtnama'];
$info = $_POST['info'];
$ket = $_POST['ket'];
$query = mysqli_query($connect_db,
	"INSERT INTO dataresponden(email,nama,keterangan,informasi)
	VALUES('$email','$nama','$ket', '$info')")
	or die(mysqli_error($connect_db));
if($query){
	header("Location: index.php");
}	

?>