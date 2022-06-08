<?php
include_once("kategoriCtrl.php");
if(!isset($_GET['act'])){
?>
<a href="?modul=mod_kategori&act=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
<table class="table table-bordered">
	<tr>
		<th>ID Kategori</th>
		<th>Nama Kategori</th>
		<th class="w-25">Action</th>
	</tr>
	<?php
	$qry_list = mysqli_query($connect_db,
			"select * from mst_kategoriblog where is_active = 1 order by id_kategori DESC")
			or die("gagal akses table mst_menu ".mysqli_error($connect_db));
	while($row = mysqli_fetch_array($qry_list)){
	?>
	<tr>
		<td><?php echo $row['id_kategori']; ?></td>
		<td><?php echo $row['nm_kategori']; ?></td>
		<td class="text-center">
			<a href="?modul=mod_kategori&act=edit&id=<?= $row['id_kategori']; ?>" class="btn btn-xs btn-primary p-1">
				<i class="bi bi-pencil-square"></i> Edit</a>
			<a href="?modul=mod_kategori&act=delete&id=<?= $row['id_kategori']; ?>" class="btn btn-xs btn-primary p-1">
				<i class="bi bi-trash"></i>Delete</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php 
//ini penutup if(!isset($_GET['act']))
}
else if(isset($_GET['act']) && ($_GET['act']== "add" || $_GET['act']== "edit")){
//ketika di add
?>
<div class="container-fluid">
	<h3><?php echo $judul; ?></h3>
	<form action="mod_kategori/kategoriCtrl.php?modul=mod_kategori&act=save" method="post">
		<input type="hidden" name="idkategori" value="<?= $idkategori; ?>">
		<input type="hidden" name="action" value="<?= $action?>">
		<div class="row mb-1">
			<label for="" class="col-md-2">Nama Kategori </label>
			<div class="col-md-6">
				<input type="text" name="txt_kategori" id="txt_kategori" class="form-control"
					value="<?= $nmkategori ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<input type="checkbox" name="ck_aktif" id="ck_aktif" <?= $check; ?>> Aktif
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<button type="reset" name="btnreset" value="btnbatal" class="btn btn-xs btn-secondary p-1">
					<i class="bi bi-x-lg"></i> Batal</a></button>
				<button type="submit" name="btnsimpan" value="btnsimpan" class="btn btn-xs btn-primary p-1">
					<i class="bi bi-save"></i> Simpan</a></button>
			</div>
		</div>
	</form>
</div>
<?php 
	 }
?>