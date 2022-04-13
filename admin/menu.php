<?php
require_once("../config/koneksi_db.php");
require_once("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
	$listmenu = array(
		array("id"=>"01", "nm_menu"=>"Dashboard", "link"=>"home.php"),
		array("id"=>"02", "nm_menu"=>"Blog", "link"=>"#"),
		array("id"=>"03", "nm_menu"=>"Berita", "link"=>"mod_berita")
	);
	//$qry_menu = mysqli_query($connect_db, "select * from" mst_menu);
	?>
	<ul class="list-group">
		<?php foreach($listmenu as $mn){ ?>
		<li class="list-group-item">
			<a href="?modul=<?= $mn['link']; ?>"><?= $mn['nm_menu']; ?></a>
		</li>
		<?php } ?>
	</ul>
</body>

</html>