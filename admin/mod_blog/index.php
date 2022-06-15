<?php 
	include_once "blogCtrl.php";
?>
<?php 
if(!isset($_GET['act'])){
?>
<a href="?modul=mod_blog&act=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
<table class="table table-bordered">
	<tr>
		<th width="10%">Tanggal</th>
		<th>Judul</th>
		<th width="20%">Kategori</th>
		<th>Action</th>
	</tr>
	<?php 
		//tulis array disini
		$listblog = mysqli_query($connect_db,"select m.*, k.nm_kategori from mst_blog m inner join mst_kategoriblog k
			on m.id_kategori=k.id_kategori order by id_blog DESC")
			or die("gagal akses table mst_menu ".mysqli_error($connect_db));
		//looping 
		while($r = mysqli_fetch_array($listblog)){	
		?>
	<tr>
		<td><?= $r['date_input']; ?></td>
		<td><?= $r['judul']; ?></td>
		<td><?= $r['nm_kategori']; ?></td>
		<td class="w-25">
			<a href="?modul=mod_blog&act=edit&id=<?= $r['id_blog']; ?>" class="btn btn-xs btn-primary">
				<i class="bi bi-pencil-square"></i>Edit</a>
			<a href="" class="btn btn-xs btn-primary">
				<i class="bi bi-trash"></i>Delete</a>
		</td>
	</tr>
	<?php } //penutup looping ?>
</table>
<?php 
//ini penutup if(!isset($_GET['act']))
}
else if(isset($_GET['act']) && ($_GET['act']== "add" || $_GET['act']== "edit")){
//ketika di add
?>
<div class="container-fluid">
	<h3><?= $judul; ?>.</h3>
	<form action="mod_blog/blogCtrl.php?modul=mod_blog&act=save" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idblog" value="<?= $idblog; ?>">
		<input type="hidden" name="author" value="<?= $_SESSION['userlogin']; ?>">
		<input type="hidden" name="action" value="<?= $action; ?>">
		<div class="row mb-1">
			<label for="kategori" class="col-md-2">Kategori Blog </label>
			<div class="col-md-6">
				<select class="form-control " name="kategori">
					<option value="">--Pilih Kategori--</option>
					<?php
					while($dt = mysqli_fetch_array($listkategori)){
						if($idkategori == $dt['id_kategori']){
							$selec = "selected='selected'";
						}
						else{
							$selec = "";
						}
						echo "<option value='$dt[id_kategori]' $selec> --$dt[nm_kategori]--</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Judul</div>
			<div class="col-md-6">
				<input type="text" name="judul" id="judul" class="form-control" value="<?= $judulblog; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Isi</div>
			<div class="col-md-6">
				<textarea name="isi" id="editor" cols="30" rows="10" class="form-control"><?= $isi; ?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Upload Gambar</div>
			<div class="col-md-6">
				<input type="hidden" name="file_uploaded" value="<?= $file_uploaded; ?>">
				<input type="file" name="filegambar" id="filegambar">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tanggal Input </div>
			<div class="col-md-4">
				<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $tanggal; ?>"
					placeholder="yyyy-mm-dd">
			</div>
		</div>
		<hr>
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
<?php } ?>