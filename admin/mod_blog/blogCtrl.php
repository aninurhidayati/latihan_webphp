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
	//ini untk isi combo
	$listkategori = mysqli_query($connect_db,"select * from mst_kategoriblog where is_active = 1 
		order by id_kategori DESC")or die("gagal akses table mst_kategori ".mysqli_error($connect_db));
	$idblog = 0;
	$judulblog= "";		
	$idkategori = 0;
	$isi = "";
	$tanggal = date("Y-m-d");
	$action = "insert";
}
else if(isset($_GET['act']) && ($_GET['act']== "edit")){
	//jika ada send variabel act=add, tampil form input/tambah
	$judul = "Form Edit Data";
	$idkey = $_GET['id']; //dapat dari URL
	$listkategori = mysqli_query($connect_db,
			"select * from mst_kategoriblog where is_active = 1 order by id_kategori DESC")
			or die("gagal akses table mst_menu ".mysqli_error($connect_db));
	$qdata = mysqli_query($connect_db,"select m.*, k.nm_kategori from mst_blog m 
				inner join mst_kategoriblog k on m.id_kategori=k.id_kategori where id_blog=$idkey")
			or die(mysqli_error($connect_db));
	$data = mysqli_fetch_array($qdata);
	$idblog = $data['id_blog'];
	$judulblog= $data['judul'];		
	$idkategori = $data['id_kategori'];
	$isi = $data['isi'];
	$tanggal = $data['date_input'];
	$action = "update";
}
else if(isset($_GET['act']) && ($_GET['act']== "save")){
	//jika ada send variabel act=save, ketika proses simpan(insert)
	$idblog = $_POST['idblog'];		
	$idkategori = $_POST['kategori'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$tanggal = $_POST['tanggal'];
	$tglblog = date("Y-m-d", strtotime($tanggal));  
	$author = $_POST['author'];

	//query untuk simpan
	if($_POST['action'] == "insert"){
		$qinsert = mysqli_query($connect_db, 
			"INSERT into mst_blog(judul,id_kategori,isi,author,date_input) 
			VALUES('$judul','$idkategori','$isi','$author','$tglblog')")
			or die (mysqli_error($connect_db));
		if($qinsert){
			//ketik proses simpan berhasil
			header("Location: http://localhost/latihan_webphp/admin/home.php?modul=mod_blog");
		}
	}
	else{
		$qupdate = mysqli_query($connect_db, 
			"UPDATE mst_blog SET judul='$judul' ,id_kategori='$idkategori', isi='$isi', 
			author='$author', date_input='$tglblog' WHERE id_blog='$idblog'")
			or die (mysqli_error($connect_db));
		if($qupdate){
			//ketik proses simpan berhasil
			header("Location: http://localhost/latihan_webphp/admin/home.php?modul=mod_blog");
		}
	}
}	