<?php
if(isset($_GET['act']) && ($_GET['act']=="update" || $_GET['act']== "save")){
	//ketika code ini, posisi ada d folder mod_menu>admin>config
	require_once "../../config/koneksi_db.php";
	require_once "../../config/config.php";		
}
else{
	//ketika code ini, posisi ada d folder admin>config
	require_once "../config/koneksi_db.php";
	require_once "../config/config.php";
}
security_login();
if(isset($_GET['act']) && ($_GET['act']== "add")){
	//jika ada send variabel act=add, tampil form input/tambah
	$judul = "Form Input Data";

}