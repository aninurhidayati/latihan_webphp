<?php 
	include_once "berita_ctrl.php";
?>
<table class="table">
	<tr>
		<th>ID</th>
		<th>Judul</th>
		<th>Konten</th>
		<th>Action</th>
	</tr>
	<?php 
		index();
		//tulis array disini
		//looping 
		foreach($listmenu as $b){
		?>
	<tr>
		<td><?= $b["nm_menu"]; ?></td>
		<td><?php //echo $variabel; ?></td>
		<td></td>
		<td></td>
	</tr>
	<?php } //penutup looping ?>
</table>