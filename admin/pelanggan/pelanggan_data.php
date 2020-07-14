<?php 


$data = $pelanggan->showPelanggan();
$dataTarif = $tarif->showTarif();
$codePelanggan = buatKode('pelanggan','PLG');
$row = $data->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['Tpelanggan'])){
	$id_pelanggan = $_POST['id_pelanggan'];
	$nomor_kwh = $_POST['nomor_kwh'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$alamat = $_POST['alamat'];
	$id_tarif = $_POST['id_tarif'];

	if($pelanggan->inputPelanggan($id_pelanggan,$nomor_kwh,$nama_pelanggan,$alamat,$id_tarif)){
		?>
		<script>
			alert('Berhasil Menambahkan Pelanggan Baru');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Gagal Menambahkan Pelanggan Baru');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}
}
if(isset($_POST['Upelanggan'])){
	$id_pelanggan = $_POST['id_pelanggan'];
	$nomor_kwh = $_POST['nomor_kwh'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$alamat = $_POST['alamat'];
	$id_tarif = $_POST['id_tarif'];

	if($pelanggan->ubahPelanggan($id_pelanggan,$nomor_kwh,$nama_pelanggan,$alamat,$id_tarif)){
		?>
		<script>
			alert('Berhasil Mengubah Data Pelanggan');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Gagal Mengubah Data Pelanggan');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}
}
?>
<div class="card float-left font-weight-bold text-light" style="width: 100%;background-color: rgba(41,48,54,0.9)">
	<div class="card-header">
		Data Pelanggan
	</div>
	<div class="card-body" >
		<table class="table table-borderless text-center" id="dataTable">
			<thead>
				<tr>
					<th>Id Pelanggan</th>
					<th>Nama Pelanggan</th>
					<th>Alamat</th>
					<th>No Kwh</th>
					<th>
						<button class="btn btn-outline-success font-weight-bold" data-toggle="modal" data-target="#TambahPelanggan">
							<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $rows) { ?>
					<tr>
						<td><?= $rows['id_pelanggan']; ?></td>
						<td><?= $rows['nama_pelanggan']; ?></td>
						<td><?= $rows['alamat']; ?></td>
						<td><?= $rows['nomor_kwh']; ?></td>
						<td>
							<button class="btn btn-warning font-weight-bold id_pelanggan" data-toggle="modal" data-target="#EditPelanggan" id="<?= $rows['id_pelanggan'] ?>">
								<span class="fa fa-edit"></span> Edit
							</button>
							<a href="?page=Pelanggan&Kode=<?= $rows['id_pelanggan']; ?>" class="btn btn-danger font-weight-bold">
								<span class="fa fa-trash-alt"></span> Hapus
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="TambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font-weight-bold">
				<form method="post">
					<div class="form-group">
						<label for="">Id Pelanggan</label>
						<input type="text" class="form-control" name="id_pelanggan" value="<?= $codePelanggan ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Nama Pelanggan</label>
						<input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
					</div>
					<div class="form-group">
						<label for="">Alamat Pelanggan</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label for="">Nomor Kwh</label>
						<input type="text" class="form-control" name="nomor_kwh" placeholder="No Kwh" maxlength="10">
					</div>
					<div class="form-group">
						<label for="">Id Tarif</label>
						<select name="id_tarif" class="form-control">
							<option>Pilih Tarif</option>
							<?php foreach ($dataTarif as $row): ?>
								<option value="<?= $row['id_tarif'] ?>"><?= $row['golongan'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="Tpelanggan" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit Pelanggan -->
<div class="modal fade" id="EditPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div id="data">

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="Upelanggan" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
if(isset($_GET['Kode'])){
	$id = $_GET['Kode'];
	if($pelanggan->hapusPelanggan($id)){
		?>
		<script>
			alert('Pelanggan Berhasil Dihapus');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Pelanggan Gagal Dihapus');
			document.location = '?page=Pelanggan';
		</script>
		<?php
	}
 }
 ?>
 <script>
 	$(document).ready(function(){
 		$('.id_pelanggan').on('click',function(){
 			var id = $(this).attr("id");

 			$.ajax({
 				url:'pelanggan/getPelanggan.php',
 				data:{id : id},
 				method:'get',
 				success:function(data){
 					$('#data').html(data);
 				}
 			});
 		})
 	});
 </script>
