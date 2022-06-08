<?php
session_start();
require_once("../config/koneksi_db.php");
require_once("../config/config.php");
//security_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.tiny.cloud/1/2mx8d7big7u89qawpu88ms9fdr62s03muc973mon679staxw/tinymce/6/tinymce.min.js"
		referrerpolicy="origin"></script>

	<script>
	tinymce.init({
		selector: 'textarea#editor',
		skin: 'bootstrap',
		plugins: 'lists, link, image, media',
		toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
		menubar: false,
	});
	</script>

</head>

<body>
	<!-- header -->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
		<div class="container-fluid">
			<a class="navbar-brand text-white" href="#">LOGO Perusahaan</a>
			<h3 class="d-flex flex-flex-column-reverse">
				<?php echo $_SESSION['userlogin']; ?>
			</h3>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="d-flex flex-row-reverse">
				<a href="logout.php"> signOut </a>
			</div>
		</div>
	</nav>
	<!-- content -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 p-3">
					<?php 
						include_once("menu.php");
					?>
				</div>
				<div class="col-lg-9 p-5">
					<!-- kolom untuk menampilkan konten -->
					<?php 
						if(isset($_GET['modul'])){
							//contoh $_GET['modul'] = mod_berita
							//include "mod_berita/index.php"
							include "".$_GET['modul']."/index.php"; 
						}
						
					
					?>
				</div>
			</div>
		</div>
	</section>
</body>

</html>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
< />