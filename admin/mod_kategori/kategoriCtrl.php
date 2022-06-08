<?php
if(isset($_GET['act']) && ($_GET['act']== "save")){
	//ketika code ini, posisi ada d folder mod_menu>admin>config
	require_once "../../config/koneksi_db.php";
	require_once "../../config/config.php";		
}
else{
	//ketika code ini, posisi ada d folder admin>config
	require_once "../config/koneksi_db.php";
	require_once "../config/config.php";
 }
// security_login();
if(isset($_GET['act']) && ($_GET['act']== "add")){
	//jika ada send variabel act=add, tampil form input/tambah
	$judul = "Form Input Data";
	$nmkategori = "";
	$idkategori = 0;
	$check = "";
	$action = "insert";
}
else if(isset($_GET['act']) && ($_GET['act']== "edit")){
	//jika ada send variabel act=add, tampil form input/tambah
	$judul = "Form Edit Data";
	$idkey = $_GET['id']; //dapat dari URL
	$qdata = mysqli_query($connect_db,"select * from mst_kategoriblog where id_kategori=$idkey")
			or die(mysqli_error($connect_db));
	$data = mysqli_fetch_array($qdata);
	$nmkategori = $data['nm_kategori'];
	$idkategori = $data['id_kategori'];
	if($data['is_active'] ==  1){
		$check = "checked";
	}
	else{
		$check = "";
	}
	$action = "update";
}
else if(isset($_GET['act']) && ($_GET['act']== "save")){
	//jika ada send variabel act=save, ketika proses simpan(insert)
	$nmkategori = $_POST['txt_kategori'];
	$idkategori = $_POST['idkategori'];
	if(isset($_POST['ck_aktif'])){ $aktif = 1;}	else{ $aktif = 0; }
	//query untuk simpan
	if($_POST['action'] == "insert"){
		$qinsert = mysqli_query($connect_db, 
			"INSERT into mst_kategoriblog(nm_kategori,is_active) VALUES('$nmkategori',$aktif)")
			or die (mysqli_error($connect_db));
		if($qinsert){
			//ketik proses simpan berhasil
			header("Location: http://localhost/latihan_webphp/admin/home.php?modul=mod_kategori");
		}
	}
	else{
		$qinsert = mysqli_query($connect_db, 
			"UPDATE mst_kategoriblog SET nm_kategori='$nmkategori', is_active=$aktif WHERE id_kategori='$idkategori'")
			or die (mysqli_error($connect_db));
		if($qinsert){
			//ketik proses simpan berhasil
			header("Location: http://localhost/latihan_webphp/admin/home.php?modul=mod_kategori");
		}
	}
}	