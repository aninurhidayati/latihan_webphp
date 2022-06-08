<?php

use function PHPSTORM_META\type;
$_SESSION['message'] = "Oke, Kamu Keren!!";
echo $_SESSION['message'];
unset($_SESSION['message']);
echo "cek: ".$_SESSION['message'];

if(isset($_POST['btnupload'])){
	$file = $_FILES['urlfile']; 
	var_dump($file);
	$target_dir = "../../assets/img/";
	$target_file =  $target_dir.basename($file['name']);	
	echo $target_file."<br/>";	
	$type_file = pathinfo($file['name'],PATHINFO_EXTENSION);
	echo $type_file."<br/>";
	$is_upload = 1;

	/* cek batas limit file maks.3MB*/
	if($file['size'] > 1000000){
		$is_upload = 0;
		pesan("File lebih dari 1MB!!");		
	}
	/**cek tipe file */
	if($type_file != "jpg"){
		$is_upload = 0;
		pesan("Tipe file bukan file gambar!!");	
	}
	echo $is_upload;
	/**proses upload */
	if($is_upload == 1){
		if(move_uploaded_file($file['tmp_name'], $target_file)){
			pesan("Berhasil upload file gambar!!");	
		}
		else{
			pesan("GAGAL upload file gambar!!");	
		}
	}

}

function pesan($alert){	
	echo '<script language="javascript">';
	echo 'alert("'.$alert.'")';  //not showing an alert box.
	echo '</script>';
	echo '<meta http-equiv="refresh" content="0; url=http://localhost/latihan_webphp/admin/home.php?modul=mod_upload">';	
}


?>