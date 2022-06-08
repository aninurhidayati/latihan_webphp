<?php 
  include_once("uploadCtrl.php")
?>
<form method="POST" action="mod_upload/uploadCtrl.php" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8">
			<input type="file" name="urlfile" id="urlfile" class="form-control">
		</div>
		<div class="col-md-2">
			<button type="submit" name="btnupload" class="btn btn-sm btn-primary">
				Simpan Upload</button>
		</div>
	</div>
</form>
<hr>

<?= $dt['gambar']; ?>
<img src="../../assets/img/<?= $dt['gambar']; ?>" alt="">
<!-- <table class="table table-bordered">
	<tr>
		<th width="10%">URL</th>
		<th>View</th>
		<th width="20%">Kategori</th>
		<th>Action</th>
	</tr>
</table> -->